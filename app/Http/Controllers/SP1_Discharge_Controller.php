<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_Discharge;
use App\SP2_Discharge;
use App\SP3_Discharge;
use App\SP4_Discharge;
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SP1_Discharge_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $study_id)
    {
        $PID = $request->patient_id;

        //custom messages load for validation
        $custom = [
            'DischargeDate.required' => 'Please enter the discharge date',
            'unscheduledDischarge.required' => 'Please state whether is it an unscheduled discharge',
            'unscheduledDischarge_Text.required_if' => 'If it is an unscheduled discharge, please state why',
            'Sitting_ReadingTime.required' => 'Please enter the Sitting Reading Time',
            'Sitting_BP.required' => 'Please enter the Sitting Blood Pressure',
            'Sitting_HR.required' => 'Please enter the Sitting Heart Rate',
            'Sitting_RespiratoryRate.required' => 'Please enter the Sitting Respiratory Rate',
            'SittingRepeat_ReadingTime.required_if' => 'Please enter the Sitting Reading Time for the repeated test',
            'SittingRepeat_BP.required_if' => 'Please enter the Sitting Blood Pressure for the repeated test',
            'SittingRepeat_HR.required_if' => 'Please enter the Sitting Heart Rate for the repeated test',
            'SittingRepeat_RespiratoryRate.required_if' => 'Please enter the Sitting Respiratory Rate for the repeated test',
            'Initial.required' => 'Initial of the physician’s is required',
        ];

        //validation for required fields
        $validatedData = $this->validate($request, [
            'DischargeDate' => 'required',
            'unscheduledDischarge' => 'required',
            'unscheduledDischarge_Text' => 'required_if:unscheduledDischarge,==,Yes',
            'Sitting_ReadingTime' => 'required',
            'Sitting_BP' => 'required',
            'Sitting_HR' => 'required',
            'Sitting_RespiratoryRate' => 'required',
            'SittingRepeat_ReadingTime' => 'required_if:SittingRepeat,==,Sitting Repeated',
            'SittingRepeat_BP' => 'required_if:SittingRepeat,==,Sitting Repeated',
            'SittingRepeat_HR' => 'required_if:SittingRepeat,==,Others',
            'SittingRepeat_RespiratoryRate' => 'required_if:SittingRepeat,==,Sitting Repeated',
            'Initial' => 'required',
        ], $custom);

        $study_period = $request->studyPeriod;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id', $PID)
            ->where('study_id', $study_id)
            ->first();

        if ($study_period == '---') {
            alert()->error('Error!', 'This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input', $study_id));
        } elseif ($study_period == 1) {
            if ($this->storeSP1($findPSS, $request)) {
                return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Discharge!');
            } else {
                alert()->error('Error!', 'This subject is not enrolled into any study!');
                return redirect(route('studySpecific.input', $study_id));
            }
        } elseif ($study_period == 2) {
            if ($this->storeSP2($findPSS, $request)) {
                return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Discharge!');
            } else {
                alert()->error('Error!', 'This subject is not enrolled into any study!');
                return redirect(route('studySpecific.input', $study_id));
            }
        } elseif ($study_period == 3) {
            if ($this->storeSP3($findPSS, $request)) {
                return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Discharge!');
            } else {
                alert()->error('Error!', 'This subject is not enrolled into any study!');
                return redirect(route('studySpecific.input', $study_id));
            }
        } elseif ($study_period == 4) {
            if ($this->storeSP4($findPSS, $request)) {
                return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Discharge!');
            } else {
                alert()->error('Error!', 'This subject is not enrolled into any study!');
                return redirect(route('studySpecific.input', $study_id));
            }
        }
    }

    public function storeSP1($findPSS, $request)
    {
        if ($findPSS != NULL && $findPSS->SP1_ID != NULL) {
            $findSP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
            $findSP1_Discharge = SP1_Discharge::where('SP1_Discharge_ID', $findSP1->SP1_Discharge)->first();
            //discharge date and unscheduled discharge
            if ($findSP1_Discharge->DischargeDate == NULL) {
                $findSP1_Discharge->DischargeDate = $request->DischargeDate;
                $ud = $request->unscheduledDischarge;
                if ($ud == 'Yes') {
                    $findSP1_Discharge->UnscheduledDischarge = $request->unscheduledDischarge_Text;
                } else {
                    $findSP1_Discharge->UnscheduledDischarge = $request->unscheduledDischarge;
                }
                //sitting record
                $findSP1_Discharge->Sitting_ReadingTime = $request->Sitting_ReadingTime;
                $findSP1_Discharge->Sitting_BP = $request->Sitting_BP;
                $findSP1_Discharge->Sitting_HR = $request->Sitting_HR;
                $findSP1_Discharge->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;

                //repeated sitting record
                $repeat = $request->SittingRepeat;
                $findSP1_Discharge->SittingRepeat = $request->SittingRepeat;
                if ($repeat == 'Yes') {
                    //if sitting is repeated
                    $findSP1_Discharge->SittingRepeat_ReadingTime = $request->SittingRepeat_ReadingTime;
                    $findSP1_Discharge->SittingRepeat_BP = $request->SittingRepeat_BP;
                    $findSP1_Discharge->SittingRepeat_HR = $request->SittingRepeat_HR;
                    $findSP1_Discharge->SittingRepeat_RespiratoryRate = $request->SittingRepeat_RespiratoryRate;
                } else {
                    //if sitting is repeated is NA
                    $findSP1_Discharge->SittingRepeat_ReadingTime = NULL;
                    $findSP1_Discharge->SittingRepeat_BP = NULL;
                    $findSP1_Discharge->SittingRepeat_HR = NULL;
                    $findSP1_Discharge->SittingRepeat_RespiratoryRate = NULL;
                }

                $findSP1_Discharge->Initial = $request->Initial;

                $findSP1_Discharge->save();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function storeSP2($findPSS, $request)
    {
        if ($findPSS != NULL && $findPSS->SP1_ID != NULL) {
            $findSP2 = StudyPeriod2::where('SP2_ID', $findPSS->SP2_ID)->first();
            $findSP2_Discharge = SP2_Discharge::where('SP2_Discharge_ID', $findSP2->SP2_Discharge)->first();
            //discharge date and unscheduled discharge
            if ($findSP2_Discharge->DischargeDate == NULL) {
                $findSP2_Discharge->DischargeDate = $request->DischargeDate;
                $ud = $request->unscheduledDischarge;
                if ($ud == 'Yes') {
                    $findSP2_Discharge->UnscheduledDischarge = $request->unscheduledDischarge_Text;
                } else {
                    $findSP2_Discharge->UnscheduledDischarge = $request->unscheduledDischarge;
                }
                //sitting record
                $findSP2_Discharge->Sitting_ReadingTime = $request->Sitting_ReadingTime;
                $findSP2_Discharge->Sitting_BP = $request->Sitting_BP;
                $findSP2_Discharge->Sitting_HR = $request->Sitting_HR;
                $findSP2_Discharge->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;

                //repeated sitting record
                $repeat = $request->SittingRepeat;
                $findSP2_Discharge->SittingRepeat = $request->SittingRepeat;
                if ($repeat == 'Yes') {
                    //if sitting is repeated
                    $findSP2_Discharge->SittingRepeat_ReadingTime = $request->SittingRepeat_ReadingTime;
                    $findSP2_Discharge->SittingRepeat_BP = $request->SittingRepeat_BP;
                    $findSP2_Discharge->SittingRepeat_HR = $request->SittingRepeat_HR;
                    $findSP2_Discharge->SittingRepeat_RespiratoryRate = $request->SittingRepeat_RespiratoryRate;
                } else {
                    //if sitting is repeated is NA
                    $findSP2_Discharge->SittingRepeat_ReadingTime = NULL;
                    $findSP2_Discharge->SittingRepeat_BP = NULL;
                    $findSP2_Discharge->SittingRepeat_HR = NULL;
                    $findSP2_Discharge->SittingRepeat_RespiratoryRate = NULL;
                }

                $findSP2_Discharge->Initial = $request->Initial;

                $findSP2_Discharge->save();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function storeSP3($findPSS, Request $request)
    {
        if ($findPSS != NULL && $findPSS->SP3_ID != NULL) {
            $findSP3 = StudyPeriod3::where('SP3_ID', $findPSS->SP3_ID)->first();
            $findSP3_Discharge = SP3_Discharge::where('SP3_Discharge_ID', $findSP3->SP3_Discharge)->first();
            //discharge date and unscheduled discharge
            if ($findSP3_Discharge->DischargeDate == NULL) {
                $findSP3_Discharge->DischargeDate = $request->DischargeDate;
                $ud = $request->unscheduledDischarge;
                if ($ud == 'Yes') {
                    $findSP3_Discharge->UnscheduledDischarge = $request->unscheduledDischarge_Text;
                } else {
                    $findSP3_Discharge->UnscheduledDischarge = $request->unscheduledDischarge;
                }
                //sitting record
                $findSP3_Discharge->Sitting_ReadingTime = $request->Sitting_ReadingTime;
                $findSP3_Discharge->Sitting_BP = $request->Sitting_BP;
                $findSP3_Discharge->Sitting_HR = $request->Sitting_HR;
                $findSP3_Discharge->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;

                //repeated sitting record
                $repeat = $request->SittingRepeat;
                $findSP3_Discharge->SittingRepeat = $request->SittingRepeat;
                if ($repeat == 'Yes') {
                    //if sitting is repeated
                    $findSP3_Discharge->SittingRepeat_ReadingTime = $request->SittingRepeat_ReadingTime;
                    $findSP3_Discharge->SittingRepeat_BP = $request->SittingRepeat_BP;
                    $findSP3_Discharge->SittingRepeat_HR = $request->SittingRepeat_HR;
                    $findSP3_Discharge->SittingRepeat_RespiratoryRate = $request->SittingRepeat_RespiratoryRate;
                } else {
                    //if sitting is repeated is NA
                    $findSP3_Discharge->SittingRepeat_ReadingTime = NULL;
                    $findSP3_Discharge->SittingRepeat_BP = NULL;
                    $findSP3_Discharge->SittingRepeat_HR = NULL;
                    $findSP3_Discharge->SittingRepeat_RespiratoryRate = NULL;
                }

                $findSP3_Discharge->Initial = $request->Initial;

                $findSP3_Discharge->save();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function storeSP4($findPSS, Request $request)
    {
        if ($findPSS != NULL && $findPSS->SP4_ID != NULL) {
            $findSP4 = StudyPeriod4::where('SP4_ID', $findPSS->SP4_ID)->first();
            $findSP4_Discharge = SP4_Discharge::where('SP4_Discharge_ID', $findSP4->SP4_Discharge)->first();
            //discharge date and unscheduled discharge
            if ($findSP4_Discharge->DischargeDate == NULL) {
                $findSP4_Discharge->DischargeDate = $request->DischargeDate;
                $ud = $request->unscheduledDischarge;
                if ($ud == 'Yes') {
                    $findSP4_Discharge->UnscheduledDischarge = $request->unscheduledDischarge_Text;
                } else {
                    $findSP4_Discharge->UnscheduledDischarge = $request->unscheduledDischarge;
                }
                //sitting record
                $findSP4_Discharge->Sitting_ReadingTime = $request->Sitting_ReadingTime;
                $findSP4_Discharge->Sitting_BP = $request->Sitting_BP;
                $findSP4_Discharge->Sitting_HR = $request->Sitting_HR;
                $findSP4_Discharge->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;

                //repeated sitting record
                $repeat = $request->SittingRepeat;
                $findSP4_Discharge->SittingRepeat = $request->SittingRepeat;
                if ($repeat == 'Yes') {
                    //if sitting is repeated
                    $findSP4_Discharge->SittingRepeat_ReadingTime = $request->SittingRepeat_ReadingTime;
                    $findSP4_Discharge->SittingRepeat_BP = $request->SittingRepeat_BP;
                    $findSP4_Discharge->SittingRepeat_HR = $request->SittingRepeat_HR;
                    $findSP4_Discharge->SittingRepeat_RespiratoryRate = $request->SittingRepeat_RespiratoryRate;
                } else {
                    //if sitting is repeated is NA
                    $findSP4_Discharge->SittingRepeat_ReadingTime = NULL;
                    $findSP4_Discharge->SittingRepeat_BP = NULL;
                    $findSP4_Discharge->SittingRepeat_HR = NULL;
                    $findSP4_Discharge->SittingRepeat_RespiratoryRate = NULL;
                }

                $findSP4_Discharge->Initial = $request->Initial;

                $findSP4_Discharge->save();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function update(Request $request, $patient_id, $study_id,$study_period)
    {
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id', $patient_id)
            ->where('study_id', $study_id)
            ->first();
        if ($study_period == 1) {
            if($this->updateSP1($findPSS,$request)) {
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif ($study_period == 2) {
            if($this->updateSP2($findPSS,$request)) {
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif ($study_period == 3) {
            if($this->updateSP3($findPSS,$request)) {
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif ($study_period == 4) {
            if($this->updateSP4($findPSS,$request)) {
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }
    }

    public function updateSP1($findPSS, $request)
    {
        $flag = false;
        if ($findPSS != NULL) {
            $findSP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
            $Discharge = SP1_Discharge::where('SP1_Discharge_ID', $findSP1->SP1_Discharge)->first();
        }
        $Discharge->DischargeDate = $request->DischargeDate;

        $ud = $request->unscheduledDischarge;
        if ($ud == 'Yes') {
            $Discharge->UnscheduledDischarge = $request->unscheduledDischarge_Text;
        } else {
            $Discharge->UnscheduledDischarge = $request->unscheduledDischarge;
        }
        //sitting record
        $Discharge->Sitting_ReadingTime = $request->Sitting_ReadingTime;
        $Discharge->Sitting_BP = $request->Sitting_BP;
        $Discharge->Sitting_HR = $request->Sitting_HR;
        $Discharge->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;

        //repeated sitting record
        $repeat = $request->SittingRepeat;
        $Discharge->SittingRepeat = $request->sittingRepeat;
        if ($repeat == 'Yes') {
            //if sitting is repeated
            $Discharge->SittingRepeat_ReadingTime = $request->SittingRepeat_ReadingTime;
            $Discharge->SittingRepeat_BP = $request->SittingRepeat_BP;
            $Discharge->SittingRepeat_HR = $request->SittingRepeat_HR;
            $Discharge->SittingRepeat_RespiratoryRate = $request->SittingRepeat_RespiratoryRate;
        } else {
            //if sitting is repeated is NA
            $Discharge->SittingRepeat_ReadingTime = NULL;
            $Discharge->SittingRepeat_BP = NULL;
            $Discharge->SittingRepeat_HR = NULL;
            $Discharge->SittingRepeat_RespiratoryRate = NULL;
        }

        $Discharge->Initial = $request->Initial;

        if ($flag) {
            $Discharge->save();
            return true;
        } else {
            return false;
        }
    }

    public function updateSP2($findPSS, $request)
    {
        $flag = false;
        if ($findPSS != NULL) {
            $findSP2 = StudyPeriod2::where('SP2_ID', $findPSS->SP2_ID)->first();
            $Discharge = SP2_Discharge::where('SP2_Discharge_ID', $findSP2->SP2_Discharge)->first();
        }
        $Discharge->DischargeDate = $request->DischargeDate;

        $ud = $request->unscheduledDischarge;
        if ($ud == 'Yes') {
            $Discharge->UnscheduledDischarge = $request->unscheduledDischarge_Text;
        } else {
            $Discharge->UnscheduledDischarge = $request->unscheduledDischarge;
        }
        //sitting record
        $Discharge->Sitting_ReadingTime = $request->Sitting_ReadingTime;
        $Discharge->Sitting_BP = $request->Sitting_BP;
        $Discharge->Sitting_HR = $request->Sitting_HR;
        $Discharge->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;

        //repeated sitting record
        $repeat = $request->SittingRepeat;
        $Discharge->SittingRepeat = $request->sittingRepeat;
        if ($repeat == 'Yes') {
            //if sitting is repeated
            $Discharge->SittingRepeat_ReadingTime = $request->SittingRepeat_ReadingTime;
            $Discharge->SittingRepeat_BP = $request->SittingRepeat_BP;
            $Discharge->SittingRepeat_HR = $request->SittingRepeat_HR;
            $Discharge->SittingRepeat_RespiratoryRate = $request->SittingRepeat_RespiratoryRate;
        } else {
            //if sitting is repeated is NA
            $Discharge->SittingRepeat_ReadingTime = NULL;
            $Discharge->SittingRepeat_BP = NULL;
            $Discharge->SittingRepeat_HR = NULL;
            $Discharge->SittingRepeat_RespiratoryRate = NULL;
        }

        $Discharge->Initial = $request->Initial;

        if ($flag) {
            $Discharge->save();
            return true;
        } else {
            return false;
        }
    }

    public function updateSP3($findPSS, $request)
    {
        $flag = false;
        if ($findPSS != NULL) {
            $findSP3 = StudyPeriod3::where('SP3_ID', $findPSS->SP3_ID)->first();
            $Discharge = SP3_Discharge::where('SP3_Discharge_ID', $findSP3->SP3_Discharge)->first();
        }
        $Discharge->DischargeDate = $request->DischargeDate;

        $ud = $request->unscheduledDischarge;
        if ($ud == 'Yes') {
            $Discharge->UnscheduledDischarge = $request->unscheduledDischarge_Text;
        } else {
            $Discharge->UnscheduledDischarge = $request->unscheduledDischarge;
        }
        //sitting record
        $Discharge->Sitting_ReadingTime = $request->Sitting_ReadingTime;
        $Discharge->Sitting_BP = $request->Sitting_BP;
        $Discharge->Sitting_HR = $request->Sitting_HR;
        $Discharge->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;

        //repeated sitting record
        $repeat = $request->SittingRepeat;
        $Discharge->SittingRepeat = $request->sittingRepeat;
        if ($repeat == 'Yes') {
            //if sitting is repeated
            $Discharge->SittingRepeat_ReadingTime = $request->SittingRepeat_ReadingTime;
            $Discharge->SittingRepeat_BP = $request->SittingRepeat_BP;
            $Discharge->SittingRepeat_HR = $request->SittingRepeat_HR;
            $Discharge->SittingRepeat_RespiratoryRate = $request->SittingRepeat_RespiratoryRate;
        } else {
            //if sitting is repeated is NA
            $Discharge->SittingRepeat_ReadingTime = NULL;
            $Discharge->SittingRepeat_BP = NULL;
            $Discharge->SittingRepeat_HR = NULL;
            $Discharge->SittingRepeat_RespiratoryRate = NULL;
        }

        $Discharge->Initial = $request->Initial;

        if ($flag) {
            $Discharge->save();
            return true;
        } else {
            return false;
        }
    }

    public function updateSP4($findPSS, $request)
    {
        $flag = false;
        if ($findPSS != NULL) {
            $findSP4 = StudyPeriod4::where('SP4_ID', $findPSS->SP4_ID)->first();
            $Discharge = SP4_Discharge::where('SP4_Discharge_ID', $findSP4->SP4_Discharge)->first();
        }
        $Discharge->DischargeDate = $request->DischargeDate;

        $ud = $request->unscheduledDischarge;
        if ($ud == 'Yes') {
            $Discharge->UnscheduledDischarge = $request->unscheduledDischarge_Text;
        } else {
            $Discharge->UnscheduledDischarge = $request->unscheduledDischarge;
        }
        //sitting record
        $Discharge->Sitting_ReadingTime = $request->Sitting_ReadingTime;
        $Discharge->Sitting_BP = $request->Sitting_BP;
        $Discharge->Sitting_HR = $request->Sitting_HR;
        $Discharge->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;

        //repeated sitting record
        $repeat = $request->SittingRepeat;
        $Discharge->SittingRepeat = $request->sittingRepeat;
        if ($repeat == 'Yes') {
            //if sitting is repeated
            $Discharge->SittingRepeat_ReadingTime = $request->SittingRepeat_ReadingTime;
            $Discharge->SittingRepeat_BP = $request->SittingRepeat_BP;
            $Discharge->SittingRepeat_HR = $request->SittingRepeat_HR;
            $Discharge->SittingRepeat_RespiratoryRate = $request->SittingRepeat_RespiratoryRate;
        } else {
            //if sitting is repeated is NA
            $Discharge->SittingRepeat_ReadingTime = NULL;
            $Discharge->SittingRepeat_BP = NULL;
            $Discharge->SittingRepeat_HR = NULL;
            $Discharge->SittingRepeat_RespiratoryRate = NULL;
        }

        $Discharge->Initial = $request->Initial;

        if ($flag) {
            $Discharge->save();
            return true;
        } else {
            return false;
        }
    }

}
