<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_DQuestionnaire;
use App\SP2_DQuestionnaire;
use App\SP3_DQuestionnaire;
use App\SP4_DQuestionnaire;
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SP1_DQuestionnaire_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request,$study_id)
    {
        //custom messages load for validation
        $custom = [
            'DQtimeTaken.required' => 'Please enter the discharge time taken',
            'Oriented.required' => 'Please select the subject oriented',
            'ReadyDischarge.required' => 'Please select whether the subject is fit for discharge',
            'PhysicianSign.required' => 'Physician’s signature is required',
            'PhysicianName.required' => 'Physician’s name is required',
        ];

        //validation for required fields
        $validatedData=$this->validate($request,[
            'DQtimeTaken' => 'required',
            'Oriented' => 'required',
            'ReadyDischarge' => 'required',
            'PhysicianSign' => 'required',
            'PhysicianName' => 'required',
        ],$custom);

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
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Discharge Questionnaire!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            if($this->storeSP2($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Discharge Questionnaire!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            if($this->storeSP3($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Discharge Questionnaire!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            if($this->storeSP4($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 4 details for Discharge Questionnaire!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.input',$study_id));
        }
    }

    public function update(Request $request,$patient_id,$study_id){
        $study_period = $request->studyPeriod;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id',$patient_id)
                                        ->where('study_id',$study_id)
                                        ->first();
        //check study period and save
        if($study_period == '---'){
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }elseif($study_period == 1){
            if($this->updateSP1($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully update the study period 1 details for Discharge Questionnaire!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            if($this->updateSP2($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully update the study period 2 details for Discharge Questionnaire!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            if($this->updateSP3($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully update the study period 3 details for Discharge Questionnaire!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            if($this->updateSP4($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully update the study period 4 details for Discharge Questionnaire!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.input',$study_id));
        }
    }

    //store SP1_DQuestionnaire
    public function storeSP1($PSS,$request){
        if($PSS !=NULL && $PSS->SP1_ID != NULL){
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$PSS->SP1_ID)->first();
            $DQuestionnaire= SP1_DQuestionnaire::where('SP1_DQuestionnaire_ID',$findSP1->SP1_DQuestionnaire)->first();

            if($DQuestionnaire->DQtimeTaken == NULL){
                $flag=false;
                $data = $request->except('patient_id','studyPeriod','_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $DQuestionnaire[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $DQuestionnaire->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP2_DQuestionnaire
    public function storeSP2($PSS,$request){
        if($PSS !=NULL && $PSS->SP2_ID != NULL){
            //find admission table and update it
            $findSP2 = StudyPeriod2::where('SP2_ID',$PSS->SP2_ID)->first();
            $DQuestionnaire= SP2_DQuestionnaire::where('SP2_DQuestionnaire_ID',$findSP2->SP2_DQuestionnaire)->first();

            if($DQuestionnaire->DQtimeTaken == NULL){
                $flag=false;
                $data = $request->except('patient_id','studyPeriod','_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $DQuestionnaire[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $DQuestionnaire->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP3_DQuestionnaire
    public function storeSP3($PSS,$request){
        if($PSS !=NULL && $PSS->SP3_ID != NULL){
            //find admission table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID',$PSS->SP3_ID)->first();
            $DQuestionnaire= SP3_DQuestionnaire::where('SP3_DQuestionnaire_ID',$findSP3->SP3_DQuestionnaire)->first();

            if($DQuestionnaire->DQtimeTaken == NULL){
                $flag=false;
                $data = $request->except('patient_id','studyPeriod','_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $DQuestionnaire[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $DQuestionnaire->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP4_DQuestionnaire
    public function storeSP4($PSS,$request){
        if($PSS !=NULL && $PSS->SP4_ID != NULL){
            //find admission table and update it
            $findSP4 = StudyPeriod4::where('SP4_ID',$PSS->SP4_ID)->first();
            $DQuestionnaire= SP4_DQuestionnaire::where('SP4_DQuestionnaire_ID',$findSP4->SP4_DQuestionnaire)->first();

            if($DQuestionnaire->DQtimeTaken == NULL){
                $flag=false;
                $data = $request->except('patient_id','studyPeriod','_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $DQuestionnaire[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $DQuestionnaire->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //update SP1_DQuestionnaire
    public function updateSP1($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$PSS->SP1_ID)->first();
            $DQuestionnaire= SP1_DQuestionnaire::where('SP1_DQuestionnaire_ID',$findSP1->SP1_DQuestionnaire)->first();

            $flag=false;
            $data = $request->except('patient_id','studyPeriod','_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $DQuestionnaire[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $DQuestionnaire->save();
            }
            return true;
        }else{
            return false;
        }
    }

    //update SP2_DQuestionnaire
    public function updateSP2($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP2 = StudyPeriod2::where('SP2_ID',$PSS->SP2_ID)->first();
            $DQuestionnaire= SP2_DQuestionnaire::where('SP2_DQuestionnaire_ID',$findSP2->SP2_DQuestionnaire)->first();

            $flag=false;
            $data = $request->except('patient_id','studyPeriod','_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $DQuestionnaire[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $DQuestionnaire->save();
            }
            return true;
        }else{
            return false;
        }
    }

    //update SP3_DQuestionnaire
    public function updateSP3($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID',$PSS->SP3_ID)->first();
            $DQuestionnaire= SP3_DQuestionnaire::where('SP3_DQuestionnaire_ID',$findSP3->SP3_DQuestionnaire)->first();

            $flag=false;
            $data = $request->except('patient_id','studyPeriod','_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $DQuestionnaire[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $DQuestionnaire->save();
            }
            return true;
        }else{
            return false;
        }
    }

    //update SP4_DQuestionnaire
    public function updateSP4($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP4 = StudyPeriod4::where('SP4_ID',$PSS->SP4_ID)->first();
            $DQuestionnaire= SP4_DQuestionnaire::where('SP4_DQuestionnaire_ID',$findSP4->SP4_DQuestionnaire)->first();

            $flag=false;
            $data = $request->except('patient_id','studyPeriod','_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $DQuestionnaire[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $DQuestionnaire->save();
            }
            return true;
        }else{
            return false;
        }
    }

}
