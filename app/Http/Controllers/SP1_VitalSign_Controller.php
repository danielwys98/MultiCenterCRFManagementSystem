<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_VitalSigns;
use App\StudyPeriod1;
use Illuminate\Http\Request;

class SP1_VitalSign_Controller extends Controller
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
            //find SP1_ID to access the SP1_VitalSigns
            //find table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $findSP1_VitalSign =SP1_VitalSigns::where('SP1_VitalSign_ID',$findSP1->SP1_VitalSign)->first();
            //custom messages load for validation
            $custom = [
                'TPD_1_Date.required' => 'Please enter the vital signs date of 1hr time post dose',
                'TPD_1_ReadingTime.required' => 'Please enter the vital signs reading time of 1hr time post dose',
                'TPD_1_SittingBP.required' => 'Please enter the vital signs sitting blood pressure of 1hr time post dose',
                'TPD_1_Pulse.required' => 'Please enter the vital signs pulse rate of 1hr time post dose',
                'TPD_1_Respiration.required' => 'Please enter the vital signs respiration rate of 1hr time post dose',
                'TPD_1_TakenBy.required' => 'Please enter the vital signs physician name of 1hr time post dose',

                'TPD_2_Date.required' => 'Please enter the vital signs date of 2hr time post dose',
                'TPD_2_ReadingTime.required' => 'Please enter the vital signs reading time of 2hr time post dose',
                'TPD_2_SittingBP.required' => 'Please enter the vital signs sitting blood pressure of 2hr time post dose',
                'TPD_2_Pulse.required' => 'Please enter the vital signs pulse rate of 2hr time post dose',
                'TPD_2_Respiration.required' => 'Please enter the vital signs respiration rate of 2hr time post dose',
                'TPD_2_TakenBy.required' => 'Please enter the vital signs physician name of 2hr time post dose',

                'TPD_5_Date.required' => 'Please enter the vital signs date of 5hr time post dose',
                'TPD_5_ReadingTime.required' => 'Please enter the vital signs reading time of 5hr time post dose',
                'TPD_5_SittingBP.required' => 'Please enter the vital signs sitting blood pressure of 5hr time post dose',
                'TPD_5_Pulse.required' => 'Please enter the vital signs pulse rate of 5hr time post dose',
                'TPD_5_Respiration.required' => 'Please enter the vital signs respiration rate of 5hr time post dose',
                'TPD_5_TakenBy.required' => 'Please enter the vital signs physician name of 5hr time post dose',

                'TPD_8_Date.required' => 'Please enter the vital signs date of 8hr time post dose',
                'TPD_8_ReadingTime.required' => 'Please enter the vital signs reading time of 8hr time post dose',
                'TPD_8_SittingBP.required' => 'Please enter the vital signs sitting blood pressure of 8hr time post dose',
                'TPD_8_Pulse.required' => 'Please enter the vital signs pulse rate of 8hr time post dose',
                'TPD_8_Respiration.required' => 'Please enter the vital signs respiration rate of 8hr time post dose',
                'TPD_8_TakenBy.required' => 'Please enter the vital signs physician name of 8hr time post dose',

                'TPD_12_Date.required' => 'Please enter the vital signs date of 12hr time post dose',
                'TPD_12_ReadingTime.required' => 'Please enter the vital signs reading time of 12hr time post dose',
                'TPD_12_SittingBP.required' => 'Please enter the vital signs sitting blood pressure of 12hr time post dose',
                'TPD_12_Pulse.required' => 'Please enter the vital signs pulse rate of 12hr time post dose',
                'TPD_12_Respiration.required' => 'Please enter the vital signs respiration rate of 12hr time post dose',
                'TPD_12_TakenBy.required' => 'Please enter the vital signs physician name of 12hr time post dose',

                'TPD_36_Date.required' => 'Please enter the vital signs date of 36hr time post dose',
                'TPD_36_ReadingTime.required' => 'Please enter the vital signs reading time of 36hr time post dose',
                'TPD_36_SittingBP.required' => 'Please enter the vital signs sitting blood pressure of 36hr time post dose',
                'TPD_36_Pulse.required' => 'Please enter the vital signs pulse rate of 36hr time post dose',
                'TPD_36_Respiration.required' => 'Please enter the vital signs respiration rate of 36hr time post dose',
                'TPD_36_TakenBy.required' => 'Please enter the vital signs physician name of 36hr time post dose',

                'TPD_48_Date.required' => 'Please enter the vital signs date of 48hr time post dose',
                'TPD_48_ReadingTime.required' => 'Please enter the vital signs reading time of 48hr time post dose',
                'TPD_48_SittingBP.required' => 'Please enter the vital signs sitting blood pressure of 48hr time post dose',
                'TPD_48_Pulse.required' => 'Please enter the vital signs pulse rate of 48hr time post dose',
                'TPD_48_Respiration.required' => 'Please enter the vital signs respiration rate of 48hr time post dose',
                'TPD_48_TakenBy.required' => 'Please enter the vital signs physician name of 48hr time post dose',
            ];

            //validation for required fields
            $validatedData=$this->validate($request,[
                'TPD_1_Date' => 'required',
                'TPD_1_ReadingTime' => 'required',
                'TPD_1_SittingBP' => 'required',
                'TPD_1_Pulse' => 'required',
                'TPD_1_Respiration' => 'required',
                'TPD_1_TakenBy' => 'required',

                'TPD_2_Date' => 'required',
                'TPD_2_ReadingTime' => 'required',
                'TPD_2_SittingBP' => 'required',
                'TPD_2_Pulse' => 'required',
                'TPD_2_Respiration' => 'required',
                'TPD_2_TakenBy' => 'required',

                'TPD_5_Date' => 'required',
                'TPD_5_ReadingTime' => 'required',
                'TPD_5_SittingBP' => 'required',
                'TPD_5_Pulse' => 'required',
                'TPD_5_Respiration' => 'required',
                'TPD_5_TakenBy' => 'required',

                'TPD_8_Date' => 'required',
                'TPD_8_ReadingTime' => 'required',
                'TPD_8_SittingBP' => 'required',
                'TPD_8_Pulse' => 'required',
                'TPD_8_Respiration' => 'required',
                'TPD_8_TakenBy' => 'required',

                'TPD_12_Date' => 'required',
                'TPD_12_ReadingTime' => 'required',
                'TPD_12_SittingBP' => 'required',
                'TPD_12_Pulse' => 'required',
                'TPD_12_Respiration' => 'required',
                'TPD_12_TakenBy' => 'required',

                'TPD_36_Date' => 'required',
                'TPD_36_ReadingTime' => 'required',
                'TPD_36_SittingBP' => 'required',
                'TPD_36_Pulse' => 'required',
                'TPD_36_Respiration' => 'required',
                'TPD_36_TakenBy' => 'required',

                'TPD_48_Date' => 'required',
                'TPD_48_ReadingTime' => 'required',
                'TPD_48_SittingBP' => 'required',
                'TPD_48_Pulse' => 'required',
                'TPD_48_Respiration' => 'required',
                'TPD_48_TakenBy' => 'required',
            ],$custom);

            //TPD 1hr
            $findSP1_VitalSign->TPD_1_Date = $request->TPD_1_Date;
            $findSP1_VitalSign->TPD_1_ReadingTime = $request->TPD_1_ReadingTime;
            $findSP1_VitalSign->TPD_1_SittingBP = $request->TPD_1_SittingBP;
            $findSP1_VitalSign->TPD_1_Pulse = $request->TPD_1_Pulse;
            $findSP1_VitalSign->TPD_1_Respiration = $request->TPD_1_Respiration;
            $findSP1_VitalSign->TPD_1_TakenBy = $request->TPD_1_TakenBy;

            //TPD 2hr
            $findSP1_VitalSign->TPD_2_Date = $request->TPD_2_Date;
            $findSP1_VitalSign->TPD_2_ReadingTime = $request->TPD_2_ReadingTime;
            $findSP1_VitalSign->TPD_2_SittingBP = $request->TPD_2_SittingBP;
            $findSP1_VitalSign->TPD_2_Pulse = $request->TPD_2_Pulse;
            $findSP1_VitalSign->TPD_2_Respiration = $request->TPD_2_Respiration;
            $findSP1_VitalSign->TPD_2_TakenBy = $request->TPD_2_TakenBy;

            //TPD 5hr
            $findSP1_VitalSign->TPD_5_Date = $request->TPD_5_Date;
            $findSP1_VitalSign->TPD_5_ReadingTime = $request->TPD_5_ReadingTime;
            $findSP1_VitalSign->TPD_5_SittingBP = $request->TPD_5_SittingBP;
            $findSP1_VitalSign->TPD_5_Pulse = $request->TPD_5_Pulse;
            $findSP1_VitalSign->TPD_5_Respiration = $request->TPD_5_Respiration;
            $findSP1_VitalSign->TPD_5_TakenBy = $request->TPD_5_TakenBy;

            //TPD 8hr
            $findSP1_VitalSign->TPD_8_Date = $request->TPD_8_Date;
            $findSP1_VitalSign->TPD_8_ReadingTime = $request->TPD_8_ReadingTime;
            $findSP1_VitalSign->TPD_8_SittingBP = $request->TPD_8_SittingBP;
            $findSP1_VitalSign->TPD_8_Pulse = $request->TPD_8_Pulse;
            $findSP1_VitalSign->TPD_8_Respiration = $request->TPD_8_Respiration;
            $findSP1_VitalSign->TPD_8_TakenBy = $request->TPD_8_TakenBy;

            //TPD 12hr
            $findSP1_VitalSign->TPD_12_Date = $request->TPD_12_Date;
            $findSP1_VitalSign->TPD_12_ReadingTime = $request->TPD_12_ReadingTime;
            $findSP1_VitalSign->TPD_12_SittingBP = $request->TPD_12_SittingBP;
            $findSP1_VitalSign->TPD_12_Pulse = $request->TPD_12_Pulse;
            $findSP1_VitalSign->TPD_12_Respiration = $request->TPD_12_Respiration;
            $findSP1_VitalSign->TPD_12_TakenBy = $request->TPD_12_TakenBy;

            //TPD 36hr
            $findSP1_VitalSign->TPD_36_Date = $request->TPD_36_Date;
            $findSP1_VitalSign->TPD_36_ReadingTime = $request->TPD_36_ReadingTime;
            $findSP1_VitalSign->TPD_36_SittingBP = $request->TPD_36_SittingBP;
            $findSP1_VitalSign->TPD_36_Pulse = $request->TPD_36_Pulse;
            $findSP1_VitalSign->TPD_36_Respiration = $request->TPD_36_Respiration;
            $findSP1_VitalSign->TPD_36_TakenBy = $request->TPD_36_TakenBy;

            //TPD 48hr
            $findSP1_VitalSign->TPD_48_Date = $request->TPD_48_Date;
            $findSP1_VitalSign->TPD_48_ReadingTime = $request->TPD_48_ReadingTime;
            $findSP1_VitalSign->TPD_48_SittingBP = $request->TPD_48_SittingBP;
            $findSP1_VitalSign->TPD_48_Pulse = $request->TPD_48_Pulse;
            $findSP1_VitalSign->TPD_48_Respiration = $request->TPD_48_Respiration;
            $findSP1_VitalSign->TPD_48_TakenBy = $request->TPD_48_TakenBy;

            //Below Are Repeat/Extra VitalSigns
            $findSP1_VitalSign->Extra1_Date = $request->Extra1_Date;
            $findSP1_VitalSign->Extra1_TPD = $request->Extra1_TPD;
            $findSP1_VitalSign->Extra1_ReadingTime = $request->Extra1_ReadingTime;
            $findSP1_VitalSign->Extra1_SittingBP = $request->Extra1_SittingBP;
            $findSP1_VitalSign->Extra1_Pulse = $request->Extra1_Pulse;
            $findSP1_VitalSign->Extra1_Respiration = $request->Extra1_Respiration;
            $findSP1_VitalSign->Extra1_TakenBy = $request->Extra1_TakenBy;

            $findSP1_VitalSign->Extra2_Date = $request->Extra2_Date;
            $findSP1_VitalSign->Extra2_TPD = $request->Extra2_TPD;
            $findSP1_VitalSign->Extra2_ReadingTime = $request->Extra2_ReadingTime;
            $findSP1_VitalSign->Extra2_SittingBP = $request->Extra2_SittingBP;
            $findSP1_VitalSign->Extra2_Pulse = $request->Extra2_Pulse;
            $findSP1_VitalSign->Extra2_Respiration = $request->Extra2_Respiration;
            $findSP1_VitalSign->Extra2_TakenBy = $request->Extra2_TakenBy;

            $findSP1_VitalSign->Extra3_Date = $request->Extra3_Date;
            $findSP1_VitalSign->Extra3_TPD = $request->Extra3_TPD;
            $findSP1_VitalSign->Extra3_ReadingTime = $request->Extra3_ReadingTime;
            $findSP1_VitalSign->Extra3_SittingBP = $request->Extra3_SittingBP;
            $findSP1_VitalSign->Extra3_Pulse = $request->Extra3_Pulse;
            $findSP1_VitalSign->Extra3_Respiration = $request->Extra3_Respiration;
            $findSP1_VitalSign->Extra3_TakenBy = $request->Extra3_TakenBy;

            $findSP1_VitalSign->Extra4_Date = $request->Extra4_Date;
            $findSP1_VitalSign->Extra4_TPD = $request->Extra4_TPD;
            $findSP1_VitalSign->Extra4_ReadingTime = $request->Extra4_ReadingTime;
            $findSP1_VitalSign->Extra4_SittingBP = $request->Extra4_SittingBP;
            $findSP1_VitalSign->Extra4_Pulse = $request->Extra4_Pulse;
            $findSP1_VitalSign->Extra4_Respiration = $request->Extra4_Respiration;
            $findSP1_VitalSign->Extra4_TakenBy = $request->Extra4_TakenBy;

            $findSP1_VitalSign->Extra5_Date = $request->Extra5_Date;
            $findSP1_VitalSign->Extra5_TPD = $request->Extra5_TPD;
            $findSP1_VitalSign->Extra5_ReadingTime = $request->Extra5_ReadingTime;
            $findSP1_VitalSign->Extra5_SittingBP = $request->Extra5_SittingBP;
            $findSP1_VitalSign->Extra5_Pulse = $request->Extra5_Pulse;
            $findSP1_VitalSign->Extra5_Respiration = $request->Extra5_Respiration;
            $findSP1_VitalSign->Extra5_TakenBy = $request->Extra5_TakenBy;

            $findSP1_VitalSign->Extra6_Date = $request->Extra6_Date;
            $findSP1_VitalSign->Extra6_TPD = $request->Extra6_TPD;
            $findSP1_VitalSign->Extra6_ReadingTime = $request->Extra6_ReadingTime;
            $findSP1_VitalSign->Extra6_SittingBP = $request->Extra6_SittingBP;
            $findSP1_VitalSign->Extra6_Pulse = $request->Extra6_Pulse;
            $findSP1_VitalSign->Extra6_Respiration = $request->Extra6_Respiration;
            $findSP1_VitalSign->Extra6_TakenBy = $request->Extra6_TakenBy;

            $findSP1_VitalSign->Extra7_Date = $request->Extra7_Date;
            $findSP1_VitalSign->Extra7_TPD = $request->Extra7_TPD;
            $findSP1_VitalSign->Extra7_ReadingTime = $request->Extra7_ReadingTime;
            $findSP1_VitalSign->Extra7_SittingBP = $request->Extra7_SittingBP;
            $findSP1_VitalSign->Extra7_Pulse = $request->Extra7_Pulse;
            $findSP1_VitalSign->Extra7_Respiration = $request->Extra7_Respiration;
            $findSP1_VitalSign->Extra7_TakenBy = $request->Extra7_TakenBy;

            $findSP1_VitalSign->Extra8_Date = $request->Extra8_Date;
            $findSP1_VitalSign->Extra8_TPD = $request->Extra8_TPD;
            $findSP1_VitalSign->Extra8_ReadingTime = $request->Extra8_ReadingTime;
            $findSP1_VitalSign->Extra8_SittingBP = $request->Extra8_SittingBP;
            $findSP1_VitalSign->Extra8_Pulse = $request->Extra8_Pulse;
            $findSP1_VitalSign->Extra8_Respiration = $request->Extra8_Respiration;
            $findSP1_VitalSign->Extra8_TakenBy = $request->Extra8_TakenBy;


            $findSP1_VitalSign->save();

            return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Admission!');
        }else{
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }

    }
}
