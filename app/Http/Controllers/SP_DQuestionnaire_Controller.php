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

class SP_DQuestionnaire_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request,$study_id)
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
            $DQuestionnaire= SP1_DQuestionnaire::where('SP1_DQuestionnaire_ID',$SP1->SP1_DQuestionnaire)->first();
            if($this->storeSP($findPSS,$PSS,$DQuestionnaire,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Discharge Questionnaire!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $DQuestionnaire= SP2_DQuestionnaire::where('SP2_DQuestionnaire_ID',$SP2->SP2_DQuestionnaire)->first();
            if($this->storeSP($findPSS,$PSS,$DQuestionnaire,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Discharge Questionnaire!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $DQuestionnaire= SP3_DQuestionnaire::where('SP3_DQuestionnaire_ID',$SP3->SP3_DQuestionnaire)->first();
            if($this->storeSP($findPSS,$PSS,$DQuestionnaire,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Discharge Questionnaire!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $DQuestionnaire= SP4_DQuestionnaire::where('SP4_DQuestionnaire_ID',$SP4->SP4_DQuestionnaire)->first();
            if($this->storeSP($findPSS,$PSS,$DQuestionnaire,$request)){
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

    public function update(Request $request,$patient_id,$study_id,$study_period)
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
            $DQuestionnaire= SP1_DQuestionnaire::where('SP1_DQuestionnaire_ID',$SP1->SP1_DQuestionnaire)->first();
            if($this->updateSP($findPSS,$PSS,$DQuestionnaire,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 1 details for Discharge Questionnaire!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $DQuestionnaire= SP2_DQuestionnaire::where('SP2_DQuestionnaire_ID',$SP2->SP2_DQuestionnaire)->first();
            if($this->updateSP($findPSS,$PSS,$DQuestionnaire,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 2 details for Discharge Questionnaire!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $DQuestionnaire= SP3_DQuestionnaire::where('SP3_DQuestionnaire_ID',$SP3->SP3_DQuestionnaire)->first();
            if($this->updateSP($findPSS,$PSS,$DQuestionnaire,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 3 details for Discharge Questionnaire!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $DQuestionnaire= SP4_DQuestionnaire::where('SP4_DQuestionnaire_ID',$SP4->SP4_DQuestionnaire)->first();
            if($this->updateSP($findPSS,$PSS,$DQuestionnaire,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 4 details for Discharge Questionnaire!');
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
    public function storeSP($findPSS,$PSS,$DQuestionnaire,$request){
        //custom messages load for validation
        $custom = [
            'DQtimeTaken.required' => 'Please enter the discharge time taken',
            'Oriented.required' => 'Please select the subject oriented',
            'ReadyDischarge.required' => 'Please select whether the subject is fit for discharge',
            'PhysicianSign.required' => 'Physician’s signature is required',
            'PhysicianName.required' => 'Physician’s name is required',
        ];

        if($findPSS !=NULL && $PSS != NULL){
            if($DQuestionnaire->DQtimeTaken == NULL){
                $flag=false;
                $data = $request->except('patient_id','studyPeriod','_token','_method');
                //validation for required fields
                $validatedData=$this->validate($request,[
                    'DQtimeTaken' => 'required',
                    'Oriented' => 'required',
                    'ReadyDischarge' => 'required',
                    'PhysicianSign' => 'required',
                    'PhysicianName' => 'required',
                ],$custom);
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

    //update
    public function updateSP($findPSS,$PSS,$DQuestionnaire,$request){
        //custom messages load for validation
        $custom = [
            'DQtimeTaken.required' => 'Please enter the discharge time taken',
            'Oriented.required' => 'Please select the subject oriented',
            'ReadyDischarge.required' => 'Please select whether the subject is fit for discharge',
            'PhysicianSign.required' => 'Physician’s signature is required',
            'PhysicianName.required' => 'Physician’s name is required',
        ];
        
        if($findPSS !=NULL){
            $flag=false;
            $data = $request->except('_token','_method');
            //validation for required fields
            // $validatedData=$this->validate($request,[
            //     'DQtimeTaken' => 'required',
            //     'Oriented' => 'required',
            //     'ReadyDischarge' => 'required',
            //     'PhysicianSign' => 'required',
            //     'PhysicianName' => 'required',
            // ],$custom);
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
