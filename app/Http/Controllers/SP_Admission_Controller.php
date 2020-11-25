<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\studySpecific;
use App\PatientStudySpecific;
use DB;

//study period model
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;

//sp1 model
use App\SP1_Admission;
use App\SP1_AQuestionnaire;
use App\SP1_BAT;
use App\SP1_BMVS;
use App\SP1_Discharge;
use App\SP1_DQuestionnaire;
use App\SP1_IQ36;
use App\SP1_IQ48;
use App\SP1_IQ72;
use App\SP1_IQ96;
use App\SP1_PDynamicAnalysis;
use App\SP1_PDynamicSampling;
use App\SP1_PKineticSampling;
use App\SP1_UrineTest;
use App\SP1_VitalSigns;

//sp2 model
use App\SP2_Admission;
use App\SP2_AQuestionnaire;
use App\SP2_BAT;
use App\SP2_BMVS;
use App\SP2_Discharge;
use App\SP2_DQuestionnaire;
use App\SP2_IQ36;
use App\SP2_IQ48;
use App\SP2_IQ72;
use App\SP2_IQ96;
use App\SP2_PDynamicAnalysis;
use App\SP2_PDynamicSampling;
use App\SP2_PKineticSampling;
use App\SP2_UrineTest;
use App\SP2_VitalSigns;

//sp3 model
use App\SP3_Admission;
use App\SP3_AQuestionnaire;
use App\SP3_BAT;
use App\SP3_BMVS;
use App\SP3_Discharge;
use App\SP3_DQuestionnaire;
use App\SP3_IQ36;
use App\SP3_IQ48;
use App\SP3_IQ72;
use App\SP3_IQ96;
use App\SP3_PDynamicAnalysis;
use App\SP3_PDynamicSampling;
use App\SP3_PKineticSampling;
use App\SP3_UrineTest;
use App\SP3_VitalSigns;

//sp4 model
use App\SP4_Admission;
use App\SP4_AQuestionnaire;
use App\SP4_BAT;
use App\SP4_BMVS;
use App\SP4_Discharge;
use App\SP4_DQuestionnaire;
use App\SP4_IQ36;
use App\SP4_IQ48;
use App\SP4_IQ72;
use App\SP4_IQ96;
use App\SP4_PDynamicAnalysis;
use App\SP4_PDynamicSampling;
use App\SP4_PKineticSampling;
use App\SP4_UrineTest;
use App\SP4_VitalSigns;

use App\ConclusionParticipation;
use App\FollowUpQuestionnaire;

use Alert;
use Psr\Log\NullLogger;

class SP_Admission_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $study_id)
    {
        //assign patient id from request
        $PID = $request->patient_id;
        //indicate which study period users saving
        $study_period = $request->studyPeriod;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id', $PID)
            ->where('study_id', $study_id)
            ->first();
        $binded = false;
        if ($findPSS != NULL) {
            $this->bindingSP($findPSS, $study_period);
            $binded = true;
        }
        if ($binded) {
            //PSS found and SP1_ID is bind
            if ($study_period == 1) {
                if ($this->initaliseForms($findPSS, $PID, $study_id)) {
                    //SP1 queries
                    $SP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
                    $PSS = $findPSS->SP1_ID;
                    $admission = SP1_Admission::where('SP1_Admission_ID', $SP1->SP1_Admission)->first();
                    if ($this->storeSP($findPSS, $PSS, $admission, $request)) {
                        return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period 1 details for Admission!');
                    }
                } else {
                    alert()->error('Error!', 'You have already key the data for this subject!');
                    return redirect(route('studySpecific.input', $study_id));
                }
            } elseif ($study_period == 2) {
                //SP2 queries
                if ($this->initaliseFormsSP2($findPSS, $PID, $study_id)) {
                    $SP2 = StudyPeriod2::where('SP2_ID', $findPSS->SP2_ID)->first();
                    $PSS = $findPSS->SP2_ID;
                    $admission = SP2_Admission::where('SP2_Admission_ID', $SP2->SP2_Admission)->first();
                    if ($this->storeSP($findPSS, $PSS, $admission, $request)) {
                        return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period 2 details for Admission!');
                    }
                } else {
                    alert()->error('Error!', 'You have already key the data for this subject!');
                    return redirect(route('studySpecific.input', $study_id));
                }
            } elseif ($study_period == 3) {
                //SP3 queries
                if ($this->initaliseFormsSP3($findPSS, $PID, $study_id)) {
                    $SP3 = StudyPeriod3::where('SP3_ID', $findPSS->SP3_ID)->first();
                    $PSS = $findPSS->SP3_ID;
                    $admission = SP3_Admission::where('SP3_Admission_ID', $SP3->SP3_Admission)->first();
                    if ($this->storeSP($findPSS, $PSS, $admission, $request)) {
                        return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period 2 details for Admission!');
                    }
                } else {
                    alert()->error('Error!', 'You have already key the data for this subject!');
                    return redirect(route('studySpecific.input', $study_id));
                }
            } elseif ($study_period == 4) {
                //SP4 queries
                if ($this->initaliseFormsSP4($findPSS, $PID, $study_id)) {
                    $SP4 = StudyPeriod4::where('SP4_ID', $findPSS->SP4_ID)->first();
                    $PSS = $findPSS->SP4_ID;
                    $admission = SP4_Admission::where('SP4_Admission_ID', $SP4->SP4_Admission)->first();
                    if ($this->storeSP($findPSS, $PSS, $admission, $request)) {
                        return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period 2 details for Admission!');
                    }
                } else {
                    alert()->error('Error!', 'You have already key the data for this subject!');
                    return redirect(route('studySpecific.input', $study_id));
                }
            } else {
                alert()->error('Error!', 'You did not select the study period!');
             /*   return redirect(route('studySpecific.input', $study_id));*/
                return redirect()->back()->withInput();
            }
        }
    }

    public function edit(Request $request, $study_id)
    {
        $PID = $request->patient_id;
        $patient = Patient::where('id', $PID)->first();
        $study_period = $request->study_period;
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id', $PID)
            ->where('study_id', $study_id)
            ->first();
        if($findPSS!=NULL) {
            $followUpQ = FollowUpQuestionnaire::where('FollowUpQuestionnaire_ID', $findPSS->FollowUpQuestionnaire_ID)->first();
            $ConclusionP = ConclusionParticipation::where('conclusion_participation_id', $findPSS->conclusion_participation_id)->first();

            if ($request->submitbutton == "Safety Follow Up Questionnaire") {
                if($followUpQ!=NULL)
                    return view('studySpecific.FollowUpQuestionnaire', compact('PID', 'study_id', 'followUpQ', 'patient'));
                else {
                    alert()->error('Error!', 'Subject has not been admitted yet.');
                    return redirect(route('studySpecific.admin', $study_id));
                }
                /*return redirect(route('testing',['PID'=>$PID,'study_id'=>$study_id]));*/
            } elseif ($request->submitbutton == "Conclusion of Participation") {
                return view('studySpecific.ConclusionParticipation', compact('PID', 'study_id', 'ConclusionP', 'patient'));
            } else {
                $study = studySpecific::where('study_id', $study_id)->first();
                if ($study_period == 1) {
                    $findSP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
                    if ($findPSS != NULL) {
                        if ($findSP1 != NULL) {
                            $Admission = SP1_Admission::where('SP1_Admission_ID', $findSP1->SP1_Admission)->first();
                            $BMVS = SP1_BMVS::where('SP1_BMVS_ID', $findSP1->SP1_BMVS)->first();
                            $BAT = SP1_BAT::where('SP1_BAT_ID', $findSP1->SP1_BATER)->first();
                            $AQuestionnaire = SP1_AQuestionnaire::where('SP1_AQuestionnaire_ID', $findSP1->SP1_AQuestionnaire)->first();
                            $UrineTest = SP1_UrineTest::where('SP1_UrineTest_ID', $findSP1->SP1_UrineTest)->first();
                            $PKinetic = SP1_PKineticSampling::where('SP1_PKineticSampling_ID', $findSP1->SP1_PKineticSampling)->first();
                            $PDynamic = SP1_PDynamicSampling::where('SP1_PDynamicSampling_ID', $findSP1->SP1_PDynamicSampling)->first();
                            $PDAnalysis = SP1_PDynamicAnalysis::where('SP1_PDynamicAnalysis_ID', $findSP1->SP1_PDynamicAnalysis)->first();
                            $VitalSign = SP1_VitalSigns::where('SP1_VitalSign_ID', $findSP1->SP1_VitalSign)->first();
                            $Discharge = SP1_Discharge::where('SP1_Discharge_ID', $findSP1->SP1_Discharge)->first();
                            $DQuestionnaire = SP1_DQuestionnaire::where('SP1_DQuestionnaire_ID', $findSP1->SP1_DQuestionnaire)->first();
                            $IQ36 = SP1_IQ36::where('SP1_IQ36_ID', $findSP1->SP1_IQ36)->first();
                            $IQ48 = SP1_IQ48::where('SP1_IQ48_ID', $findSP1->SP1_IQ48)->first();
                            $IQ72 = SP1_IQ72::where('SP1_IQ72_ID', $findSP1->SP1_IQ72)->first();
                            $IQ96 = SP1_IQ96::where('SP1_IQ96_ID', $findSP1->SP1_IQ96)->first();
                            return view('SubjectStudySpecific', compact('Admission',
                                'BMVS',
                                'BAT',
                                'AQuestionnaire',
                                'UrineTest',
                                'PKinetic',
                                'PDynamic',
                                'PDAnalysis',
                                'VitalSign',
                                'Discharge',
                                'DQuestionnaire',
                                'IQ36',
                                'IQ48',
                                'IQ72',
                                'IQ96',
                                'study_id',
                                'study',
                                'study_period',
                                'patient'));
                        } else {
                            alert()->error('Error!', 'The admission form is not created for the subject!');
                            return redirect(route('studySpecific.admin', $study_id));
                        }
                    }
                } elseif ($study_period == 2) {
                    $findSP2 = StudyPeriod2::where('SP2_ID', $findPSS->SP2_ID)->first();
                    if ($findPSS != NULL) {
                        if ($findSP2 != NULL) {
                            $Admission = SP2_Admission::where('SP2_Admission_ID', $findSP2->SP2_Admission)->first();
                            $BMVS = SP2_BMVS::where('SP2_BMVS_ID', $findSP2->SP2_BMVS)->first();
                            $BAT = SP2_BAT::where('SP2_BAT_ID', $findSP2->SP2_BATER)->first();
                            $AQuestionnaire = SP2_AQuestionnaire::where('SP2_AQuestionnaire_ID', $findSP2->SP2_AQuestionnaire)->first();
                            $UrineTest = SP2_UrineTest::where('SP2_UrineTest_ID', $findSP2->SP2_UrineTest)->first();
                            $PKinetic = SP2_PKineticSampling::where('SP2_PKineticSampling_ID', $findSP2->SP2_PKineticSampling)->first();
                            $PDynamic = SP2_PDynamicSampling::where('SP2_PDynamicSampling_ID', $findSP2->SP2_PDynamicSampling)->first();
                            $PDAnalysis = SP2_PDynamicAnalysis::where('SP2_PDynamicAnalysis_ID', $findSP2->SP2_PDynamicAnalysis)->first();
                            $VitalSign = SP2_VitalSigns::where('SP2_VitalSign_ID', $findSP2->SP2_VitalSign)->first();
                            $Discharge = SP2_Discharge::where('SP2_Discharge_ID', $findSP2->SP2_Discharge)->first();
                            $DQuestionnaire = SP2_DQuestionnaire::where('SP2_DQuestionnaire_ID', $findSP2->SP2_DQuestionnaire)->first();
                            $IQ36 = SP2_IQ36::where('SP2_IQ36_ID', $findSP2->SP2_IQ36)->first();
                            $IQ48 = SP2_IQ48::where('SP2_IQ48_ID', $findSP2->SP2_IQ48)->first();
                            $IQ72 = SP2_IQ72::where('SP2_IQ72_ID', $findSP2->SP2_IQ72)->first();
                            $IQ96 = SP2_IQ96::where('SP2_IQ96_ID', $findSP2->SP2_IQ96)->first();
                            return view('SubjectStudySpecific', compact('Admission',
                                'BMVS',
                                'BAT',
                                'AQuestionnaire',
                                'UrineTest',
                                'PKinetic',
                                'PDynamic',
                                'PDAnalysis',
                                'VitalSign',
                                'Discharge',
                                'DQuestionnaire',
                                'IQ36',
                                'IQ48',
                                'IQ72',
                                'IQ96',
                                'study_id',
                                'study',
                                'study_period',
                                'patient'));
                        } else {
                            alert()->error('Error!', 'The admission form is not created for the subject!');
                            return redirect(route('studySpecific.admin', $study_id));
                        }
                    }
                } elseif ($study_period == 3) {
                    $findSP3 = StudyPeriod3::where('SP3_ID', $findPSS->SP3_ID)->first();
                    if ($findPSS != NULL) {
                        if ($findSP3 != NULL) {
                            $Admission = SP3_Admission::where('SP3_Admission_ID', $findSP3->SP3_Admission)->first();
                            $BMVS = SP3_BMVS::where('SP3_BMVS_ID', $findSP3->SP3_BMVS)->first();
                            $BAT = SP3_BAT::where('SP3_BAT_ID', $findSP3->SP3_BATER)->first();
                            $AQuestionnaire = SP3_AQuestionnaire::where('SP3_AQuestionnaire_ID', $findSP3->SP3_AQuestionnaire)->first();
                            $UrineTest = SP3_UrineTest::where('SP3_UrineTest_ID', $findSP3->SP3_UrineTest)->first();
                            $PKinetic = SP3_PKineticSampling::where('SP3_PKineticSampling_ID', $findSP3->SP3_PKineticSampling)->first();
                            $PDynamic = SP3_PDynamicSampling::where('SP3_PDynamicSampling_ID', $findSP3->SP3_PDynamicSampling)->first();
                            $PDAnalysis = SP3_PDynamicAnalysis::where('SP3_PDynamicAnalysis_ID', $findSP3->SP3_PDynamicAnalysis)->first();
                            $VitalSign = SP3_VitalSigns::where('SP3_VitalSign_ID', $findSP3->SP3_VitalSign)->first();
                            $Discharge = SP3_Discharge::where('SP3_Discharge_ID', $findSP3->SP3_Discharge)->first();
                            $DQuestionnaire = SP3_DQuestionnaire::where('SP3_DQuestionnaire_ID', $findSP3->SP3_DQuestionnaire)->first();
                            $IQ36 = SP3_IQ36::where('SP3_IQ36_ID', $findSP3->SP3_IQ36)->first();
                            $IQ48 = SP3_IQ48::where('SP3_IQ48_ID', $findSP3->SP3_IQ48)->first();
                            $IQ72 = SP3_IQ72::where('SP3_IQ72_ID', $findSP3->SP3_IQ72)->first();
                            $IQ96 = SP3_IQ96::where('SP3_IQ96_ID', $findSP3->SP3_IQ96)->first();
                            return view('SubjectStudySpecific', compact('Admission',
                                'BMVS',
                                'BAT',
                                'AQuestionnaire',
                                'UrineTest',
                                'PKinetic',
                                'PDynamic',
                                'PDAnalysis',
                                'VitalSign',
                                'Discharge',
                                'DQuestionnaire',
                                'IQ36',
                                'IQ48',
                                'IQ72',
                                'IQ96',
                                'study_id',
                                'study',
                                'study_period',
                                'patient'));
                        } else {
                            alert()->error('Error!', 'The admission form is not created for the subject!');
                            return redirect(route('studySpecific.admin', $study_id));
                        }
                    }
                } elseif ($study_period == 4) {
                    $findSP4 = StudyPeriod4::where('SP4_ID', $findPSS->SP4_ID)->first();
                    if ($findPSS != NULL) {
                        if ($findSP4 != NULL) {
                            $Admission = SP4_Admission::where('SP4_Admission_ID', $findSP4->SP4_Admission)->first();
                            $BMVS = SP4_BMVS::where('SP4_BMVS_ID', $findSP4->SP4_BMVS)->first();
                            $BAT = SP4_BAT::where('SP4_BAT_ID', $findSP4->SP4_BATER)->first();
                            $AQuestionnaire = SP4_AQuestionnaire::where('SP4_AQuestionnaire_ID', $findSP4->SP4_AQuestionnaire)->first();
                            $UrineTest = SP4_UrineTest::where('SP4_UrineTest_ID', $findSP4->SP4_UrineTest)->first();
                            $PKinetic = SP4_PKineticSampling::where('SP4_PKineticSampling_ID', $findSP4->SP4_PKineticSampling)->first();
                            $PDynamic = SP4_PDynamicSampling::where('SP4_PDynamicSampling_ID', $findSP4->SP4_PDynamicSampling)->first();
                            $PDAnalysis = SP4_PDynamicAnalysis::where('SP4_PDynamicAnalysis_ID', $findSP4->SP4_PDynamicAnalysis)->first();
                            $VitalSign = SP4_VitalSigns::where('SP4_VitalSign_ID', $findSP4->SP4_VitalSign)->first();
                            $Discharge = SP4_Discharge::where('SP4_Discharge_ID', $findSP4->SP4_Discharge)->first();
                            $DQuestionnaire = SP4_DQuestionnaire::where('SP4_DQuestionnaire_ID', $findSP4->SP4_DQuestionnaire)->first();
                            $IQ36 = SP4_IQ36::where('SP4_IQ36_ID', $findSP4->SP4_IQ36)->first();
                            $IQ48 = SP4_IQ48::where('SP4_IQ48_ID', $findSP4->SP4_IQ48)->first();
                            $IQ72 = SP4_IQ72::where('SP4_IQ72_ID', $findSP4->SP4_IQ72)->first();
                            $IQ96 = SP4_IQ96::where('SP4_IQ96_ID', $findSP4->SP4_IQ96)->first();
                            return view('SubjectStudySpecific', compact('Admission',
                                'BMVS',
                                'BAT',
                                'AQuestionnaire',
                                'UrineTest',
                                'PKinetic',
                                'PDynamic',
                                'PDAnalysis',
                                'VitalSign',
                                'Discharge',
                                'DQuestionnaire',
                                'IQ36',
                                'IQ48',
                                'IQ72',
                                'IQ96',
                                'study_id',
                                'study',
                                'study_period',
                                'patient'));
                        } else {
                            alert()->error('Error!', 'The admission form is not created for the subject!');
                            return redirect(route('studySpecific.admin', $study_id));
                        }
                    }
                } elseif ($study_period == '---') {
                    alert()->error('Error!', 'You did not select the study period!');
                    return redirect(route('studySpecific.admin', $study_id));
                } else {
                    alert()->error('Error!', 'Please select again');
                    return redirect(route('studySpecific.admin', $study_id));
                }
            }
        }else{
            alert()->error('Error!', 'Please make sure the subject is admitted and all forms for all study periods are filled in');
            return redirect(route('studySpecific.admin', $study_id));
        }
    }

    public function update(Request $request, $patient_id, $study_id, $study_period)
    {
        /*$study_period=$request->studyPeriod;*/
        $findPSS = PatientStudySpecific::where('patient_id', $patient_id)
            ->where('study_id', $study_id)
            ->first();
        if ($study_period == 1) {
            //SP1 query
            $SP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
            $PSS = $findPSS->SP1_ID;
            $admission = SP1_Admission::where('SP1_Admission_ID', $SP1->SP1_Admission)->first();
            if ($this->updateSP($findPSS, $PSS, $admission, $request)) {
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details!');
            } else {
                alert()->error('Error!', 'You have already key the data for this subject!');
                return redirect(route('studySpecific.edit', $study_id));

            }
        } elseif ($study_period == 2) {
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID', $findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $admission = SP2_Admission::where('SP2_Admission_ID', $SP2->SP2_Admission)->first();
            if ($this->updateSP($findPSS, $PSS, $admission, $request)) {
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details!');
            } else {
                alert()->error('Error!', 'You have already key the data for this subject!');
                return redirect(route('studySpecific.edit', $study_id));
            }
        } elseif ($study_period == 3) {
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID', $findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $admission = SP3_Admission::where('SP3_Admission_ID', $SP3->SP3_Admission)->first();
            if ($this->updateSP($findPSS, $PSS, $admission, $request)) {
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details!');
            } else {
                alert()->error('Error!', 'You have already key the data for this subject!');
                return redirect(route('studySpecific.edit', $study_id));
            }
        } elseif ($study_period == 4) {
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID', $findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $admission = SP4_Admission::where('SP4_Admission_ID', $SP4->SP4_Admission)->first();
            if ($this->updateSP($findPSS, $PSS, $admission, $request)) {
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details!');
            } else {
                alert()->error('Error!', 'You have already key the data for this subject!');
                return redirect(route('studySpecific.edit', $study_id));
            }
        } else {
            alert()->error('Error!', 'You did not select the study period!');
            return redirect(route('studySpecific.edit', $study_id));
        }
    }

    public function bindingSP($pss, $study_period)
    {
        if ($study_period == 1) {
            if ($pss->SP1_ID == NULL) {
                $SP1 = new StudyPeriod1;
                $SP1->save();
                //Bind SP1's ID into PSS
                $pss->SP1_ID = $SP1->SP1_ID;
                $pss->save();
                return true;
            }
        } elseif ($study_period == 2) {
            if ($pss->SP2_ID == NULL) {
                $SP2 = new StudyPeriod2;
                $SP2->save();
                //Bind SP2's ID into PSS
                $pss->SP2_ID = $SP2->SP2_ID;
                $pss->save();
                return true;
            }
        } elseif ($study_period == 3) {
            if ($pss->SP3_ID == NULL) {
                $SP3 = new StudyPeriod3;
                $SP3->save();
                //Bind SP2's ID into PSS
                $pss->SP3_ID = $SP3->SP3_ID;
                $pss->save();
                return true;
            }
        } elseif ($study_period == 4) {
            if ($pss->SP4_ID == NULL) {
                $SP4 = new StudyPeriod4;
                $SP4->save();
                //Bind SP2's ID into PSS
                $pss->SP4_ID = $SP4->SP4_ID;
                $pss->save();
                return true;
            }
        }
    }

    public function initaliseForms($pss, $id, $study_id)
    {
        //locate the PSS's SP1 ID
        $SP1 = StudyPeriod1::where('SP1_ID', $pss->SP1_ID)->first();
        $SP1_Admission = SP1_Admission::where('SP1_Admission_ID', $SP1->SP1_Admission)->first();
        if ($SP1_Admission == NULL) {
            //Initialise SP1_Admission
            $Admission = new SP1_Admission;
            $Admission->save();

            //Initialise SP1_BMVS
            $BMVS = new SP1_BMVS;
            $BMVS->save();

            //Initialise SP1_BAT
            $BAT = new SP1_BAT;
            $BAT->save();

            //Initialise SP1_AQuestionnaire
            $AQuestionnaire = new SP1_AQuestionnaire;
            $AQuestionnaire->save();

            //Initialise SP1_UrineTest
            $UrineTest = new SP1_UrineTest;
            $UrineTest->save();

            //Initialise SP1_PKineticSampling
            $PKineticSampling = new SP1_PKineticSampling;
            $PKineticSampling->save();

            //Initialise SP1_PDynamicSampling
            $PDynamicSampling = new SP1_PDynamicSampling();
            $PDynamicSampling->save();

            //Initialise SP1_PDynamicAnalysis
            $PDynamicAnalysis = new SP1_PDynamicAnalysis;
            $PDynamicAnalysis->save();

            //Initialise SP1_VitalSign
            $VitalSign = new SP1_VitalSigns;
            $VitalSign->save();

            //Initialise SP1_Discharge
            $Discharge = new SP1_Discharge;
            $Discharge->save();

            //Initialise SP1_DQuestionnaire
            $DQuestionnaire = new SP1_DQuestionnaire;
            $DQuestionnaire->save();

            //Initialise SP1_IQ36
            $IQ36 = new SP1_IQ36;
            $IQ36->save();

            //Initialise SP1_IQ48
            $IQ48 = new SP1_IQ48;
            $IQ48->save();

            //Initialise SP1_IQ72
            $IQ72 = new SP1_IQ72;
            $IQ72->save();

            //Initialise SP1_IQ96
            $IQ96 = new SP1_IQ96;
            $IQ96->save();

            //Initialise FollowUpQuesionnaire
            $FollowUpQ = new FollowUpQuestionnaire();
            $FollowUpQ->save();

            //Initialise Conclusion of Participation
            $ConclusionP = new ConclusionParticipation();
            $ConclusionP->save();

            //Bind Follow Up Questionnaire and Conclusion of Participation to the particular PSS
            $pss->FollowUpQuestionnaire_ID = $FollowUpQ->FollowUpQuestionnaire_ID;
            $pss->conclusion_participation_id = $ConclusionP->conclusion_participation_id;
            $pss->save();

            //bind SP1's form into SP1
            $SP1->SP1_Admission = $Admission->SP1_Admission_ID;
            $SP1->SP1_BMVS = $BMVS->SP1_BMVS_ID;
            $SP1->SP1_BATER = $BAT->SP1_BAT_ID;
            $SP1->SP1_AQuestionnaire = $AQuestionnaire->SP1_AQuestionnaire_ID;
            $SP1->SP1_UrineTest = $UrineTest->SP1_UrineTest_ID;
            $SP1->SP1_PKineticSampling = $PKineticSampling->SP1_PKineticSampling_ID;
            $SP1->SP1_PDynamicAnalysis = $PDynamicAnalysis->SP1_PDynamicAnalysis_ID;
            $SP1->SP1_Discharge = $Discharge->SP1_Discharge_ID;
            $SP1->Sp1_DQuestionnaire = $DQuestionnaire->SP1_DQuestionnaire_ID;
            $SP1->SP1_PDynamicSampling = $PDynamicSampling->SP1_PDynamicSampling_ID;
            $SP1->SP1_VitalSign = $VitalSign->SP1_VitalSign_ID;
            $SP1->SP1_IQ36 = $IQ36->SP1_IQ36_ID;
            $SP1->SP1_IQ48 = $IQ48->SP1_IQ48_ID;
            $SP1->SP1_IQ72 = $IQ72->SP1_IQ72_ID;
            $SP1->SP1_IQ96 = $IQ96->SP1_IQ96_ID;

            $SP1->save();
            //if all thing is saved and return true.
            return true;
        } else {
            return false;
        }
    }

    public function initaliseFormsSP2($pss, $id, $study_id)
    {
        //locate the PSS's SP2 ID
        $SP2 = StudyPeriod2::where('SP2_ID', $pss->SP2_ID)->first();
        $SP2_Admission = SP2_Admission::where('SP2_Admission_ID', $SP2->SP2_Admission)->first();
        if ($SP2_Admission == NULL) {
            //Initialise SP2_Admission
            $Admission = new SP2_Admission;
            $Admission->save();

            //Initialise SP2_BMVS
            $BMVS = new SP2_BMVS;
            $BMVS->save();

            //Initialise SP1_BAT
            $BAT = new SP2_BAT;
            $BAT->save();

            //Initialise SP2_AQuestionnaire
            $AQuestionnaire = new SP2_AQuestionnaire;
            $AQuestionnaire->save();

            //Initialise SP2_UrineTest
            $UrineTest = new SP2_UrineTest;
            $UrineTest->save();

            //Initialise SP2_PKineticSampling
            $PKineticSampling = new SP2_PKineticSampling;
            $PKineticSampling->save();

            //Initialise SP2_PDynamicSampling
            $PDynamicSampling = new SP2_PDynamicSampling;
            $PDynamicSampling->save();

            //Initialise SP2_PDynamicAnalysis
            $PDynamicAnalysis = new SP2_PDynamicAnalysis;
            $PDynamicAnalysis->save();

            //Initialise SP2_VitalSign
            $VitalSign = new SP2_VitalSigns;
            $VitalSign->save();

            //Initialise SP2_Discharge
            $Discharge = new SP2_Discharge;
            $Discharge->save();

            //Initialise SP2_DQuestionnaire
            $DQuestionnaire = new SP2_DQuestionnaire;
            $DQuestionnaire->save();

            //Initialise SP2_IQ36
            $IQ36 = new SP2_IQ36;
            $IQ36->save();

            //Initialise SP2_IQ48
            $IQ48 = new SP2_IQ48;
            $IQ48->save();

            //Initialise SP2_IQ72
            $IQ72 = new SP2_IQ72;
            $IQ72->save();

            //Initialise SP2_IQ96
            $IQ96 = new SP2_IQ96;
            $IQ96->save();

            //bind SP2's form into SP2
            $SP2->SP2_Admission = $Admission->SP2_Admission_ID;
            $SP2->SP2_BMVS = $BMVS->SP2_BMVS_ID;
            $SP2->SP2_BATER = $BAT->SP2_BAT_ID;
            $SP2->SP2_AQuestionnaire = $AQuestionnaire->SP2_AQuestionnaire_ID;
            $SP2->SP2_UrineTest = $UrineTest->SP2_UrineTest_ID;
            $SP2->SP2_PKineticSampling = $PKineticSampling->SP2_PKineticSampling_ID;
            $SP2->SP2_PDynamicAnalysis = $PDynamicAnalysis->SP2_PDynamicAnalysis_ID;
            $SP2->SP2_Discharge = $Discharge->SP2_Discharge_ID;
            $SP2->Sp2_DQuestionnaire = $DQuestionnaire->SP2_DQuestionnaire_ID;
            $SP2->SP2_PDynamicSampling = $PDynamicSampling->SP2_PDynamicSampling_ID;
            $SP2->SP2_VitalSign = $VitalSign->SP2_VitalSign_ID;
            $SP2->SP2_IQ36 = $IQ36->SP2_IQ36_ID;
            $SP2->SP2_IQ48 = $IQ48->SP2_IQ48_ID;
            $SP2->SP2_IQ72 = $IQ72->SP2_IQ72_ID;
            $SP2->SP2_IQ96 = $IQ96->SP2_IQ96_ID;

            $SP2->save();
            //if all thing is saved and return true.
            return true;
        }
        return false;
    }

    public function initaliseFormsSP3($pss, $id, $study_id)
    {
        //locate the PSS's SP3 ID
        $SP3 = StudyPeriod3::where('SP3_ID', $pss->SP3_ID)->first();
        $SP3_Admission = SP3_Admission::where('SP3_Admission_ID', $SP3->SP3_Admission)->first();

        if ($SP3_Admission == NULL) {
            //Initialise SP3_Admission
            $Admission = new SP3_Admission;
            $Admission->save();

            //Initialise SP3_BMVS
            $BMVS = new SP3_BMVS;
            $BMVS->save();

            //Initialise SP3_BAT
            $BAT = new SP3_BAT;
            $BAT->save();

            //Initialise SP3_AQuestionnaire
            $AQuestionnaire = new SP3_AQuestionnaire;
            $AQuestionnaire->save();

            //Initialise SP3_UrineTest
            $UrineTest = new SP3_UrineTest;
            $UrineTest->save();

            //Initialise SP3_PKineticSampling
            $PKineticSampling = new SP3_PKineticSampling;
            $PKineticSampling->save();

            //Initialise SP3_PDynamicSampling
            $PDynamicSampling = new SP3_PDynamicSampling();
            $PDynamicSampling->save();

            //Initialise SP3_PDynamicAnalysis
            $PDynamicAnalysis = new SP3_PDynamicAnalysis;
            $PDynamicAnalysis->save();

            //Initialise SP3_VitalSign
            $VitalSign = new SP3_VitalSigns;
            $VitalSign->save();

            //Initialise SP3_Discharge
            $Discharge = new SP3_Discharge;
            $Discharge->save();

            //Initialise SP3_DQuestionnaire
            $DQuestionnaire = new SP3_DQuestionnaire;
            $DQuestionnaire->save();

            //Initialise SP3_IQ36
            $IQ36 = new SP3_IQ36;
            $IQ36->save();

            //Initialise SP3_IQ48
            $IQ48 = new SP3_IQ48;
            $IQ48->save();

            //Initialise SP3_IQ72
            $IQ72 = new SP3_IQ72;
            $IQ72->save();

            //Initialise SP3_IQ96
            $IQ96 = new SP3_IQ96;
            $IQ96->save();

            //bind SP3's form into SP3
            $SP3->SP3_Admission = $Admission->SP3_Admission_ID;
            $SP3->SP3_BMVS = $BMVS->SP3_BMVS_ID;
            $SP3->SP3_BATER = $BAT->SP3_BAT_ID;
            $SP3->SP3_AQuestionnaire = $AQuestionnaire->SP3_AQuestionnaire_ID;
            $SP3->SP3_UrineTest = $UrineTest->SP3_UrineTest_ID;
            $SP3->SP3_PKineticSampling = $PKineticSampling->SP3_PKineticSampling_ID;
            $SP3->SP3_PDynamicAnalysis = $PDynamicAnalysis->SP3_PDynamicAnalysis_ID;
            $SP3->SP3_Discharge = $Discharge->SP3_Discharge_ID;
            $SP3->Sp3_DQuestionnaire = $DQuestionnaire->SP3_DQuestionnaire_ID;
            $SP3->SP3_PDynamicSampling = $PDynamicSampling->SP3_PDynamicSampling_ID;
            $SP3->SP3_VitalSign = $VitalSign->SP3_VitalSign_ID;
            $SP3->SP3_IQ36 = $IQ36->SP3_IQ36_ID;
            $SP3->SP3_IQ48 = $IQ48->SP3_IQ48_ID;
            $SP3->SP3_IQ72 = $IQ72->SP3_IQ72_ID;
            $SP3->SP3_IQ96 = $IQ96->SP3_IQ96_ID;

            $SP3->save();
            //if all thing is saved and return true.
            return true;
        }
        return false;
    }

    public function initaliseFormsSP4($pss, $id, $study_id)
    {
        //locate the PSS's SP4 ID
        $SP4 = StudyPeriod4::where('SP4_ID', $pss->SP4_ID)->first();
        $SP4_Admission = SP4_Admission::where('SP4_Admission_ID', $SP4->SP4_Admission)->first();
        if ($SP4_Admission == NULL) {
            //Initialise SP4_Admission
            $Admission = new SP4_Admission;
            $Admission->save();

            //Initialise SP4_BMVS
            $BMVS = new SP4_BMVS;
            $BMVS->save();

            //Initialise SP4_BAT
            $BAT = new SP4_BAT;
            $BAT->save();

            //Initialise SP4_AQuestionnaire
            $AQuestionnaire = new SP4_AQuestionnaire;
            $AQuestionnaire->save();

            //Initialise SP4_UrineTest
            $UrineTest = new SP4_UrineTest;
            $UrineTest->save();

            //Initialise SP4_PKineticSampling
            $PKineticSampling = new SP4_PKineticSampling;
            $PKineticSampling->save();

            //Initialise SP4_PDynamicSampling
            $PDynamicSampling = new SP4_PDynamicSampling();
            $PDynamicSampling->save();

            //Initialise SP4_PDynamicAnalysis
            $PDynamicAnalysis = new SP4_PDynamicAnalysis;
            $PDynamicAnalysis->save();

            //Initialise SP4_VitalSign
            $VitalSign = new SP4_VitalSigns;
            $VitalSign->save();

            //Initialise SP4_Discharge
            $Discharge = new SP4_Discharge;
            $Discharge->save();

            //Initialise SP4_DQuestionnaire
            $DQuestionnaire = new SP4_DQuestionnaire;
            $DQuestionnaire->save();

            //Initialise SP4_IQ36
            $IQ36 = new SP4_IQ36;
            $IQ36->save();

            //Initialise SP4_IQ48
            $IQ48 = new SP4_IQ48;
            $IQ48->save();

            //Initialise SP4_IQ72
            $IQ72 = new SP4_IQ72;
            $IQ72->save();

            //Initialise SP4_IQ96
            $IQ96 = new SP4_IQ96;
            $IQ96->save();

            //bind SP4's form into SP4
            $SP4->SP4_Admission = $Admission->SP4_Admission_ID;
            $SP4->SP4_BMVS = $BMVS->SP4_BMVS_ID;
            $SP4->SP4_BATER = $BAT->SP4_BAT_ID;
            $SP4->SP4_AQuestionnaire = $AQuestionnaire->SP4_AQuestionnaire_ID;
            $SP4->SP4_UrineTest = $UrineTest->SP4_UrineTest_ID;
            $SP4->SP4_PKineticSampling = $PKineticSampling->SP4_PKineticSampling_ID;
            $SP4->SP4_PDynamicAnalysis = $PDynamicAnalysis->SP4_PDynamicAnalysis_ID;
            $SP4->SP4_Discharge = $Discharge->SP4_Discharge_ID;
            $SP4->Sp4_DQuestionnaire = $DQuestionnaire->SP4_DQuestionnaire_ID;
            $SP4->SP4_PDynamicSampling = $PDynamicSampling->SP4_PDynamicSampling_ID;
            $SP4->SP4_VitalSign = $VitalSign->SP4_VitalSign_ID;
            $SP4->SP4_IQ36 = $IQ36->SP4_IQ36_ID;
            $SP4->SP4_IQ48 = $IQ48->SP4_IQ48_ID;
            $SP4->SP4_IQ72 = $IQ72->SP4_IQ72_ID;
            $SP4->SP4_IQ96 = $IQ96->SP4_IQ96_ID;

            $SP4->save();
            //if all thing is saved and return true.
            return true;
        }
        return false;
    }

    public function storeSP($findPSS, $PSS, $admission, $request)
    {
        //custom messages load for validation
        $custom = [
            'AdmissionDateTaken.required' => 'Please enter the admission date taken',
            'AdmissionTimeTaken.required' => 'Please enter the admission time taken',
            'ConsentDateTaken.required' => 'Please enter the consent date taken',
            'ConsentTimeTaken.required' => 'Please enter the consent time taken',
        ];

        if ($findPSS != NULL && $PSS != NULL) {
            if ($admission->AdmissionDateTaken == NULL) {
                //validation for required fields
                $validatedData = $this->validate($request, [
                    'AdmissionDateTaken' => 'required',
                    'AdmissionTimeTaken' => 'required',
                    'ConsentDateTaken' => 'required',
                    'ConsentTimeTaken' => 'required',
                ], $custom);
                //admission date and time
                $admission->AdmissionDateTaken = $request->AdmissionDateTaken;
                $admission->AdmissionTimeTaken = $request->AdmissionTimeTaken;
                //consent date and time
                $admission->ConsentDateTaken = $request->ConsentDateTaken;
                $admission->ConsentTimeTaken = $request->ConsentTimeTaken;

                $admission->save();
                return true;
            } else {
                return false;
            }
        } else
            return false;
    }

    public function updateSP($findPSS, $PSS, $admission, $request)
    {
        if ($findPSS != NULL) {
            //admission date and time
            $admission->AdmissionDateTaken = $request->AdmissionDateTaken;
            $admission->AdmissionTimeTaken = $request->AdmissionTimeTaken;
            //consent date and time
            $admission->ConsentDateTaken = $request->ConsentDateTaken;
            $admission->ConsentTimeTaken = $request->ConsentTimeTaken;
            $admission->save();

            return true;
        } else {
            return false;
        }
    }

}
