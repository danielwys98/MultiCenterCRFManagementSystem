<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_BAT;
use App\SP2_BAT;
use App\SP3_BAT;
use App\SP4_BAT;
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use Illuminate\Http\Request;

class SP1_BAT_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request, $study_id)
    {
        //custom messages load for validation
        $custom = [
            'dateTaken.required' => 'Please enter the date taken for breath alcohol test',
            'timeTaken.required' => 'Please enter the time taken for breath alcohol test',
            'Laboratory.required' => 'Please select which laboratory does the test conducted',
            'Laboratory_text.required_if' => 'If other laboratory were selected, please state the name of the laboratory',
            'breathalcohol.required' => 'Please enter the BAC%(Breath Alcohol Content)',
            'breathalcoholResult.required' => 'Please select a result for BAC%(Breath Alcohol Content)',
            'Usertranscribed.required' => 'Please state the user transcribed',
        ];
        //validation for required fields
        $validatedData = $this->validate($request, [
            'dateTaken' => 'required',
            'timeTaken' => 'required',
            'Laboratory' => 'required',
            'Laboratory_text' => 'required_if:Laboratory,==,Others',
            'breathalcohol' => 'required',
            'breathalcoholResult' => 'required',
            'Usertranscribed' => 'required',
        ], $custom);

        $PID = $request->patient_id;
        $study_period = $request->studyPeriod;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id',$PID)
                                        ->where('study_id',$study_id)
                                        ->first();
        //check study period and save
        if($study_period == '---'){
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }elseif($study_period == 1){
            if($this->storeSP1($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Breath Alcohol Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            if($this->storeSP2($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Breath Alcohol Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            if($this->storeSP3($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Breath Alcohol Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            if($this->storeSP4($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 4 details for Breath Alcohol Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.input',$study_id));
        }
    }

    public function update(Request $request, $patient_id, $study_id,$study_period)
    {

        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id',$patient_id)
                                        ->where('study_id',$study_id)
                                        ->first();
        //check study period and save
        if($study_period == 1){
            if($this->updateSP1($findPSS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 1 details for Breath Alcohol Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 2){
            if($this->updateSP2($findPSS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 2 details for Breath Alcohol Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 3){
            if($this->updateSP3($findPSS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 3 details for Breath Alcohol Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 4){
            if($this->updateSP4($findPSS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 4 details for Breath Alcohol Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.edit',$study_id));
        }
    }

    //store SP1_BAT
    public function storeSP1($PSS,$request){
        if($PSS !=NULL && $PSS->SP1_ID != NULL){
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$PSS->SP1_ID)->first();
            $BAT = SP1_BAT::where('SP1_BAT_ID',$findSP1->SP1_BATER)->first();

            if($BAT->dateTaken == NULL){
                //date and time
                $BAT->dateTaken = $request->dateTaken;
                $BAT->timeTaken = $request->timeTaken;
                //laboratory
                if ($request->Laboratory == 'Others') {
                    //if lab is others, save text
                    $BAT->laboratory = $request->Laboratory_text;
                } else {//if lab is selected
                    $BAT->laboratory = $request->Laboratory;
                }
                //breath alcohol record and user transcribed
                $BAT->breathalcohol = $request->breathalcohol;
                $BAT->breathalcoholResult = $request->breathalcoholResult;
                $BAT->Usertranscribed = $request->Usertranscribed;

                $BAT->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP2_BAT
    public function storeSP2($PSS,$request){
        if($PSS !=NULL && $PSS->SP2_ID != NULL){
            //find admission table and update it
            $findSP2 = StudyPeriod2::where('SP2_ID',$PSS->SP2_ID)->first();
            $BAT = SP2_BAT::where('SP2_BAT_ID',$findSP2->SP2_BATER)->first();

            if($BAT->dateTaken == NULL){
                //date and time
                $BAT->dateTaken = $request->dateTaken;
                $BAT->timeTaken = $request->timeTaken;
                //laboratory
                if ($request->Laboratory == 'Others') {
                    //if lab is others, save text
                    $BAT->laboratory = $request->Laboratory_text;
                } else {//if lab is selected
                    $BAT->laboratory = $request->Laboratory;
                }
                //breath alcohol record and user transcribed
                $BAT->breathalcohol = $request->breathalcohol;
                $BAT->breathalcoholResult = $request->breathalcoholResult;
                $BAT->Usertranscribed = $request->Usertranscribed;

                $BAT->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP3_BAT
    public function storeSP3($PSS,$request){
        if($PSS !=NULL && $PSS->SP3_ID != NULL){
            //find admission table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID',$PSS->SP3_ID)->first();
            $BAT = SP3_BAT::where('SP3_BAT_ID',$findSP3->SP3_BATER)->first();

            if($BAT->dateTaken == NULL){
                //date and time
                $BAT->dateTaken = $request->dateTaken;
                $BAT->timeTaken = $request->timeTaken;
                //laboratory
                if ($request->Laboratory == 'Others') {
                    //if lab is others, save text
                    $BAT->laboratory = $request->Laboratory_text;
                } else {//if lab is selected
                    $BAT->laboratory = $request->Laboratory;
                }
                //breath alcohol record and user transcribed
                $BAT->breathalcohol = $request->breathalcohol;
                $BAT->breathalcoholResult = $request->breathalcoholResult;
                $BAT->Usertranscribed = $request->Usertranscribed;

                $BAT->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP4_BAT
    public function storeSP4($PSS,$request){
        if($PSS !=NULL && $PSS->SP4_ID != NULL){
            //find admission table and update it
            $findSP4 = StudyPeriod4::where('SP4_ID',$PSS->SP4_ID)->first();
            $BAT = SP4_BAT::where('SP4_BAT_ID',$findSP4->SP4_BATER)->first();

            if($BAT->dateTaken == NULL){
                //date and time
                $BAT->dateTaken = $request->dateTaken;
                $BAT->timeTaken = $request->timeTaken;
                //laboratory
                if ($request->Laboratory == 'Others') {
                    //if lab is others, save text
                    $BAT->laboratory = $request->Laboratory_text;
                } else {//if lab is selected
                    $BAT->laboratory = $request->Laboratory;
                }
                //breath alcohol record and user transcribed
                $BAT->breathalcohol = $request->breathalcohol;
                $BAT->breathalcoholResult = $request->breathalcoholResult;
                $BAT->Usertranscribed = $request->Usertranscribed;

                $BAT->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //update SP1_BAT
    public function updateSP1($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$PSS->SP1_ID)->first();
            $BAT = SP1_BAT::where('SP1_BAT_ID',$findSP1->SP1_BATER)->first();

            //date and time
            $BAT->dateTaken = $request->dateTaken;
            $BAT->timeTaken = $request->timeTaken;
            //laboratory
            if ($request->Laboratory == 'Others') {
                //if lab is others, save text
                $BAT->laboratory = $request->Laboratory_text;
            } else {//if lab is selected
                $BAT->laboratory = $request->Laboratory;
            }
            //breath alcohol record and user transcribed
            $BAT->breathalcohol = $request->breathalcohol;
            $BAT->breathalcoholResult = $request->breathalcoholResult;
            $BAT->Usertranscribed = $request->Usertranscribed;

            $BAT->save();
            return true;
        }else{
            return false;
        }
    }

    //update SP2_BAT
    public function updateSP2($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP2 = StudyPeriod2::where('SP2_ID',$PSS->SP2_ID)->first();
            $BAT = SP2_BAT::where('SP2_BAT_ID',$findSP2->SP2_BATER)->first();

            //date and time
            $BAT->dateTaken = $request->dateTaken;
            $BAT->timeTaken = $request->timeTaken;
            //laboratory
            if ($request->Laboratory == 'Others') {
                //if lab is others, save text
                $BAT->laboratory = $request->Laboratory_text;
            } else {//if lab is selected
                $BAT->laboratory = $request->Laboratory;
            }
            //breath alcohol record and user transcribed
            $BAT->breathalcohol = $request->breathalcohol;
            $BAT->breathalcoholResult = $request->breathalcoholResult;
            $BAT->Usertranscribed = $request->Usertranscribed;

            $BAT->save();
            return true;
        }else{
            return false;
        }
    }

    //update SP3_BAT
    public function updateSP3($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID',$PSS->SP3_ID)->first();
            $BAT = SP3_BAT::where('SP3_BAT_ID',$findSP3->SP3_BATER)->first();

            //date and time
            $BAT->dateTaken = $request->dateTaken;
            $BAT->timeTaken = $request->timeTaken;
            //laboratory
            if ($request->Laboratory == 'Others') {
                //if lab is others, save text
                $BAT->laboratory = $request->Laboratory_text;
            } else {//if lab is selected
                $BAT->laboratory = $request->Laboratory;
            }
            //breath alcohol record and user transcribed
            $BAT->breathalcohol = $request->breathalcohol;
            $BAT->breathalcoholResult = $request->breathalcoholResult;
            $BAT->Usertranscribed = $request->Usertranscribed;

            $BAT->save();
            return true;
        }else{
            return false;
        }
    }

    //update SP4_BAT
    public function updateSP4($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP4 = StudyPeriod4::where('SP4_ID',$PSS->SP4_ID)->first();
            $BAT = SP4_BAT::where('SP4_BAT_ID',$findSP4->SP4_BATER)->first();

            //date and time
            $BAT->dateTaken = $request->dateTaken;
            $BAT->timeTaken = $request->timeTaken;
            //laboratory
            if ($request->Laboratory == 'Others') {
                //if lab is others, save text
                $BAT->laboratory = $request->Laboratory_text;
            } else {//if lab is selected
                $BAT->laboratory = $request->Laboratory;
            }
            //breath alcohol record and user transcribed
            $BAT->breathalcohol = $request->breathalcohol;
            $BAT->breathalcoholResult = $request->breathalcoholResult;
            $BAT->Usertranscribed = $request->Usertranscribed;

            $BAT->save();
            return true;
        }else{
            return false;
        }
    }

}
