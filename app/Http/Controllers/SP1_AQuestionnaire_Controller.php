<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_AQuestionnaire;
use App\StudyPeriod1;
use Illuminate\Http\Request;

class SP1_AQuestionnaire_Controller extends Controller
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
            ->where('study_id',$study_id)
            ->first();

        if($findPSS !=NULL){
            //find SP1_ID to access the SP1_Admission
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $findSP1_AQuestionnaire = SP1_AQuestionnaire::where('SP1_AQuestionnaire_ID',$findSP1->SP1_AQuestionnaire)->first();

            //date and time for admission questionnaire
            $findSP1_AQuestionnaire->AQuestionnaireDateTaken = $request->AQuestionnaireDateTaken;
            $findSP1_AQuestionnaire->AQuestionnaireTimeTaken = $request->AQuestionnaireTimeTaken;

            //admission questionnaire
            //question 1
            $findSP1_AQuestionnaire->MedicalProblem = $request->MedicalProblem;
            $findSP1_AQuestionnaire->MP_IncreaseRisk = $request->MP_IncreaseRisk;
            $findSP1_AQuestionnaire->MP_InfluencePKinetic = $request->MP_InfluencePKinetic;

            //question 2
            $findSP1_AQuestionnaire->Medication = $request->Medication;
            $findSP1_AQuestionnaire->Medi_IncreaseRisk = $request->Medi_IncreaseRisk;
            $findSP1_AQuestionnaire->Medi_InfluencePKinetic = $request->Medi_InfluencePKinetic;

            //question 3
            $findSP1_AQuestionnaire->Hospitalized = $request->Hospitalized;
            $findSP1_AQuestionnaire->H_IncreaseRisk = $request->H_IncreaseRisk;
            $findSP1_AQuestionnaire->H_InfluencePKinetic = $request->H_InfluencePKinetic;

            //question 4
            $findSP1_AQuestionnaire->AlcoholXanthine = $request->AlcoholXanthine;
            $findSP1_AQuestionnaire->AX_InfluencePKinetic = $request->AX_InfluencePKinetic;

            //question 5
            $findSP1_AQuestionnaire->PoppySeeds = $request->PoppySeeds;
            $findSP1_AQuestionnaire->PS_InfluencePKinetic = $request->PS_InfluencePKinetic;

            //question 6
            $findSP1_AQuestionnaire->GrapefruitPomelo = $request->GrapefruitPomelo;
            $findSP1_AQuestionnaire->Grapefruit_InfluencePKinetic = $request->Grapefruit_InfluencePKinetic;

            //question 7
            $findSP1_AQuestionnaire->OtherDrugStudies = $request->OtherDrugStudies;
            $findSP1_AQuestionnaire->Other_IncreaseRisk = $request->Other_IncreaseRisk;
            $findSP1_AQuestionnaire->Other_InfluencePKinetic = $request->Other_InfluencePKinetic;

            //question 8
            $findSP1_AQuestionnaire->BloodDono = $request->BloodDono;
            $findSP1_AQuestionnaire->Blood_IncreaseRisk = $request->Blood_IncreaseRisk;

            //question 9
            $findSP1_AQuestionnaire->Contraception = $request->Contraception;
            $findSP1_AQuestionnaire->Contraception_IncreaseRisk = $request->Contraception_IncreaseRisk;

            //physician initial
            $findSP1_AQuestionnaire->PhysicianInitial = $request->PhysicianInitial;

            $findSP1_AQuestionnaire->save();
            return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Admission Questionnaire!');
        }else{
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }

    }
}
