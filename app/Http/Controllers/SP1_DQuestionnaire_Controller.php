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

        //assuming request inside has Patient ID of 2 and update study details (admission) of patient 5 (testing purpose)
        /*  $PID = 2;*/
        //find Patient Study Specific table
        $findPSS =PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id',$PID)
            ->where('study_id',$study_id)->first();

        if($findPSS !=NULL){
            //find SP1_ID to access the SP1_Discharge
            //find Discharge table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $findSP1_DQuestionnaire = SP1_DQuestionnaire::where('SP1_DQuestionnaire_ID',$findSP1->SP1_DQuestionnaire)->first();

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
