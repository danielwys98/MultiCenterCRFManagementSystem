<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_PDynamicSampling;
use Illuminate\Http\Request;
use App\SP1_BMVS;
use App\StudyPeriod1;

class SP1_PDynamicSampling_Controller extends Controller
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
            {
                //find SP1_ID to access the SP1_PDynamicSampling
                //find table and update it
                $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
                $findSP1_PDS = SP1_PDynamicSampling::where('SP1_PDynamicSampling_ID',$findSP1->SP1_PDynamicSampling)->first();
                //custom messages load for validation
                $custom = [
                    'day1.required' => 'Please enter the day 1 of Pharmacodynamic Blood Sampling sampling date',
                    'day2.required' => 'Please enter the day 3 of Pharmacodynamic Blood Sampling sampling date',

                    'PD_Date_Day_1.required' => 'Please enter the PD date for Pharmacodynamic Blood Sampling',
                    'PD_AST.required' => 'Please enter the PD Actual Sampling Time for Pharmacodynamic Blood Sampling',
                    'PD_Collected.required' => 'Please enter the person collected for PD Pharmacodynamic Blood Sampling',
                    'PD_Checked.required' => 'Please enter the person checked for PD Pharmacodynamic Blood Sampling',

                    'S1_Date_Day_1.required' => 'Please enter the S1 date for Pharmacodynamic Blood Sampling',
                    'S1_SST.required' => 'Please enter the S1 Scheduled Sampling Time for Pharmacodynamic Blood Sampling',
                    'S1_AST.required' => 'Please enter the S1 Actual Sampling Time for Pharmacodynamic Blood Sampling',
                    'S1_Collected.required' => 'Please enter the person collected for S1 Pharmacodynamic Blood Sampling',
                    'S1_Checked.required' => 'Please enter the person checked for S1 Pharmacodynamic Blood Sampling',

                    'S2_Date_Day_1.required' => 'Please enter the S2 date for Pharmacodynamic Blood Sampling',
                    'S2_SST.required' => 'Please enter the S2 Scheduled Sampling Time for Pharmacodynamic Blood Sampling',
                    'S2_AST.required' => 'Please enter the S2 Actual Sampling Time for Pharmacodynamic Blood Sampling',
                    'S2_Collected.required' => 'Please enter the person collected for S2 Pharmacodynamic Blood Sampling',
                    'S2_Checked.required' => 'Please enter the person checked for S2 Pharmacodynamic Blood Sampling',

                    'S3_Date_Day_1.required' => 'Please enter the S3 date for Pharmacodynamic Blood Sampling',
                    'S3_SST.required' => 'Please enter the S3 Scheduled Sampling Time for Pharmacodynamic Blood Sampling',
                    'S3_AST.required' => 'Please enter the S3 Actual Sampling Time for Pharmacodynamic Blood Sampling',
                    'S3_Collected.required' => 'Please enter the person collected for S3 Pharmacodynamic Blood Sampling',
                    'S3_Checked.required' => 'Please enter the person checked for S3 Pharmacodynamic Blood Sampling',

                    'S4_Date_Day_1.required' => 'Please enter the S4 date for Pharmacodynamic Blood Sampling',
                    'S4_SST.required' => 'Please enter the S4 Scheduled Sampling Time for Pharmacodynamic Blood Sampling',
                    'S4_AST.required' => 'Please enter the S4 Actual Sampling Time for Pharmacodynamic Blood Sampling',
                    'S4_Collected.required' => 'Please enter the person collected for S4 Pharmacodynamic Blood Sampling',
                    'S4_Checked.required' => 'Please enter the person checked for S4 Pharmacodynamic Blood Sampling',

                    'S5_Date_Day_1.required' => 'Please enter the S5 date for Pharmacodynamic Blood Sampling',
                    'S5_SST.required' => 'Please enter the S5 Scheduled Sampling Time for Pharmacodynamic Blood Sampling',
                    'S5_AST.required' => 'Please enter the S5 Actual Sampling Time for Pharmacodynamic Blood Sampling',
                    'S5_Collected.required' => 'Please enter the person collected for S5 Pharmacodynamic Blood Sampling',
                    'S5_Checked.required' => 'Please enter the person checked for S5 Pharmacodynamic Blood Sampling',

                    'S6_Date_Day_1.required' => 'Please enter the S6 date for Pharmacodynamic Blood Sampling',
                    'S6_SST.required' => 'Please enter the S6 Scheduled Sampling Time for Pharmacodynamic Blood Sampling',
                    'S6_AST.required' => 'Please enter the S6 Actual Sampling Time for Pharmacodynamic Blood Sampling',
                    'S6_Collected.required' => 'Please enter the person collected for S6 Pharmacodynamic Blood Sampling',
                    'S6_Checked.required' => 'Please enter the person checked for S6 Pharmacodynamic Blood Sampling',

                    'S7_Date_Day_1.required' => 'Please enter the S7 date for Pharmacodynamic Blood Sampling',
                    'S7_SST.required' => 'Please enter the S7 Scheduled Sampling Time for Pharmacodynamic Blood Sampling',
                    'S7_AST.required' => 'Please enter the S7 Actual Sampling Time for Pharmacodynamic Blood Sampling',
                    'S7_Collected.required' => 'Please enter the person collected for S7 Pharmacodynamic Blood Sampling',
                    'S7_Checked.required' => 'Please enter the person checked for S7 Pharmacodynamic Blood Sampling',

                    'S8_Date_Day_1.required' => 'Please enter the S8 date for Pharmacodynamic Blood Sampling',
                    'S8_SST.required' => 'Please enter the S8 Scheduled Sampling Time for Pharmacodynamic Blood Sampling',
                    'S8_AST.required' => 'Please enter the S8 Actual Sampling Time for Pharmacodynamic Blood Sampling',
                    'S8_Collected.required' => 'Please enter the person collected for S8 Pharmacodynamic Blood Sampling',
                    'S8_Checked.required' => 'Please enter the person checked for S8 Pharmacodynamic Blood Sampling',

                    'S9_Date_Day_1.required' => 'Please enter the S9 date for Pharmacodynamic Blood Sampling',
                    'S9_SST.required' => 'Please enter the S9 Scheduled Sampling Time for Pharmacodynamic Blood Sampling',
                    'S9_AST.required' => 'Please enter the S9 Actual Sampling Time for Pharmacodynamic Blood Sampling',
                    'S9_Collected.required' => 'Please enter the person collected for S9 Pharmacodynamic Blood Sampling',
                    'S9_Checked.required' => 'Please enter the person checked for S9 Pharmacodynamic Blood Sampling',
                ];
                //validation for required fields
                $validatedData=$this->validate($request,[
                    'day1' => 'required',
                    'day2' => 'required',

                    'PD_Date_Day_1' => 'required',
                    'PD_AST' => 'required',
                    'PD_Collected' => 'required',
                    'PD_Checked' => 'required',
                    
                    'S1_Date_Day_1' => 'required',
                    'S1_SST' => 'required',
                    'S1_AST' => 'required',
                    'S1_Collected' => 'required',
                    'S1_Checked' => 'required',

                    'S2_Date_Day_1' => 'required',
                    'S2_SST' => 'required',
                    'S2_AST' => 'required',
                    'S2_Collected' => 'required',
                    'S2_Checked' => 'required',

                    'S3_Date_Day_1' => 'required',
                    'S3_SST' => 'required',
                    'S3_AST' => 'required',
                    'S3_Collected' => 'required',
                    'S3_Checked' => 'required',

                    'S4_Date_Day_1' => 'required',
                    'S4_SST' => 'required',
                    'S4_AST' => 'required',
                    'S4_Collected' => 'required',
                    'S4_Checked' => 'required',

                    'S5_Date_Day_1' => 'required',
                    'S5_SST' => 'required',
                    'S5_AST' => 'required',
                    'S5_Collected' => 'required',
                    'S5_Checked' => 'required',

                    'S6_Date_Day_1' => 'required',
                    'S6_SST' => 'required',
                    'S6_AST' => 'required',
                    'S6_Collected' => 'required',
                    'S6_Checked' => 'required',

                    'S7_Date_Day_1' => 'required',
                    'S7_SST' => 'required',
                    'S7_AST' => 'required',
                    'S7_Collected' => 'required',
                    'S7_Checked' => 'required',

                    'S8_Date_Day_1' => 'required',
                    'S8_SST' => 'required',
                    'S8_AST' => 'required',
                    'S8_Collected' => 'required',
                    'S8_Checked' => 'required',

                    'S9_Date_Day_1' => 'required',
                    'S9_SST' => 'required',
                    'S9_AST' => 'required',
                    'S9_Collected' => 'required',
                    'S9_Checked' => 'required',
                ],$custom);

                if(!empty($findSP1_PDS)) {
                    //day 1 to day 3 date
                    $findSP1_PDS->Day1 = $request->day1;
                    $findSP1_PDS->Day2 = $request->day2;
                    //Actual Day 1 of Sample Code
                    //PD
                    $findSP1_PDS->PD_Date_Day_1 = $request->PD_Date_Day_1;
                    //No SST for Sample Code PD
                    $findSP1_PDS->PD_AST = $request->PD_AST;
                    $findSP1_PDS->PD_Collected = $request->PD_Collected;
                    $findSP1_PDS->PD_Checked = $request->PD_Checked;
                    $findSP1_PDS->PD_Comments = $request->PD_Comments;
                    //S1
                    $findSP1_PDS->S1_Date_Day_1 = $request->S1_Date_Day_1;
                    $findSP1_PDS->S1_SST = $request->S1_SST;
                    $findSP1_PDS->S1_AST = $request->S1_AST;
                    $findSP1_PDS->S1_Collected = $request->S1_Collected;
                    $findSP1_PDS->S1_Checked = $request->S1_Checked;
                    $findSP1_PDS->S1_Comments = $request->S1_Comments;
                    //S2
                    $findSP1_PDS->S2_Date_Day_1 = $request->S2_Date_Day_1;
                    $findSP1_PDS->S2_SST = $request->S2_SST;
                    $findSP1_PDS->S2_AST = $request->S2_AST;
                    $findSP1_PDS->S2_Collected = $request->S2_Collected;
                    $findSP1_PDS->S2_Checked = $request->S2_Checked;
                    $findSP1_PDS->S2_Comments = $request->S2_Comments;
                    //S3
                    $findSP1_PDS->S3_Date_Day_1 = $request->S3_Date_Day_1;
                    $findSP1_PDS->S3_SST = $request->S3_SST;
                    $findSP1_PDS->S3_AST = $request->S3_AST;
                    $findSP1_PDS->S3_Collected = $request->S3_Collected;
                    $findSP1_PDS->S3_Checked = $request->S3_Checked;
                    $findSP1_PDS->S3_Comments = $request->S3_Comments;
                    //S4
                    $findSP1_PDS->S4_Date_Day_1 = $request->S4_Date_Day_1;
                    $findSP1_PDS->S4_SST = $request->S4_SST;
                    $findSP1_PDS->S4_AST = $request->S4_AST;
                    $findSP1_PDS->S4_Collected = $request->S4_Collected;
                    $findSP1_PDS->S4_Checked = $request->S4_Checked;
                    $findSP1_PDS->S4_Comments = $request->S4_Comments;
                    //S5
                    $findSP1_PDS->S5_Date_Day_1 = $request->S5_Date_Day_1;
                    $findSP1_PDS->S5_SST = $request->S5_SST;
                    $findSP1_PDS->S5_AST = $request->S5_AST;
                    $findSP1_PDS->S5_Collected = $request->S5_Collected;
                    $findSP1_PDS->S5_Checked = $request->S5_Checked;
                    $findSP1_PDS->S5_Comments = $request->S5_Comments;
                    //S6
                    $findSP1_PDS->S6_Date_Day_1 = $request->S6_Date_Day_1;
                    $findSP1_PDS->S6_SST = $request->S6_SST;
                    $findSP1_PDS->S6_AST = $request->S6_AST;
                    $findSP1_PDS->S6_Collected = $request->S6_Collected;
                    $findSP1_PDS->S6_Checked = $request->S6_Checked;
                    $findSP1_PDS->S6_Comments = $request->S6_Comments;
                    //S7
                    $findSP1_PDS->S7_Date_Day_1 = $request->S7_Date_Day_1;
                    $findSP1_PDS->S7_SST = $request->S7_SST;
                    $findSP1_PDS->S7_AST = $request->S7_AST;
                    $findSP1_PDS->S7_Collected = $request->S7_Collected;
                    $findSP1_PDS->S7_Checked = $request->S7_Checked;
                    $findSP1_PDS->S7_Comments = $request->S7_Comments;
                    //S8
                    $findSP1_PDS->S8_Date_Day_1 = $request->S8_Date_Day_1;
                    $findSP1_PDS->S8_SST = $request->S8_SST;
                    $findSP1_PDS->S8_AST = $request->S8_AST;
                    $findSP1_PDS->S8_Collected = $request->S8_Collected;
                    $findSP1_PDS->S8_Checked = $request->S8_Checked;
                    $findSP1_PDS->S8_Comments = $request->S8_Comments;
                    //Actual Day 2 of Sample Code
                    //S9
                    $findSP1_PDS->S9_Date_Day_1 = $request->S9_Date_Day_1;
                    $findSP1_PDS->S9_SST = $request->S9_SST;
                    $findSP1_PDS->S9_AST = $request->S9_AST;
                    $findSP1_PDS->S9_Collected = $request->S9_Collected;
                    $findSP1_PDS->S9_Checked = $request->S9_Checked;
                    $findSP1_PDS->S9_Comments = $request->S9_Comments;

                    $findSP1_PDS->save();

                    return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Body Measurement and Vital Signs!');
                }
                else
                {
                    alert()->error('Error!','Could not find the Pharmacodynamic Blood Sampling form ID for this subject!');
                    return back();
                }
            }
        }else{
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }

    }
}
