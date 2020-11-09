<?php

namespace App\Http\Controllers;

use App\FollowUpQuestionnaire;
use App\PatientStudySpecific;
use App\studySpecific;
use Illuminate\Http\Request;

class PostStudy_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkAdmin');
    }

    public function update($PID,$study_id,Request $request){
        $pss=PatientStudySpecific::where('study_id',$study_id)->where('patient_id',$PID)->first();

        $FollowUpQ=FollowUpQuestionnaire::where('FollowUpQuestionnaire_ID',$pss->FollowUpQuestionnaire_ID)->first();
        $FollowUpQ->FollowUpDateTaken=$request->FollowUpDateTaken;
        $FollowUpQ->AdmissionTimeTaken=$request->AdmissionTimeTaken;
        $FollowUpQ->MedicalProblem=$request->MedicalProblem;
        $FollowUpQ->Medication=$request->Medication;
        $FollowUpQ->Hospitalized=$request->Hospitalized;
        if($request->otherDrugStudies=='Yes')
            $FollowUpQ->otherDrugStudies=$request->otherDrugStudies_Yes;
        else
            $FollowUpQ->otherDrugStudies=$request->otherDrugStudies;
        $FollowUpQ->PhysicianInitial=$request->PhysicianInitial;
        $FollowUpQ->physicianSign=$request->physicianSign;
        $FollowUpQ->physicianName=$request->physicianName;
        $FollowUpQ->save();

        return redirect(route('studySpecific.admin'));

    }
}
