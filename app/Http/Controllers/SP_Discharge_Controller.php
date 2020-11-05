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

class SP_Discharge_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $study_id)
    {
        $PID = $request->patient_id;
        $study_period = $request->studyPeriod;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id', $PID)
                                        ->where('study_id', $study_id)
                                        ->first();
        //check study period and save
        if ($study_period == 1) {
            //SP1 query
            $SP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $PSS = $findPSS->SP1_ID;
            $Discharge = SP1_Discharge::where('SP1_Discharge_ID', $SP1->SP1_Discharge)->first();
            if ($this->storeSP($findPSS,$PSS,$Discharge,$request)) {
                return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Discharge!');
            } else {
                alert()->error('Error!', 'This subject is not enrolled into any study!');
                return redirect(route('studySpecific.input', $study_id));
            }
        } elseif ($study_period == 2) {
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $Discharge = SP2_Discharge::where('SP2_Discharge_ID', $SP2->SP2_Discharge)->first();
            if ($this->storeSP($findPSS,$PSS,$Discharge,$request)) {
                return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Discharge!');
            } else {
                alert()->error('Error!', 'This subject is not enrolled into any study!');
                return redirect(route('studySpecific.input', $study_id));
            }
        } elseif ($study_period == 3) {
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $Discharge = SP3_Discharge::where('SP3_Discharge_ID', $SP3->SP3_Discharge)->first();
            if ($this->storeSP($findPSS,$PSS,$Discharge,$request)) {
                return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Discharge!');
            } else {
                alert()->error('Error!', 'This subject is not enrolled into any study!');
                return redirect(route('studySpecific.input', $study_id));
            }
        } elseif ($study_period == 4) {
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $Discharge = SP4_Discharge::where('SP4_Discharge_ID', $SP4->SP4_Discharge)->first();
            if ($this->storeSP($findPSS,$PSS,$Discharge,$request)) {
                return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Discharge!');
            } else {
                alert()->error('Error!', 'This subject is not enrolled into any study!');
                return redirect(route('studySpecific.input', $study_id));
            }
        }else
            {
                alert()->error('Error!','You did not select the study period!');
                return redirect(route('studySpecific.input', $study_id));
            }
    }

    public function update(Request $request, $patient_id, $study_id,$study_period)
    {
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id', $patient_id)
            ->where('study_id', $study_id)
            ->first();
        if ($study_period == 1) {
            //SP1 query
            $SP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $PSS = $findPSS->SP1_ID;
            $Discharge = SP1_Discharge::where('SP1_Discharge_ID', $SP1->SP1_Discharge)->first();
            if($this->updateSP($findPSS,$PSS,$Discharge,$request)) {
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif ($study_period == 2) {
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $Discharge = SP2_Discharge::where('SP2_Discharge_ID', $SP2->SP2_Discharge)->first();
            if($this->updateSP($findPSS,$PSS,$Discharge,$request)) {
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif ($study_period == 3) {
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $Discharge = SP3_Discharge::where('SP3_Discharge_ID', $SP3->SP3_Discharge)->first();
            if($this->updateSP($findPSS,$PSS,$Discharge,$request)) {
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif ($study_period == 4) {
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $Discharge = SP4_Discharge::where('SP4_Discharge_ID', $SP4->SP4_Discharge)->first();
            if($this->updateSP($findPSS,$PSS,$Discharge,$request)) {
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.edit',$study_id));
        }
    }

    public function storeSP($findPSS,$PSS,$Discharge,$request){
        //custom messages load for validation
        $custom = [
            'DischargeDate.required' => 'Please enter the discharge date',
            'unscheduledDischarge.required' => 'Please state whether is it an unscheduled discharge',
            'unscheduledDischarge_Text.required_if' => 'If it is an unscheduled discharge, please state why',
            'Sitting_ReadingTime.required' => 'Please enter the Sitting Reading Time',
            'Sitting_BP_S.required' => 'Please enter the systolic for Blood Pressure',
            'Sitting_BP_D.required' => 'Please enter the diastolic for Blood Pressure',
            'Sitting_HR.required' => 'Please enter the Sitting Heart Rate',
            'Sitting_RespiratoryRate.required' => 'Please enter the Sitting Respiratory Rate',
            'SittingRepeat_ReadingTime.required_if' => 'Please enter the Sitting Reading Time for the repeated test',
            'SittingRepeat_BP_S.required_if' => 'Please enter the systolic for Blood Pressure for the repeated test',
            'SittingRepeat_BP_D.required_if' => 'Please enter the diastolic for Blood Pressure for the repeated test',
            'SittingRepeat_HR.required_if' => 'Please enter the Sitting Heart Rate for the repeated test',
            'SittingRepeat_RespiratoryRate.required_if' => 'Please enter the Sitting Respiratory Rate for the repeated test',
            'Initial.required' => 'Initial of the physician’s is required',
        ];

        if ($findPSS != NULL && $PSS != NULL) {
            //validation for required fields
            $validatedData = $this->validate($request, [
                'DischargeDate' => 'required',
                'unscheduledDischarge' => 'required',
                'unscheduledDischarge_Text' => 'required_if:unscheduledDischarge,==,Yes',
                'Sitting_ReadingTime' => 'required',
                'Sitting_BP_S' => 'required',
                'Sitting_BP_D' => 'required',
                'Sitting_HR' => 'required',
                'Sitting_RespiratoryRate' => 'required',
                'SittingRepeat_ReadingTime' => 'required_if:SittingRepeat,==,Yes',
                'SittingRepeat_BP_S' => 'required_if:SittingRepeat,==,Yes',
                'SittingRepeat_BP_D' => 'required_if:SittingRepeat,==,Yes',
                'SittingRepeat_HR' => 'required_if:SittingRepeat,==,Yes',
                'SittingRepeat_RespiratoryRate' => 'required_if:SittingRepeat,==,Yes',
                'Initial' => 'required',
            ], $custom);
            $Discharge->DischargeDate = $request->DischargeDate;
            $ud = $request->unscheduledDischarge;
            if ($ud == 'Yes') {
                $Discharge->UnscheduledDischarge = $request->unscheduledDischarge_Text;
            } else {
                $Discharge->UnscheduledDischarge = $request->unscheduledDischarge;
            }
            //sitting record
            $Discharge->Sitting_ReadingTime = $request->Sitting_ReadingTime;
            $Discharge->Sitting_BP_S = $request->Sitting_BP_S;
            $Discharge->Sitting_BP_D = $request->Sitting_BP_D;
            $Discharge->Sitting_HR = $request->Sitting_HR;
            $Discharge->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;
            //repeated sitting record
            $repeat = $request->SittingRepeat;
            $Discharge->SittingRepeat = $request->SittingRepeat;
            if ($repeat == 'Yes') {
                //if sitting is repeated
                $Discharge->SittingRepeat_ReadingTime = $request->SittingRepeat_ReadingTime;
                $Discharge->SittingRepeat_BP_S = $request->SittingRepeat_BP_S;
                $Discharge->SittingRepeat_BP_D = $request->SittingRepeat_BP_D;
                $Discharge->SittingRepeat_HR = $request->SittingRepeat_HR;
                $Discharge->SittingRepeat_RespiratoryRate = $request->SittingRepeat_RespiratoryRate;
            } else {
                //if sitting is repeated is NA
                $Discharge->SittingRepeat_ReadingTime = NULL;
                $Discharge->SittingRepeat_BP_S = NULL;
                $Discharge->SittingRepeat_BP_D = NULL;
                $Discharge->SittingRepeat_HR = NULL;
                $Discharge->SittingRepeat_RespiratoryRate = NULL;
            }
            $Discharge->Initial = $request->Initial;
            $Discharge->save();
            return true;
        }else{
            return false;
        }
    }

    public function updateSP($findPSS,$PSS,$Discharge,$request){
        //custom messages load for validation
        $custom = [
            'DischargeDate.required' => 'Please enter the discharge date',
            'unscheduledDischarge.required' => 'Please state whether is it an unscheduled discharge',
            'unscheduledDischarge_Text.required_if' => 'If it is an unscheduled discharge, please state why',
            'Sitting_ReadingTime.required' => 'Please enter the Sitting Reading Time',
            'Sitting_BP_S.required' => 'Please enter the systolic for Blood Pressure',
            'Sitting_BP_D.required' => 'Please enter the diastolic for Blood Pressure',
            'Sitting_HR.required' => 'Please enter the Sitting Heart Rate',
            'Sitting_RespiratoryRate.required' => 'Please enter the Sitting Respiratory Rate',
            'SittingRepeat_ReadingTime.required_if' => 'Please enter the Sitting Reading Time for the repeated test',
            'SittingRepeat_BP_S.required_if' => 'Please enter the systolic for Blood Pressure for the repeated test',
            'SittingRepeat_BP_D.required_if' => 'Please enter the diastolic for Blood Pressure for the repeated test',
            'SittingRepeat_HR.required_if' => 'Please enter the Sitting Heart Rate for the repeated test',
            'SittingRepeat_RespiratoryRate.required_if' => 'Please enter the Sitting Respiratory Rate for the repeated test',
            'Initial.required' => 'Initial of the physician’s is required',
        ];

        if ($findPSS != NULL) {
            //validation for required fields
            // $validatedData = $this->validate($request, [
            //     'DischargeDate' => 'required',
            //     'unscheduledDischarge' => 'required',
            //     'unscheduledDischarge_Text' => 'required_if:unscheduledDischarge,==,Yes',
            //     'Sitting_ReadingTime' => 'required',
            //     'Sitting_BP_S' => 'required',
            //     'Sitting_BP_D' => 'required',
            //     'Sitting_HR' => 'required',
            //     'Sitting_RespiratoryRate' => 'required',
            //     'SittingRepeat_ReadingTime' => 'required_if:SittingRepeat,==,Yes',
            //     'SittingRepeat_BP_S' => 'required_if:SittingRepeat,==,Yes',
            //     'SittingRepeat_BP_D' => 'required_if:SittingRepeat,==,Yes',
            //     'SittingRepeat_HR' => 'required_if:SittingRepeat,==,Yes',
            //     'SittingRepeat_RespiratoryRate' => 'required_if:SittingRepeat,==,Yes',
            //     'Initial' => 'required',
            // ], $custom);
            $Discharge->DischargeDate = $request->DischargeDate;
            $ud = $request->unscheduledDischarge;
            if ($ud == 'Yes') {
                $Discharge->UnscheduledDischarge = $request->unscheduledDischarge_Text;
            } else {
                $Discharge->UnscheduledDischarge = $request->unscheduledDischarge;
            }
            //sitting record
            $Discharge->Sitting_ReadingTime = $request->Sitting_ReadingTime;
            $Discharge->Sitting_BP_S = $request->Sitting_BP_S;
            $Discharge->Sitting_BP_D = $request->Sitting_BP_D;
            $Discharge->Sitting_HR = $request->Sitting_HR;
            $Discharge->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;
            //repeated sitting record
            $repeat = $request->SittingRepeat;
            $Discharge->SittingRepeat = $request->sittingRepeat;
            if ($repeat == 'Yes') {
                //if sitting is repeated
                $Discharge->SittingRepeat_ReadingTime = $request->SittingRepeat_ReadingTime;
                $Discharge->SittingRepeat_BP_S = $request->SittingRepeat_BP_S;
                $Discharge->SittingRepeat_BP_D = $request->SittingRepeat_BP_D;
                $Discharge->SittingRepeat_HR = $request->SittingRepeat_HR;
                $Discharge->SittingRepeat_RespiratoryRate = $request->SittingRepeat_RespiratoryRate;
            } else {
                //if sitting is repeated is NA
                $Discharge->SittingRepeat_ReadingTime = NULL;
                $Discharge->SittingRepeat_BP_S = NULL;
                $Discharge->SittingRepeat_BP_D = NULL;
                $Discharge->SittingRepeat_HR = NULL;
                $Discharge->SittingRepeat_RespiratoryRate = NULL;
            }
            $Discharge->Initial = $request->Initial;
            $Discharge->save();
            return true;
        }else{
            return false;
        }
    }

}
