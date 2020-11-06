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

class SP_BAT_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $study_id)
    {
        $PID = $request->patient_id;
        $study_period = $request->studyPeriod;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id',$PID)
                                        ->where('study_id',$study_id)
                                        ->first();
        //check study period and save
        if($study_period == 1){
            //SP1 query
            $SP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $PSS = $findPSS->SP1_ID;
            $BAT = SP1_BAT::where('SP1_BAT_ID',$SP1->SP1_BATER)->first();
            if($this->storeSP($findPSS,$PSS,$BAT,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Breath Alcohol Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $BAT = SP2_BAT::where('SP2_BAT_ID',$SP2->SP2_BATER)->first();
            if($this->storeSP($findPSS,$PSS,$BAT,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Breath Alcohol Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $BAT = SP3_BAT::where('SP3_BAT_ID',$SP3->SP3_BATER)->first();
            if($this->storeSP($findPSS,$PSS,$BAT,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Breath Alcohol Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $BAT = SP4_BAT::where('SP4_BAT_ID',$SP4->SP4_BATER)->first();
            if($this->storeSP($findPSS,$PSS,$BAT,$request)){
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
            //SP1 query
            $SP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $PSS = $findPSS->SP1_ID;
            $BAT = SP1_BAT::where('SP1_BAT_ID',$SP1->SP1_BATER)->first();
            if($this->updateSP($findPSS,$PSS,$BAT,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 1 details for Breath Alcohol Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $BAT = SP2_BAT::where('SP2_BAT_ID',$SP2->SP2_BATER)->first();
            if($this->updateSP($findPSS,$PSS,$BAT,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 2 details for Breath Alcohol Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $BAT = SP3_BAT::where('SP3_BAT_ID',$SP3->SP3_BATER)->first();
            if($this->updateSP($findPSS,$PSS,$BAT,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 3 details for Breath Alcohol Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $BAT = SP4_BAT::where('SP4_BAT_ID',$SP4->SP4_BATER)->first();
            if($this->updateSP($findPSS,$PSS,$BAT,$request)){
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

    //store
    public function storeSP($findPSS,$PSS,$BAT,$request){
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
        if($findPSS !=NULL && $PSS != NULL){
            if($BAT->dateTaken == NULL){

                $BAT->NApplicable=$request->NApplicable;
                if($request->NApplicable == 1){
                    $BAT->dateTaken = NULL;
                    $BAT->timeTaken = NULL;
                    $BAT->laboratory = NULL;
                    $BAT->breathalcohol = NULL;
                    $BAT->breathalcoholResult = NULL;
                    $BAT->Usertranscribed = NULL;
                }else{
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
                }
                
                $BAT->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //update
    public function updateSP($findPSS,$PSS,$BAT,$request){
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
        if($findPSS !=NULL){
            $BAT->NApplicable=$request->NApplicable;
            if($request->NApplicable == 1){
                $BAT->dateTaken = NULL;
                $BAT->timeTaken = NULL;
                $BAT->laboratory = NULL;
                $BAT->breathalcohol = NULL;
                $BAT->breathalcoholResult = NULL;
                $BAT->Usertranscribed = NULL;
            }else{
                //validation for required fields
                // $validatedData = $this->validate($request, [
                //     'dateTaken' => 'required',
                //     'timeTaken' => 'required',
                //     'Laboratory' => 'required',
                //     'Laboratory_text' => 'required_if:Laboratory,==,Others',
                //     'breathalcohol' => 'required',
                //     'breathalcoholResult' => 'required',
                //     'Usertranscribed' => 'required',
                // ], $custom);
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
            }
            $BAT->save();
            return true;
        }else{
            return false;
        }
    }

}
