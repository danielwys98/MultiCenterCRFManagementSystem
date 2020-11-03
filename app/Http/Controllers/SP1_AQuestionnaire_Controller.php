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
        //find Patient Study Specific table
        $findPSS =PatientStudySpecific::with('StudyPeriod1')
                                        ->where('patient_id',$PID)
                                        ->where('study_id',$study_id)
                                        ->first();
        if($findPSS !=NULL){
            //find SP1_ID to access the SP1_AdmissionQuestionnaore
            //find table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $findSP1_AQuestionnaire = SP1_AQuestionnaire::where('SP1_AQuestionnaire_ID',$findSP1->SP1_AQuestionnaire)->first();
            //custom messages load for validation
            $custom = [
                'AQuestionnaireDateTaken.required' => 'Please enter the admission questionnnaire date taken',
                'AQuestionnaireTimeTaken.required' => 'Please enter the admission questionnnaire time taken',
                'MedicalProblem.required' => 'Please answer the question 1',
                'MP_IncreaseRisk.required_if' => 'Please answer the question 1 first sub question',
                'MP_InfluencePKinetic.required_if' => 'Please answer the question 1 second sub question',
                'Medication.required' => 'Please answer the question 2',
                'Medi_IncreaseRisk.required_if' => 'Please answer the question 2 first sub question',
                'Medi_InfluencePKinetic.required_if' => 'Please answer the question 2 second sub question',
                'Hospitalized.required' => 'Please answer the question 3',
                'H_IncreaseRisk.required_if' => 'Please answer the question 3 first sub question',
                'H_InfluencePKinetic.required_if' => 'Please answer the question 3 second sub question',
                'alcoholXanthine.required' => 'Please answer the question 4',
                'alcoholXanthine_Yes.required_if' => 'If Yes is selected in question 4, please specify amount and time taken',
                'AX_InfluencePKinetic.required_if' => 'Please answer the question 4 second sub question',
                'poppySeeds.required' => 'Please answer the question 5',
                'poppySeeds_Yes.required_if' => 'If Yes is selected in question 5, please specify amount and time taken',
                'PS_InfluencePKinetic.required_if' => 'Please answer the question 5 second sub question',
                'grapefruitPomelo.required' => 'Please answer the question 6',
                'grapefruitPomelo_Yes.required_if' => 'If Yes is selected in question 6, please specify amount and time taken',
                'Grapefruit_InfluencePKinetic.required_if' => 'Please answer the question 6 second sub question',
                'otherDrugStudies.required' => 'Please answer the question 7',
                'otherDrugStudies_Yes.required_if' => 'If Yes is selected in question 7, please provide details',
                'Other_IncreaseRisk.required_if' => 'Please answer the question 7 second sub question',
                'Other_InfluencePKinetic.required_if' => 'Please answer the question 7 third sub question',
                'bloodDono.required' => 'Please answer the question 8',
                'bloodDono_Yes.required_if' => 'If Yes is selected in question 8, please provide details',
                'Blood_IncreaseRisk.required_if' => 'Please answer the question 8 second sub question',
                'contraception.required' => 'Please answer the question 9',
                'contraception_Yes.required_if' => 'If Yes is selected in question 9, please provide details',
                'Contraception_IncreaseRisk.required_if' => 'Please answer the question 9 second sub question',
            ];
            //validation for required fields
            $validatedData=$this->validate($request,[
                'AQuestionnaireDateTaken' => 'required',
                'AQuestionnaireTimeTaken' => 'required',
                'MedicalProblem' => 'required',
                'MP_IncreaseRisk' => 'required_if:MedicalProblem,==,Yes',
                'MP_InfluencePKinetic' => 'required_if:MedicalProblem,==,Yes',
                'Medication' => 'required',
                'Medi_IncreaseRisk' => 'required_if:Medication,==,Yes',
                'Medi_InfluencePKinetic' => 'required_if:Medication,==,Yes',
                'Hospitalized' => 'required',
                'H_IncreaseRisk' => 'required_if:Hospitalized,==,Yes',
                'H_InfluencePKinetic' => 'required_if:Hospitalized,==,Yes',
                'alcoholXanthine' => 'required',
                'alcoholXanthine_Yes' => 'required_if:alcoholXanthine,==,Yes',
                'AX_InfluencePKinetic' => 'required_if:alcoholXanthine,==,Yes',
                'poppySeeds' => 'required',
                'poppySeeds_Yes' => 'required_if:poppySeeds,==,Yes',
                'PS_InfluencePKinetic' => 'required_if:poppySeeds,==,Yes',
                'grapefruitPomelo' => 'required',
                'grapefruitPomelo_Yes' => 'required_if:grapefruitPomelo,==,Yes',
                'Grapefruit_InfluencePKinetic' => 'required_if:grapefruitPomelo,==,Yes',
                'otherDrugStudies' => 'required',
                'otherDrugStudies_Yes' => 'required_if:otherDrugStudies,==,Yes',
                'Other_IncreaseRisk' => 'required_if:otherDrugStudies,==,Yes',
                'Other_InfluencePKinetic' => 'required_if:otherDrugStudies,==,Yes',
                'bloodDono' => 'required',
                'bloodDono_Yes' => 'required_if:bloodDono,==,Yes',
                'Blood_IncreaseRisk' => 'required_if:bloodDono,==,Yes',
                'contraception' => 'required',
                'contraception_Yes' => 'required_if:contraception,==,Yes',
                'Contraception_IncreaseRisk' => 'required_if:contraception,==,Yes',
            ],$custom);

            //date and time for admission questionnaire
            $findSP1_AQuestionnaire->AQuestionnaireDateTaken = $request->AQuestionnaireDateTaken;
            $findSP1_AQuestionnaire->AQuestionnaireTimeTaken = $request->AQuestionnaireTimeTaken;

            //admission questionnaire
            //question 1
            $findSP1_AQuestionnaire->MedicalProblem = $request->MedicalProblem;
            if($request->MedicalProblem=='Yes') {
                $findSP1_AQuestionnaire->MP_IncreaseRisk = $request->MP_IncreaseRisk;
                $findSP1_AQuestionnaire->MP_InfluencePKinetic = $request->MP_InfluencePKinetic;
            }else{
                $findSP1_AQuestionnaire->MP_IncreaseRisk = NULL;
                $findSP1_AQuestionnaire->MP_InfluencePKinetic = NULL;
            }

            //question 2
            $findSP1_AQuestionnaire->Medication = $request->Medication;
            if($request->Medication=='Yes') {
                $findSP1_AQuestionnaire->Medi_IncreaseRisk = $request->Medi_IncreaseRisk;
                $findSP1_AQuestionnaire->Medi_InfluencePKinetic = $request->Medi_InfluencePKinetic;
            }else{
                $findSP1_AQuestionnaire->Medi_IncreaseRisk = NULL;
                $findSP1_AQuestionnaire->Medi_InfluencePKinetic = NULL;
            }

            //question 3
            $findSP1_AQuestionnaire->Hospitalized = $request->Hospitalized;
            if($request->Hospitalized=='Yes') {
                $findSP1_AQuestionnaire->H_IncreaseRisk = $request->H_IncreaseRisk;
                $findSP1_AQuestionnaire->H_InfluencePKinetic = $request->H_InfluencePKinetic;
            }else{
                $findSP1_AQuestionnaire->H_IncreaseRisk = NULL;
                $findSP1_AQuestionnaire->H_InfluencePKinetic = NULL;
            }

            //question 4
            $q4=$request->alcoholXanthine;
            if ($q4 == 'Yes') {
                $findSP1_AQuestionnaire->AlcoholXanthine = $request->alcoholXanthine_Yes;
                $findSP1_AQuestionnaire->AX_InfluencePKinetic = $request->AX_InfluencePKinetic;
            } else{
                $findSP1_AQuestionnaire->AlcoholXanthine = $request->alcoholXanthine;
                $findSP1_AQuestionnaire->AX_InfluencePKinetic = NULL;
            }

            //question 5
            $q5=$request->poppySeeds;
            if ($q5 == 'Yes') {
                $findSP1_AQuestionnaire->PoppySeeds = $request->poppySeeds_Yes;
                $findSP1_AQuestionnaire->PS_InfluencePKinetic = $request->PS_InfluencePKinetic;
            } else{
                $findSP1_AQuestionnaire->PoppySeeds = $request->poppySeeds;
                $findSP1_AQuestionnaire->PS_InfluencePKinetic = NULL;
            }

            //question 6
            $q6=$request->grapefruitPomelo;
            if ($q6 == 'Yes') {
                $findSP1_AQuestionnaire->GrapefruitPomelo = $request->grapefruitPomelo_Yes;
                $findSP1_AQuestionnaire->Grapefruit_InfluencePKinetic = $request->Grapefruit_InfluencePKinetic;
            } else{
                $findSP1_AQuestionnaire->GrapefruitPomelo = $request->grapefruitPomelo;
                $findSP1_AQuestionnaire->Grapefruit_InfluencePKinetic = NULL;
            }

            //question 7
            $q7=$request->otherDrugStudies;
            if ($q7 == 'Yes') {
                $findSP1_AQuestionnaire->OtherDrugStudies = $request->otherDrugStudies_Yes;
                $findSP1_AQuestionnaire->Other_IncreaseRisk = $request->Other_IncreaseRisk;
                $findSP1_AQuestionnaire->Other_InfluencePKinetic = $request->Other_InfluencePKinetic;
            } else{
                $findSP1_AQuestionnaire->OtherDrugStudies = $request->otherDrugStudies;

                $findSP1_AQuestionnaire->Other_IncreaseRisk = NULL;
                $findSP1_AQuestionnaire->Other_InfluencePKinetic = NULL;
            }

            //question 8
            $q8=$request->bloodDono;
            if ($q8 == 'Yes') {
                $findSP1_AQuestionnaire->BloodDono = $request->bloodDono_Yes;
                $findSP1_AQuestionnaire->Blood_IncreaseRisk = $request->Blood_IncreaseRisk;
            } else{
                $findSP1_AQuestionnaire->BloodDono = $request->bloodDono;
                $findSP1_AQuestionnaire->Blood_IncreaseRisk = NULL;
            }

            //question 9
            $q9=$request->contraception;
            if ($q9 == 'Yes') {
                $findSP1_AQuestionnaire->Contraception = $request->contraception_Yes;
                $findSP1_AQuestionnaire->Contraception_IncreaseRisk = $request->Contraception_IncreaseRisk;
            } else{
                $findSP1_AQuestionnaire->Contraception = $request->contraception;
                $findSP1_AQuestionnaire->Contraception_IncreaseRisk = NULL;
            }

            //physician initial
            $findSP1_AQuestionnaire->PhysicianInitial = $request->PhysicianInitial;

            $findSP1_AQuestionnaire->save();
            return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Admission Questionnaire!');
        }else{
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }
    }

    public function update(Request $request, $patient_id, $study_id)
    {
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id', $patient_id)
            ->where('study_id', $study_id)
            ->first();
        if ($findPSS != NULL) {
            $findSP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
            $AQ = SP1_AQuestionnaire::where('SP1_AQuestionnaire_ID', $findSP1->SP1_AQuestionnaire)->first();
        }
         //date and time for admission questionnaire
         $AQ->AQuestionnaireDateTaken = $request->AQuestionnaireDateTaken;
         $AQ->AQuestionnaireTimeTaken = $request->AQuestionnaireTimeTaken;

         //admission questionnaire
         //question 1
         $AQ->MedicalProblem = $request->MedicalProblem;
         if($request->MedicalProblem=='Yes') {
             $AQ->MP_IncreaseRisk = $request->MP_IncreaseRisk;
             $AQ->MP_InfluencePKinetic = $request->MP_InfluencePKinetic;
         }else{
             $AQ->MP_IncreaseRisk = NULL;
             $AQ->MP_InfluencePKinetic = NULL;
         }

         //question 2
         $AQ->Medication = $request->Medication;
         if($request->Medication=='Yes') {
             $AQ->Medi_IncreaseRisk = $request->Medi_IncreaseRisk;
             $AQ->Medi_InfluencePKinetic = $request->Medi_InfluencePKinetic;
         }else{
             $AQ->Medi_IncreaseRisk = NULL;
             $AQ->Medi_InfluencePKinetic = NULL;

         }

         //question 3
         $AQ->Hospitalized = $request->Hospitalized;
         if($request->Hospitalized=='Yes') {
             $AQ->H_IncreaseRisk = $request->H_IncreaseRisk;
             $AQ->H_InfluencePKinetic = $request->H_InfluencePKinetic;
         }else{
             $AQ->H_IncreaseRisk = NULL;
             $AQ->H_InfluencePKinetic = NULL;

         }

         //question 4
         $q4=$request->alcoholXanthine;
         if ($q4 == 'Yes') {
             $AQ->AlcoholXanthine = $request->alcoholXanthine_Yes;
             $AQ->AX_InfluencePKinetic = $request->AX_InfluencePKinetic;
         } else{
             $AQ->AlcoholXanthine = $request->alcoholXanthine;
             $AQ->AX_InfluencePKinetic = NULL;
         }

         //question 5
         $q5=$request->poppySeeds;
         if ($q5 == 'Yes') {
             $AQ->PoppySeeds = $request->poppySeeds_Yes;
             $AQ->PS_InfluencePKinetic = $request->PS_InfluencePKinetic;
         } else{
             $AQ->PoppySeeds = $request->poppySeeds;
             $AQ->PS_InfluencePKinetic = NULL;
         }

         //question 6
         $q6=$request->grapefruitPomelo;
         if ($q6 == 'Yes') {
             $AQ->GrapefruitPomelo = $request->grapefruitPomelo_Yes;
             $AQ->Grapefruit_InfluencePKinetic = $request->Grapefruit_InfluencePKinetic;
         } else{
             $AQ->GrapefruitPomelo = $request->grapefruitPomelo;
             $AQ->Grapefruit_InfluencePKinetic = NULL;
         }

         //question 7
         $q7=$request->otherDrugStudies;
         if ($q7 == 'Yes') {
             $AQ->OtherDrugStudies = $request->otherDrugStudies_Yes;
             $AQ->Other_IncreaseRisk = $request->Other_IncreaseRisk;
             $AQ->Other_InfluencePKinetic = $request->Other_InfluencePKinetic;
         } else{
             $AQ->OtherDrugStudies = $request->otherDrugStudies;
             $AQ->Other_IncreaseRisk = NULL;
             $AQ->Other_InfluencePKinetic = NULL;
         }

         //question 8
         $q8=$request->bloodDono;
         if ($q8 == 'Yes') {
             $AQ->BloodDono = $request->bloodDono_Yes;
             $AQ->Blood_IncreaseRisk = $request->Blood_IncreaseRisk;
         } else{
             $AQ->BloodDono = $request->bloodDono;
             $AQ->Blood_IncreaseRisk = NULL;

         }

         //question 9
         $q9=$request->contraception;
         if ($q9 == 'Yes') {
             $AQ->Contraception = $request->contraception_Yes;
             $AQ->Contraception_IncreaseRisk = $request->Contraception_IncreaseRisk;
         } else{
             $AQ->Contraception = $request->contraception;
             $AQ->Contraception_IncreaseRisk = NULL;
         }

         //physician initial
         $AQ->PhysicianInitial = $request->PhysicianInitial;

         $AQ->save();
        return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details for Admission Questionnaire!');
    }
}
