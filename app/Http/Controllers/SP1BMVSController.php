<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_Admission;
use App\SP1_BMVS;
use App\StudyPeriod1;
use Illuminate\Http\Request;

class SP1BMVSController extends Controller
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
                                        ->first();

        if($findPSS !=NULL){
            if($findPSS->study_id == $study_id)
            {
                //find SP1_ID to access the SP1_Admission
                //find admission table and update it
                $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
                $findSP1_BMVS = SP1_BMVS::where('SP1_BMVS_ID',$findSP1->SP1_BMVS)->first();
               //SAVE BMVS stuffs
                $findSP1_BMVS->dateTaken=$request->dateTaken;
                $findSP1_BMVS->timeTaken=$request->timeTaken;
                $findSP1_BMVS->weight=$request->weight;
                $findSP1_BMVS->height=$request->height;
                $findSP1_BMVS->bmi=$request->bmi;
                $findSP1_BMVS->temperature=$request->temperature;
                $findSP1_BMVS->Supine_ReadingTime=$request->Supine_ReadingTime;
                $findSP1_BMVS->Supine_BP=$request->Supine_BP;
                $findSP1_BMVS->Supine_HR=$request->Supine_HR;
                $findSP1_BMVS->Supine_RespiratoryRate=$request->Supine_RespiratoryRate;
                $findSP1_BMVS->Sitting_ReadingTime=$request->Sitting_ReadingTime;
                $findSP1_BMVS->Sitting_BP=$request->Sitting_BP;
                $findSP1_BMVS->Sitting_HR=$request->Sitting_HR;
                $findSP1_BMVS->Sitting_RespiratoryRate=$request->Sitting_RespiratoryRate;
                $findSP1_BMVS->Sitting_ReadingTime_Repeat1=$request->Sitting_ReadingTime_Repeat1;
                $findSP1_BMVS->Sitting_BP_Repeat1=$request->Sitting_BP_Repeat1;
                $findSP1_BMVS->Sitting_HR_Repeat1=$request->Sitting_HR_Repeat1;
                $findSP1_BMVS->Sitting_RespiratoryRate_Repeat1=$request->Sitting_RespiratoryRate_Repeat1;
                $findSP1_BMVS->Sitting_ReadingTime_Repeat2=$request->Sitting_ReadingTime_Repeat2;
                $findSP1_BMVS->Sitting_BP_Repeat2=$request->Sitting_BP_Repeat2;
                $findSP1_BMVS->Sitting_HR_Repeat2=$request->Sitting_HR_Repeat2;
                $findSP1_BMVS->Sitting_RespiratoryRate_Repeat2=$request->Sitting_RespiratoryRate_Repeat2;

                $findSP1_BMVS->save();

                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Body Measurement and Vital Signs!');
            }
            else
            {
                alert()->error('Error!','This subject is not enrolled into this study!');
                return redirect(route('studySpecific.input',$study_id));
            }

        }else{
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }

    }
}
