<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_Discharge;
use App\StudyPeriod1;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SP1_Discharge_Controller extends Controller
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
            //find SP1_ID to access the SP1_Discharge
            //find Discharge table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $findSP1_Discharge = SP1_Discharge::where('SP1_Discharge_ID',$findSP1->SP1_Discharge)->first();
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
            $validatedData=$this->validate($request,[
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
            ],$custom);

            //discharge date and unscheduled discharge
            $findSP1_Discharge->DischargeDate = $request->DischargeDate;
            $ud = $request->UnscheduledDischarge;
            if ($ud == 'Yes') {
                $findSP1_Discharge->UnscheduledDischarge=$request->unscheduledDischarge_Text;
            } else{
                $findSP1_Discharge->UnscheduledDischarge=$request->unscheduledDischarge;
            }
            //sitting record
            $findSP1_Discharge->Sitting_ReadingTime = $request->Sitting_ReadingTime;
            $findSP1_Discharge->Sitting_BP = $request->Sitting_BP;
            $findSP1_Discharge->Sitting_HR = $request->Sitting_HR;
            $findSP1_Discharge->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;

            //repeated sitting record 
            $repeat = $request->SittingRepeat;
            $findSP1_Discharge->SittingRepeat = $request->SittingRepeat;
            if($repeat=='Sitting Repeated'){
                //if sitting is repeated
                $findSP1_Discharge->SittingRepeat_ReadingTime = $request->SittingRepeat_ReadingTime;
                $findSP1_Discharge->SittingRepeat_BP = $request->SittingRepeat_BP;
                $findSP1_Discharge->SittingRepeat_HR = $request->SittingRepeat_HR;
                $findSP1_Discharge->SittingRepeat_RespiratoryRate = $request->SittingRepeat_RespiratoryRate;
            }else{
                //if sitting is repeated is non
                $findSP1_Discharge->SittingRepeat_ReadingTime = NULL;
                $findSP1_Discharge->SittingRepeat_BP = NULL;
                $findSP1_Discharge->SittingRepeat_HR = NULL;
                $findSP1_Discharge->SittingRepeat_RespiratoryRate = NULL;
            }

            $findSP1_Discharge->Initial = $request->Initial;

            $findSP1_Discharge->save();

            return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Discharge!');
        }else{
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }

    }

}
