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
            $findSP1_Discharge = SP1_Discharge::where('SP1_Discharge_ID',$findSP1->SP1_Discharge)->first();

            $findSP1_Discharge->DischargeDate = $request->DischargeDate;
            $findSP1_Discharge->UnscheduledDischarge = $request->UnscheduledDischarge;
            $findSP1_Discharge->Sitting_ReadingTime = $request->Sitting_ReadingTime;

            $findSP1_Discharge->Sitting_BP = $request->Sitting_BP;
            $findSP1_Discharge->Sitting_HR = $request->Sitting_HR;
            $findSP1_Discharge->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;


            $findSP1_Discharge->SittingRepeat = $request->SittingRepeat;
            $findSP1_Discharge->SittingRepeat_ReadingTime = $request->SittingRepeat_ReadingTime;
            $findSP1_Discharge->SittingRepeat_BP = $request->SittingRepeat_BP;
            $findSP1_Discharge->SittingRepeat_HR = $request->SittingRepeat_HR;
            $findSP1_Discharge->SittingRepeat_RespiratoryRate = $request->SittingRepeat_RespiratoryRate;


            $findSP1_Discharge->Initial = $request->Initial;

            $findSP1_Discharge->save();

            return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Admission!');
        }else{
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }

    }

}
