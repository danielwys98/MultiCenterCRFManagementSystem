<?php

namespace App\Http\Controllers;

use App\FollowUpQuestionnaire;
use App\ConclusionParticipation;
use App\Patient;
use App\PatientStudySpecific;
use App\studySpecific;
use Illuminate\Http\Request;
use PDF;

class PostStudy_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkAdmin');
    }

    public function updateFollowUpQ($PID, $study_id, Request $request)
    {
        $pss = PatientStudySpecific::where('study_id', $study_id)->where('patient_id', $PID)->first();
        if ($request->submitbutton == 'Generate Report') {
            //$this->downloadFollowUpQ($PID,$study_id);
            return redirect(route('downloadFollowUpQ', ['PID' => $PID, 'study_id' => $study_id]));
        } else {
            if ($pss->FollowUpQuestionnaire_ID != NULL) {
                $FollowUpQ = FollowUpQuestionnaire::where('FollowUpQuestionnaire_ID', $pss->FollowUpQuestionnaire_ID)->first();
                if($request->NApplicable==1){
                    $FollowUpQ->FollowUpDateTaken = NULL;
                    $FollowUpQ->AdmissionTimeTaken =NULL;
                    $FollowUpQ->MedicalProblem = NULL;
                    $FollowUpQ->Medication = NULL;
                    $FollowUpQ->Hospitalized = NULL;
                    $FollowUpQ->otherDrugStudies= NULL;
                    $FollowUpQ->Comment= NULL;
                    $FollowUpQ->PhysicianInitial = NULL;
                    $FollowUpQ->physicianSign = NULL;
                    $FollowUpQ->physicianName = NULL;
                    $FollowUpQ->DateSign = NULL;

                }
                $FollowUpQ->NApplicable = $request->NApplicable;
                $FollowUpQ->AdmissionTimeTaken = $request->AdmissionTimeTaken;
                $FollowUpQ->MedicalProblem = $request->MedicalProblem;
                $FollowUpQ->Medication = $request->Medication;
                $FollowUpQ->Hospitalized = $request->Hospitalized;
                if ($request->otherdrugdtudies == 'Yes') {
                    $FollowUpQ->otherDrugStudies = $request->otherDrugStudies_Yes;
                } else {
                    $FollowUpQ->otherDrugStudies = $request->otherdrugstudies;
                }
                if ($request->comment == 'Well') {
                    $FollowUpQ->Comment = $request->comment;
                } else {
                    $FollowUpQ->Comment = $request->Comment_text;
                }
                $FollowUpQ->PhysicianInitial = $request->PhysicianInitial;
                $FollowUpQ->physicianSign = $request->physicianSign;
                $FollowUpQ->physicianName = $request->physicianName;
                $FollowUpQ->DateSign = $request->DateSign;
                $FollowUpQ->save();

                return redirect(route('studySpecific.admin'))->with('success','You have successfully save the Safety Follow Up Questionnaire');
            } else {
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect()->back();
            }
        }
    }

    public function downloadFollowUpQ($PID, $study_id)
    {
        $pss = PatientStudySpecific::where('study_id', $study_id)->where('patient_id', $PID)->first();
        $study = studySpecific::where('study_id', $study_id)->first();
        $patient = Patient::where('id', $PID)->first();
        $followUpQ = FollowUpQuestionnaire::where('FollowUpQuestionnaire_ID', $pss->FollowUpQuestionnaire_ID)->first();

        $pdf = PDF::loadView('studySpecific.FollowUpQuestionnaireReport', compact('followUpQ', 'patient', 'study'))->setpaper('A4', 'portrait');
        //PDF::loadView('bladefilename',compact('variable')) something like return view.
        /*$pdf = PDF::loadView('test', compact('Admission'))->setPaper('A4','landscape');*/

        //if want view in google use $filename->stream
        //if want test download use $file->download('filename')
        return $pdf->download('FollowUpQuestionnaire.pdf');

        /*  echo"This works";*/
    }

    public function updateConclusionP($PID, $study_id, Request $request)
    {
        $pss = PatientStudySpecific::where('study_id', $study_id)->where('patient_id', $PID)->first();
        //This is to redirect to the downloadPDF function below for ConclusionP
        if ($request->submitbutton == "Generate Report") {
            return redirect(route('downloadConclusionP', ['PID' => $PID, 'study_id' => $study_id]));
        } else {
            if ($pss->conclusion_participation_id != NULL) {
                $ConclusionP = ConclusionParticipation::where('conclusion_participation_id', $pss->conclusion_participation_id)->first();

                $ConclusionP->Pre_Reserve = $request->Pre_Reserve;
                $ConclusionP->Pre_Yes = $request->Pre_Yes;
                $ConclusionP->Pre_SubDecision = $request->Pre_SubDecision;
                $ConclusionP->Pre_PhyDecision = $request->Pre_PhyDecision;
                $ConclusionP->Pre_Exclusion = $request->Pre_Exclusion;
                $ConclusionP->Pre_ProtoViolation = $request->Pre_ProtoViolation;
                $ConclusionP->Pre_Lost = $request->Pre_Lost;
                $ConclusionP->Pre_Adverse = $request->Pre_Adverse;
                $ConclusionP->Pre_Death = $request->Pre_Death;
                $ConclusionP->Pre_others = $request->Pre_Others;
                if ($request->Pre_Others == 'Others') {
                    $ConclusionP->Pre_others_text = $request->Pre_Others_text;
                } else {
                    $ConclusionP->Pre_others_text = NULL;
                }

                $ConclusionP->SP1_Yes = $request->SP1_Yes;
                $ConclusionP->SP1_SubDecision = $request->SP1_SubDecision;
                $ConclusionP->SP1_PhyDecision = $request->SP1_PhyDecision;
                $ConclusionP->SP1_Exclusion = $request->SP1_Exclusion;
                $ConclusionP->SP1_ProtoViolation = $request->SP1_ProtoViolation;
                $ConclusionP->SP1_Lost = $request->SP1_Lost;
                $ConclusionP->SP1_Adverse = $request->SP1_Adverse;
                $ConclusionP->SP1_Death = $request->SP1_Death;
                $ConclusionP->SP1_others = $request->SP1_Others;
                if ($request->SP1_Others == 'Others') {
                    $ConclusionP->SP1_others_text = $request->SP1_Others_text;
                } else {
                    $ConclusionP->SP1_others_text = NULL;
                }

                $ConclusionP->SP2_Yes = $request->SP2_Yes;
                $ConclusionP->SP2_SubDecision = $request->SP2_SubDecision;
                $ConclusionP->SP2_PhyDecision = $request->SP2_PhyDecision;
                $ConclusionP->SP2_Exclusion = $request->SP2_Exclusion;
                $ConclusionP->SP2_ProtoViolation = $request->SP2_ProtoViolation;
                $ConclusionP->SP2_Lost = $request->SP2_Lost;
                $ConclusionP->SP2_Adverse = $request->SP2_Adverse;
                $ConclusionP->SP2_Death = $request->SP2_Death;
                $ConclusionP->SP2_others = $request->SP2_Others;
                if ($request->SP2_Others == 'Others') {
                    $ConclusionP->SP2_others_text = $request->SP2_Others_text;
                } else {
                    $ConclusionP->SP2_others_text = NULL;
                }

                $ConclusionP->SP3_Yes = $request->SP3_Yes;
                $ConclusionP->SP3_SubDecision = $request->SP3_SubDecision;
                $ConclusionP->SP3_PhyDecision = $request->SP3_PhyDecision;
                $ConclusionP->SP3_Exclusion = $request->SP3_Exclusion;
                $ConclusionP->SP3_ProtoViolation = $request->SP3_ProtoViolation;
                $ConclusionP->SP3_Lost = $request->SP3_Lost;
                $ConclusionP->SP3_Adverse = $request->SP3_Adverse;
                $ConclusionP->SP3_Death = $request->SP3_Death;
                $ConclusionP->SP3_others = $request->SP3_Others;
                if ($request->SP3_Others == 'Others') {
                    $ConclusionP->SP3_others_text = $request->SP3_Others_text;
                } else {
                    $ConclusionP->SP3_others_text = NULL;
                }

                $ConclusionP->SP4_Yes = $request->SP4_Yes;
                $ConclusionP->SP4_SubDecision = $request->SP4_SubDecision;
                $ConclusionP->SP4_PhyDecision = $request->SP4_PhyDecision;
                $ConclusionP->SP4_Exclusion = $request->SP4_Exclusion;
                $ConclusionP->SP4_ProtoViolation = $request->SP4_ProtoViolation;
                $ConclusionP->SP4_Lost = $request->SP4_Lost;
                $ConclusionP->SP4_Adverse = $request->SP4_Adverse;
                $ConclusionP->SP4_Death = $request->SP4_Death;
                $ConclusionP->SP4_others = $request->SP4_Others;
                if ($request->SP4_Others == 'Others') {
                    $ConclusionP->SP4_others_text = $request->SP4_Others_text;
                } else {
                    $ConclusionP->SP4_others_text = NULL;
                }

                $ConclusionP->Fol_Yes = $request->Fol_Yes;
                $ConclusionP->Fol_SubDecision = $request->Fol_SubDecision;
                $ConclusionP->Fol_PhyDecision = $request->Fol_PhyDecision;
                $ConclusionP->Fol_Exclusion = $request->Fol_Exclusion;
                $ConclusionP->Fol_ProtoViolation = $request->Fol_ProtoViolation;
                $ConclusionP->Fol_Lost = $request->Fol_Lost;
                $ConclusionP->Fol_Adverse = $request->Fol_Adverse;
                $ConclusionP->Fol_Death = $request->Fol_Death;
                $ConclusionP->Fol_others = $request->Fol_Others;
                if ($request->Fol_Others == 'Others') {
                    $ConclusionP->Fol_others_text = $request->Fol_Others_text;
                } else {
                    $ConclusionP->Fol_others_text = NULL;
                }

                $ConclusionP->InvestSign = $request->InvestSign;
                $ConclusionP->InvestName = $request->InvestName;
                $ConclusionP->DateTaken = $request->DateTaken;

                $ConclusionP->save();

                return redirect(route('studySpecific.admin'))->with('success','You have successfully save the Conclusion of Participation Form');
            } else {
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect()->back();
            }
        }
    }

    public function downloadConclusionP($PID, $study_id)
    {
        $pss = PatientStudySpecific::where('study_id', $study_id)->where('patient_id', $PID)->first();
        $study = studySpecific::where('study_id', $study_id)->first();
        $patient = Patient::where('id', $PID)->first();
        $ConclusionP = ConclusionParticipation::where('conclusion_participation_id', $pss->conclusion_participation_id)->first();

        $pdf = PDF::loadView('studySpecific.ConclusionParticipationReport', compact('ConclusionP', 'patient', 'study'))->setpaper('A4', 'portrait');
        return $pdf->download('ConclusionParticipation.pdf');
    }
}
