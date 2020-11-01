<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_DQuestionnaire;
use App\StudyPeriod1;
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
        $PID = $request->patient_id;
        //find Patient Study Specific table
        $findPSS =PatientStudySpecific::with('StudyPeriod1')
                                        ->where('patient_id',$PID)
                                        ->where('study_id',$study_id)
                                        ->first();
        if($findPSS !=NULL){
            //find SP1_ID to access the SP1_DQuestionnaire
            //find table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $findSP1_DQuestionnaire = SP1_DQuestionnaire::where('SP1_DQuestionnaire_ID',$findSP1->SP1_DQuestionnaire)->first();
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

            $findSP1_DQuestionnaire->DQtimeTaken = $request->DQtimeTaken;

            $findSP1_DQuestionnaire->Oriented = $request->Oriented;
            $findSP1_DQuestionnaire->ReadyDischarge = $request->ReadyDischarge;
            $findSP1_DQuestionnaire->AdditionalRemarks = $request->AdditionalRemarks;

            $findSP1_DQuestionnaire->PhysicianSign = $request->PhysicianSign;
            $findSP1_DQuestionnaire->PhysicianName = $request->PhysicianName;

            $findSP1_DQuestionnaire->save();

            return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Discharge Questionnaire!');
        }else{
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }

    }
}
