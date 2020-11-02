<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientStudySpecific;
use App\StudyPeriod1;
use App\SP1_PKineticSampling;
use DB;

class SP1_PKineticSampling_Controller extends Controller
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
            //find SP1_ID to access the SP1_PKineticSampling
            //find table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $findSP1_PKineticSampling = SP1_PKineticSampling::where('SP1_PKineticSampling_ID',$findSP1->SP1_PKineticSampling)->first();
            //SAVE SP1_PKineticSampling stuffs
            //custom messages load for validation
           $custom = [
            'Day1.required' => 'Please enter the day 1 of Pharmacokinetic Blood Sampling sampling date',
            'Day3.required' => 'Please enter the day 3 of Pharmacokinetic Blood Sampling sampling date',

            'LastFoodDate.required' => 'Please enter last food date of Pharmacokinetic Blood Sampling',
            'LastWaterDate.required' => 'Please enter last water date of Pharmacokinetic Blood Sampling',
            'StudyDrugDate.required' => 'Please enter study drug date of Pharmacokinetic Blood Sampling',
            'LastFoodTime.required' => 'Please enter last food time of Pharmacokinetic Blood Sampling',
            'LastWaterTime.required' => 'Please enter last water time of Pharmacokinetic Blood Sampling',
            'StudyDrugTime.required' => 'Please enter study drug time of Pharmacokinetic Blood Sampling',

            'pk_Date_Day_PD.required' => 'Please enter the PD date for Pharmacokinetic Blood Sampling',
            'pk_PD_AST.required' => 'Please enter the PD Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_PD_Collected.required' => 'Please enter the person collected for PD Pharmacokinetic Blood Sampling',
            'pk_PD_Checked.required' => 'Please enter the person checked for PD Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S1.required' => 'Please enter the S1 date for Pharmacokinetic Blood Sampling',
            'pk_S1_SST.required' => 'Please enter the S1 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S1_AST.required' => 'Please enter the S1 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S1_Collected.required' => 'Please enter the person collected for S1 Pharmacokinetic Blood Sampling',
            'pk_S1_Checked.required' => 'Please enter the person checked for S1 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S2.required' => 'Please enter the S2 date for Pharmacokinetic Blood Sampling',
            'pk_S2_SST.required' => 'Please enter the S2 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S2_AST.required' => 'Please enter the S2 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S2_Collected.required' => 'Please enter the person collected for S2 Pharmacokinetic Blood Sampling',
            'pk_S2_Checked.required' => 'Please enter the person checked for S2 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S3.required' => 'Please enter the S3 date for Pharmacokinetic Blood Sampling',
            'pk_S3_SST.required' => 'Please enter the S3 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S3_AST.required' => 'Please enter the S3 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S3_Collected.required' => 'Please enter the person collected for S3 Pharmacokinetic Blood Sampling',
            'pk_S3_Checked.required' => 'Please enter the person checked for S3 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S4.required' => 'Please enter the S4 date for Pharmacokinetic Blood Sampling',
            'pk_S4_SST.required' => 'Please enter the S4 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S4_AST.required' => 'Please enter the S4 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S4_Collected.required' => 'Please enter the person collected for S4 Pharmacokinetic Blood Sampling',
            'pk_S4_Checked.required' => 'Please enter the person checked for S4 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S5.required' => 'Please enter the S5 date for Pharmacokinetic Blood Sampling',
            'pk_S5_SST.required' => 'Please enter the S5 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S5_AST.required' => 'Please enter the S5 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S5_Collected.required' => 'Please enter the person collected for S5 Pharmacokinetic Blood Sampling',
            'pk_S5_Checked.required' => 'Please enter the person checked for S5 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S6.required' => 'Please enter the S6 date for Pharmacokinetic Blood Sampling',
            'pk_S6_SST.required' => 'Please enter the S6 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S6_AST.required' => 'Please enter the S6 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S6_Collected.required' => 'Please enter the person collected for S6 Pharmacokinetic Blood Sampling',
            'pk_S6_Checked.required' => 'Please enter the person checked for S6 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S7.required' => 'Please enter the S7 date for Pharmacokinetic Blood Sampling',
            'pk_S7_SST.required' => 'Please enter the S7 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S7_AST.required' => 'Please enter the S7 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S7_Collected.required' => 'Please enter the person collected for S7 Pharmacokinetic Blood Sampling',
            'pk_S7_Checked.required' => 'Please enter the person checked for S7 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S8.required' => 'Please enter the S8 date for Pharmacokinetic Blood Sampling',
            'pk_S8_SST.required' => 'Please enter the S8 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S8_AST.required' => 'Please enter the S8 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S8_Collected.required' => 'Please enter the person collected for S8 Pharmacokinetic Blood Sampling',
            'pk_S8_Checked.required' => 'Please enter the person checked for S8 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S9.required' => 'Please enter the S9 date for Pharmacokinetic Blood Sampling',
            'pk_S9_SST.required' => 'Please enter the S9 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S9_AST.required' => 'Please enter the S9 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S9_Collected.required' => 'Please enter the person collected for S9 Pharmacokinetic Blood Sampling',
            'pk_S9_Checked.required' => 'Please enter the person checked for S9 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S10.required' => 'Please enter the S10 date for Pharmacokinetic Blood Sampling',
            'pk_S10_SST.required' => 'Please enter the S10 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S10_AST.required' => 'Please enter the S10 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S10_Collected.required' => 'Please enter the person collected for S10 Pharmacokinetic Blood Sampling',
            'pk_S10_Checked.required' => 'Please enter the person checked for S10 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S11.required' => 'Please enter the S11 date for Pharmacokinetic Blood Sampling',
            'pk_S11_SST.required' => 'Please enter the S11 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S11_AST.required' => 'Please enter the S11 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S11_Collected.required' => 'Please enter the person collected for S11 Pharmacokinetic Blood Sampling',
            'pk_S11_Checked.required' => 'Please enter the person checked for S11 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S12.required' => 'Please enter the S12 date for Pharmacokinetic Blood Sampling',
            'pk_S12_SST.required' => 'Please enter the S12 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S12_AST.required' => 'Please enter the S12 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S12_Collected.required' => 'Please enter the person collected for S12 Pharmacokinetic Blood Sampling',
            'pk_S12_Checked.required' => 'Please enter the person checked for S12 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S13.required' => 'Please enter the S13 date for Pharmacokinetic Blood Sampling',
            'pk_S13_SST.required' => 'Please enter the S13 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S13_AST.required' => 'Please enter the S13 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S13_Collected.required' => 'Please enter the person collected for S13 Pharmacokinetic Blood Sampling',
            'pk_S13_Checked.required' => 'Please enter the person checked for S13 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S14.required' => 'Please enter the S14 date for Pharmacokinetic Blood Sampling',
            'pk_S14_SST.required' => 'Please enter the S14 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S14_AST.required' => 'Please enter the S14 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S14_Collected.required' => 'Please enter the person collected for S14 Pharmacokinetic Blood Sampling',
            'pk_S14_Checked.required' => 'Please enter the person checked for S14 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S15.required' => 'Please enter the S15 date for Pharmacokinetic Blood Sampling',
            'pk_S15_SST.required' => 'Please enter the S15 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S15_AST.required' => 'Please enter the S15 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S15_Collected.required' => 'Please enter the person collected for S15 Pharmacokinetic Blood Sampling',
            'pk_S15_Checked.required' => 'Please enter the person checked for S15 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S16.required' => 'Please enter the S16 date for Pharmacokinetic Blood Sampling',
            'pk_S16_SST.required' => 'Please enter the S16 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S16_AST.required' => 'Please enter the S16 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S16_Collected.required' => 'Please enter the person collected for S16 Pharmacokinetic Blood Sampling',
            'pk_S16_Checked.required' => 'Please enter the person checked for S16 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S17.required' => 'Please enter the S17 date for Pharmacokinetic Blood Sampling',
            'pk_S17_SST.required' => 'Please enter the S17 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S17_AST.required' => 'Please enter the S17 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S17_Collected.required' => 'Please enter the person collected for S17 Pharmacokinetic Blood Sampling',
            'pk_S17_Checked.required' => 'Please enter the person checked for S17 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S18.required' => 'Please enter the S18 date for Pharmacokinetic Blood Sampling',
            'pk_S18_SST.required' => 'Please enter the S18 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S18_AST.required' => 'Please enter the S18 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S18_Collected.required' => 'Please enter the person collected for S18 Pharmacokinetic Blood Sampling',
            'pk_S18_Checked.required' => 'Please enter the person checked for S18 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S19.required' => 'Please enter the S19 date for Pharmacokinetic Blood Sampling',
            'pk_S19_SST.required' => 'Please enter the S19 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S19_AST.required' => 'Please enter the S19 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S19_Collected.required' => 'Please enter the person collected for S19 Pharmacokinetic Blood Sampling',
            'pk_S19_Checked.required' => 'Please enter the person checked for S19 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S20.required' => 'Please enter the S20 date for Pharmacokinetic Blood Sampling',
            'pk_S20_SST.required' => 'Please enter the S20 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S20_AST.required' => 'Please enter the S20 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S20_Collected.required' => 'Please enter the person collected for S20 Pharmacokinetic Blood Sampling',
            'pk_S20_Checked.required' => 'Please enter the person checked for S20 Pharmacokinetic Blood Sampling',

            'pk_Date_Day_S21.required' => 'Please enter the S21 date for Pharmacokinetic Blood Sampling',
            'pk_S21_SST.required' => 'Please enter the S21 Scheduled Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S21_AST.required' => 'Please enter the S21 Actual Sampling Time for Pharmacokinetic Blood Sampling',
            'pk_S21_Collected.required' => 'Please enter the person collected for S21 Pharmacokinetic Blood Sampling',
            'pk_S21_Checked.required' => 'Please enter the person checked for S21 Pharmacokinetic Blood Sampling',
           ];
           //validation for required fields
           $validatedData=$this->validate($request,[
            'Day1' => 'required',
            'Day3' => 'required',

            'LastFoodDate' => 'required',
            'LastWaterDate' => 'required',
            'StudyDrugDate' => 'required',
            'LastFoodTime' => 'required',
            'LastWaterTime' => 'required',
            'StudyDrugTime' => 'required',

            'pk_Date_Day_PD' => 'required',
            'pk_PD_AST' => 'required',
            'pk_PD_Collected' => 'required',
            'pk_PD_Checked' => 'required',
            
            'pk_Date_Day_S1' => 'required',
            'pk_S1_SST' => 'required',
            'pk_S1_AST' => 'required',
            'pk_S1_Collected' => 'required',
            'pk_S1_Checked' => 'required',

            'pk_Date_Day_S2' => 'required',
            'pk_S2_SST' => 'required',
            'pk_S2_AST' => 'required',
            'pk_S2_Collected' => 'required',
            'pk_S2_Checked' => 'required',

            'pk_Date_Day_S3' => 'required',
            'pk_S3_SST' => 'required',
            'pk_S3_AST' => 'required',
            'pk_S3_Collected' => 'required',
            'pk_S3_Checked' => 'required',

            'pk_Date_Day_S4' => 'required',
            'pk_S4_SST' => 'required',
            'pk_S4_AST' => 'required',
            'pk_S4_Collected' => 'required',
            'pk_S4_Checked' => 'required',

            'pk_Date_Day_S5' => 'required',
            'pk_S5_SST' => 'required',
            'pk_S5_AST' => 'required',
            'pk_S5_Collected' => 'required',
            'pk_S5_Checked' => 'required',

            'pk_Date_Day_S6' => 'required',
            'pk_S6_SST' => 'required',
            'pk_S6_AST' => 'required',
            'pk_S6_Collected' => 'required',
            'pk_S6_Checked' => 'required',

            'pk_Date_Day_S7' => 'required',
            'pk_S7_SST' => 'required',
            'pk_S7_AST' => 'required',
            'pk_S7_Collected' => 'required',
            'pk_S7_Checked' => 'required',

            'pk_Date_Day_S8' => 'required',
            'pk_S8_SST' => 'required',
            'pk_S8_AST' => 'required',
            'pk_S8_Collected' => 'required',
            'pk_S8_Checked' => 'required',

            'pk_Date_Day_S9' => 'required',
            'pk_S9_SST' => 'required',
            'pk_S9_AST' => 'required',
            'pk_S9_Collected' => 'required',
            'pk_S9_Checked' => 'required',

            'pk_Date_Day_S10' => 'required',
            'pk_S10_SST' => 'required',
            'pk_S10_AST' => 'required',
            'pk_S10_Collected' => 'required',
            'pk_S10_Checked' => 'required',

            'pk_Date_Day_S11' => 'required',
            'pk_S11_SST' => 'required',
            'pk_S11_AST' => 'required',
            'pk_S11_Collected' => 'required',
            'pk_S11_Checked' => 'required',

            'pk_Date_Day_S12' => 'required',
            'pk_S12_SST' => 'required',
            'pk_S12_AST' => 'required',
            'pk_S12_Collected' => 'required',
            'pk_S12_Checked' => 'required',

            'pk_Date_Day_S13' => 'required',
            'pk_S13_SST' => 'required',
            'pk_S13_AST' => 'required',
            'pk_S13_Collected' => 'required',
            'pk_S13_Checked' => 'required',

            'pk_Date_Day_S14' => 'required',
            'pk_S14_SST' => 'required',
            'pk_S14_AST' => 'required',
            'pk_S14_Collected' => 'required',
            'pk_S14_Checked' => 'required',

            'pk_Date_Day_S15' => 'required',
            'pk_S15_SST' => 'required',
            'pk_S15_AST' => 'required',
            'pk_S15_Collected' => 'required',
            'pk_S15_Checked' => 'required',

            'pk_Date_Day_S16' => 'required',
            'pk_S16_SST' => 'required',
            'pk_S16_AST' => 'required',
            'pk_S16_Collected' => 'required',
            'pk_S16_Checked' => 'required',

            'pk_Date_Day_S17' => 'required',
            'pk_S17_SST' => 'required',
            'pk_S17_AST' => 'required',
            'pk_S17_Collected' => 'required',
            'pk_S17_Checked' => 'required',

            'pk_Date_Day_S18' => 'required',
            'pk_S18_SST' => 'required',
            'pk_S18_AST' => 'required',
            'pk_S18_Collected' => 'required',
            'pk_S18_Checked' => 'required',

            'pk_Date_Day_S19' => 'required',
            'pk_S19_SST' => 'required',
            'pk_S19_AST' => 'required',
            'pk_S19_Collected' => 'required',
            'pk_S19_Checked' => 'required',

            'pk_Date_Day_S20' => 'required',
            'pk_S20_SST' => 'required',
            'pk_S20_AST' => 'required',
            'pk_S20_Collected' => 'required',
            'pk_S20_Checked' => 'required',

            'pk_Date_Day_S21' => 'required',
            'pk_S21_SST' => 'required',
            'pk_S21_AST' => 'required',
            'pk_S21_Collected' => 'required',
            'pk_S21_Checked' => 'required',
        ],$custom);
            
            //day 1 to day 3 date
            $findSP1_PKineticSampling->Day1=$request->Day1;
            $findSP1_PKineticSampling->Day3=$request->Day3;

            //last food intake, last water intake, study drug dosing
            $findSP1_PKineticSampling->LastFoodDate=$request->LastFoodDate;
            $findSP1_PKineticSampling->LastWaterDate=$request->LastWaterDate;
            $findSP1_PKineticSampling->StudyDrugDate=$request->StudyDrugDate;
            $findSP1_PKineticSampling->LastFoodTime=$request->LastFoodTime;
            $findSP1_PKineticSampling->LastWaterTime=$request->LastWaterTime;
            $findSP1_PKineticSampling->StudyDrugTime=$request->StudyDrugTime;

            //Pharmacokinetic Blood Sampling Sample Code PD
            //Actual Day 1 of Sample Code
            //PD
            $findSP1_PKineticSampling->pk_Date_Day_PD=$request->pk_Date_Day_PD;
            //No SST for Sample Code PD
            $findSP1_PKineticSampling->pk_PD_AST=$request->pk_PD_AST;
            $findSP1_PKineticSampling->pk_PD_Collected=$request->pk_PD_Collected;
            $findSP1_PKineticSampling->pk_PD_Checked=$request->pk_PD_Checked;
            $findSP1_PKineticSampling->pk_PD_Comments=$request->pk_PD_Comments;
            //S1
            $findSP1_PKineticSampling->pk_Date_Day_S1=$request->pk_Date_Day_S1;
            $findSP1_PKineticSampling->pk_S1_SST=$request->pk_S1_SST;
            $findSP1_PKineticSampling->pk_S1_AST=$request->pk_S1_AST;
            $findSP1_PKineticSampling->pk_S1_Collected=$request->pk_S1_Collected;
            $findSP1_PKineticSampling->pk_S1_Checked=$request->pk_S1_Checked;
            $findSP1_PKineticSampling->pk_S1_Comments=$request->pk_S1_Comments;
            //S2
            $findSP1_PKineticSampling->pk_Date_Day_S2=$request->pk_Date_Day_S2;
            $findSP1_PKineticSampling->pk_S2_SST=$request->pk_S2_SST;
            $findSP1_PKineticSampling->pk_S2_AST=$request->pk_S2_AST;
            $findSP1_PKineticSampling->pk_S2_Collected=$request->pk_S2_Collected;
            $findSP1_PKineticSampling->pk_S2_Checked=$request->pk_S2_Checked;
            $findSP1_PKineticSampling->pk_S2_Comments=$request->pk_S2_Comments;
            //S3
            $findSP1_PKineticSampling->pk_Date_Day_S3=$request->pk_Date_Day_S3;
            $findSP1_PKineticSampling->pk_S3_SST=$request->pk_S3_SST;
            $findSP1_PKineticSampling->pk_S3_AST=$request->pk_S3_AST;
            $findSP1_PKineticSampling->pk_S3_Collected=$request->pk_S3_Collected;
            $findSP1_PKineticSampling->pk_S3_Checked=$request->pk_S3_Checked;
            $findSP1_PKineticSampling->pk_S3_Comments=$request->pk_S3_Comments;
            //S4
            $findSP1_PKineticSampling->pk_Date_Day_S4=$request->pk_Date_Day_S4;
            $findSP1_PKineticSampling->pk_S4_SST=$request->pk_S4_SST;
            $findSP1_PKineticSampling->pk_S4_AST=$request->pk_S4_AST;
            $findSP1_PKineticSampling->pk_S4_Collected=$request->pk_S4_Collected;
            $findSP1_PKineticSampling->pk_S4_Checked=$request->pk_S4_Checked;
            $findSP1_PKineticSampling->pk_S4_Comments=$request->pk_S4_Comments;
            //S5
            $findSP1_PKineticSampling->pk_Date_Day_S5=$request->pk_Date_Day_S5;
            $findSP1_PKineticSampling->pk_S5_SST=$request->pk_S5_SST;
            $findSP1_PKineticSampling->pk_S5_AST=$request->pk_S5_AST;
            $findSP1_PKineticSampling->pk_S5_Collected=$request->pk_S5_Collected;
            $findSP1_PKineticSampling->pk_S5_Checked=$request->pk_S5_Checked;
            $findSP1_PKineticSampling->pk_S5_Comments=$request->pk_S5_Comments;
            //S6
            $findSP1_PKineticSampling->pk_Date_Day_S6=$request->pk_Date_Day_S6;
            $findSP1_PKineticSampling->pk_S6_SST=$request->pk_S6_SST;
            $findSP1_PKineticSampling->pk_S6_AST=$request->pk_S6_AST;
            $findSP1_PKineticSampling->pk_S6_Collected=$request->pk_S6_Collected;
            $findSP1_PKineticSampling->pk_S6_Checked=$request->pk_S6_Checked;
            $findSP1_PKineticSampling->pk_S6_Comments=$request->pk_S6_Comments;
            //S7
            $findSP1_PKineticSampling->pk_Date_Day_S7=$request->pk_Date_Day_S7;
            $findSP1_PKineticSampling->pk_S7_SST=$request->pk_S7_SST;
            $findSP1_PKineticSampling->pk_S7_AST=$request->pk_S7_AST;
            $findSP1_PKineticSampling->pk_S7_Collected=$request->pk_S7_Collected;
            $findSP1_PKineticSampling->pk_S7_Checked=$request->pk_S7_Checked;
            $findSP1_PKineticSampling->pk_S7_Comments=$request->pk_S7_Comments;
            //S8
            $findSP1_PKineticSampling->pk_Date_Day_S8=$request->pk_Date_Day_S8;
            $findSP1_PKineticSampling->pk_S8_SST=$request->pk_S8_SST;
            $findSP1_PKineticSampling->pk_S8_AST=$request->pk_S8_AST;
            $findSP1_PKineticSampling->pk_S8_Collected=$request->pk_S8_Collected;
            $findSP1_PKineticSampling->pk_S8_Checked=$request->pk_S8_Checked;
            $findSP1_PKineticSampling->pk_S8_Comments=$request->pk_S8_Comments;
            //S9
            $findSP1_PKineticSampling->pk_Date_Day_S9=$request->pk_Date_Day_S9;
            $findSP1_PKineticSampling->pk_S9_SST=$request->pk_S9_SST;
            $findSP1_PKineticSampling->pk_S9_AST=$request->pk_S9_AST;
            $findSP1_PKineticSampling->pk_S9_Collected=$request->pk_S9_Collected;
            $findSP1_PKineticSampling->pk_S9_Checked=$request->pk_S9_Checked;
            $findSP1_PKineticSampling->pk_S9_Comments=$request->pk_S9_Comments;
            //S10
            $findSP1_PKineticSampling->pk_Date_Day_S10=$request->pk_Date_Day_S10;
            $findSP1_PKineticSampling->pk_S10_SST=$request->pk_S10_SST;
            $findSP1_PKineticSampling->pk_S10_AST=$request->pk_S10_AST;
            $findSP1_PKineticSampling->pk_S10_Collected=$request->pk_S10_Collected;
            $findSP1_PKineticSampling->pk_S10_Checked=$request->pk_S10_Checked;
            $findSP1_PKineticSampling->pk_S10_Comments=$request->pk_S10_Comments;
            //S11
            $findSP1_PKineticSampling->pk_Date_Day_S11=$request->pk_Date_Day_S11;
            $findSP1_PKineticSampling->pk_S11_SST=$request->pk_S11_SST;
            $findSP1_PKineticSampling->pk_S11_AST=$request->pk_S11_AST;
            $findSP1_PKineticSampling->pk_S11_Collected=$request->pk_S11_Collected;
            $findSP1_PKineticSampling->pk_S11_Checked=$request->pk_S11_Checked;
            $findSP1_PKineticSampling->pk_S11_Comments=$request->pk_S11_Comments;
            //S12
            $findSP1_PKineticSampling->pk_Date_Day_S12=$request->pk_Date_Day_S12;
            $findSP1_PKineticSampling->pk_S12_SST=$request->pk_S12_SST;
            $findSP1_PKineticSampling->pk_S12_AST=$request->pk_S12_AST;
            $findSP1_PKineticSampling->pk_S12_Collected=$request->pk_S12_Collected;
            $findSP1_PKineticSampling->pk_S12_Checked=$request->pk_S12_Checked;
            $findSP1_PKineticSampling->pk_S12_Comments=$request->pk_S12_Comments;
            //S13
            $findSP1_PKineticSampling->pk_Date_Day_S13=$request->pk_Date_Day_S13;
            $findSP1_PKineticSampling->pk_S13_SST=$request->pk_S13_SST;
            $findSP1_PKineticSampling->pk_S13_AST=$request->pk_S13_AST;
            $findSP1_PKineticSampling->pk_S13_Collected=$request->pk_S13_Collected;
            $findSP1_PKineticSampling->pk_S13_Checked=$request->pk_S13_Checked;
            $findSP1_PKineticSampling->pk_S13_Comments=$request->pk_S13_Comments;
            //S14
            $findSP1_PKineticSampling->pk_Date_Day_S14=$request->pk_Date_Day_S14;
            $findSP1_PKineticSampling->pk_S14_SST=$request->pk_S14_SST;
            $findSP1_PKineticSampling->pk_S14_AST=$request->pk_S14_AST;
            $findSP1_PKineticSampling->pk_S14_Collected=$request->pk_S14_Collected;
            $findSP1_PKineticSampling->pk_S14_Checked=$request->pk_S14_Checked;
            $findSP1_PKineticSampling->pk_S14_Comments=$request->pk_S14_Comments;
            //S15
            $findSP1_PKineticSampling->pk_Date_Day_S15=$request->pk_Date_Day_S15;
            $findSP1_PKineticSampling->pk_S15_SST=$request->pk_S15_SST;
            $findSP1_PKineticSampling->pk_S15_AST=$request->pk_S15_AST;
            $findSP1_PKineticSampling->pk_S15_Collected=$request->pk_S15_Collected;
            $findSP1_PKineticSampling->pk_S15_Checked=$request->pk_S15_Checked;
            $findSP1_PKineticSampling->pk_S15_Comments=$request->pk_S15_Comments;
            //S16
            $findSP1_PKineticSampling->pk_Date_Day_S16=$request->pk_Date_Day_S16;
            $findSP1_PKineticSampling->pk_S16_SST=$request->pk_S16_SST;
            $findSP1_PKineticSampling->pk_S16_AST=$request->pk_S16_AST;
            $findSP1_PKineticSampling->pk_S16_Collected=$request->pk_S16_Collected;
            $findSP1_PKineticSampling->pk_S16_Checked=$request->pk_S16_Checked;
            $findSP1_PKineticSampling->pk_S16_Comments=$request->pk_S16_Comments;
            //S17
            $findSP1_PKineticSampling->pk_Date_Day_S17=$request->pk_Date_Day_S17;
            $findSP1_PKineticSampling->pk_S17_SST=$request->pk_S17_SST;
            $findSP1_PKineticSampling->pk_S17_AST=$request->pk_S17_AST;
            $findSP1_PKineticSampling->pk_S17_Collected=$request->pk_S17_Collected;
            $findSP1_PKineticSampling->pk_S17_Checked=$request->pk_S17_Checked;
            $findSP1_PKineticSampling->pk_S17_Comments=$request->pk_S17_Comments;
            //S18
            $findSP1_PKineticSampling->pk_Date_Day_S18=$request->pk_Date_Day_S18;
            $findSP1_PKineticSampling->pk_S18_SST=$request->pk_S18_SST;
            $findSP1_PKineticSampling->pk_S18_AST=$request->pk_S18_AST;
            $findSP1_PKineticSampling->pk_S18_Collected=$request->pk_S18_Collected;
            $findSP1_PKineticSampling->pk_S18_Checked=$request->pk_S18_Checked;
            $findSP1_PKineticSampling->pk_S18_Comments=$request->pk_S18_Comments;
            //Actual Day 2 of Sample Code
            //S19
            $findSP1_PKineticSampling->pk_Date_Day_S19=$request->pk_Date_Day_S19;
            $findSP1_PKineticSampling->pk_S19_SST=$request->pk_S19_SST;
            $findSP1_PKineticSampling->pk_S19_AST=$request->pk_S19_AST;
            $findSP1_PKineticSampling->pk_S19_Collected=$request->pk_S19_Collected;
            $findSP1_PKineticSampling->pk_S19_Checked=$request->pk_S19_Checked;
            $findSP1_PKineticSampling->pk_S19_Comments=$request->pk_S19_Comments;
            //S20
            $findSP1_PKineticSampling->pk_Date_Day_S20=$request->pk_Date_Day_S20;
            $findSP1_PKineticSampling->pk_S20_SST=$request->pk_S20_SST;
            $findSP1_PKineticSampling->pk_S20_AST=$request->pk_S20_AST;
            $findSP1_PKineticSampling->pk_S20_Collected=$request->pk_S20_Collected;
            $findSP1_PKineticSampling->pk_S20_Checked=$request->pk_S20_Checked;
            $findSP1_PKineticSampling->pk_S20_Comments=$request->pk_S20_Comments;
            //Actual Day 3 of Sample Code
            //S21
            $findSP1_PKineticSampling->pk_Date_Day_S21=$request->pk_Date_Day_S21;
            $findSP1_PKineticSampling->pk_S21_SST=$request->pk_S21_SST;
            $findSP1_PKineticSampling->pk_S21_AST=$request->pk_S21_AST;
            $findSP1_PKineticSampling->pk_S21_Collected=$request->pk_S21_Collected;
            $findSP1_PKineticSampling->pk_S21_Checked=$request->pk_S21_Checked;
            $findSP1_PKineticSampling->pk_S21_Comments=$request->pk_S21_Comments;

            $findSP1_PKineticSampling->save();
            return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Pharmacokinetic Blood Sampling!');
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
            $PKineticS = SP1_PKineticSampling::where('SP1_PKineticSampling_ID', $findSP1->SP1_PKineticSampling)->first();
        }
        $data = $request->except('_token','_method');
        foreach($data as $key=>$value)
        {
            if($value != NULL)
            {
                $PKineticS[$key]=$value;
                $flag=true;
            }
        }
        if($flag)
        {
            $PKineticS->save();
            return redirect(route('studySpecific.admin'))->with('success','You updated the subject study period details for Pharmacodynamic Blood Sampling!');
        }    }
}
