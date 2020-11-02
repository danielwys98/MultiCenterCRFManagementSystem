<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_PDynamicAnalysis;
use App\StudyPeriod1;
use Illuminate\Http\Request;

class SP1_PDynamicAnalysis_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $study_id)
    {
        $PID = $request->patient_id;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
                                        ->where('patient_id',$PID)
                                        ->where('study_id',$study_id)
                                        ->first();
        if ($findPSS != NULL) {
            //find SP1_ID to access the SP1_PDynamicAnalysis
            //find table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
            $findPS1_PDAnalysis=SP1_PDynamicAnalysis::where('SP1_PDynamicAnalysis_ID',$findSP1->SP1_PDynamicAnalysis)->first();
            //custom messages load for validation
            $custom = [
                'Day1.required' => 'Please enter the day 1 of Pharmacodynamic (PD) Analysis sampling date',
                'Day2.required' => 'Please enter the day 2 of Pharmacodynamic (PD) Analysis sampling date',

                'pda_Date_Day_PD.required' => 'Please enter the PD date for Pharmacodynamic (PD) Analysis',
                'pda_PD_Result.required' => 'Please enter the PD Actual Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_PD_Conducted.required' => 'Please enter the person collected for PD Pharmacodynamic (PD) Analysis',
                'pda_PD_Checked.required' => 'Please enter the person checked for PD Pharmacodynamic (PD) Analysis',

                'pda_Date_Day_S1.required' => 'Please enter the S1 date for Pharmacodynamic (PD) Analysis',
                'pda_S1_Time.required' => 'Please enter the S1 Scheduled Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S1_Result.required' => 'Please enter the S1 Actual Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S1_Conducted.required' => 'Please enter the person collected for S1 Pharmacodynamic (PD) Analysis',
                'pda_S1_Checked.required' => 'Please enter the person checked for S1 Pharmacodynamic (PD) Analysis',

                'pda_Date_Day_S2.required' => 'Please enter the S2 date for Pharmacodynamic (PD) Analysis',
                'pda_S2_Time.required' => 'Please enter the S2 Scheduled Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S2_Result.required' => 'Please enter the S2 Actual Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S2_Conducted.required' => 'Please enter the person collected for S2 Pharmacodynamic (PD) Analysis',
                'pda_S2_Checked.required' => 'Please enter the person checked for S2 Pharmacodynamic (PD) Analysis',

                'pda_Date_Day_S3.required' => 'Please enter the S3 date for Pharmacodynamic (PD) Analysis',
                'pda_S3_Time.required' => 'Please enter the S3 Scheduled Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S3_Result.required' => 'Please enter the S3 Actual Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S3_Conducted.required' => 'Please enter the person collected for S3 Pharmacodynamic (PD) Analysis',
                'pda_S3_Checked.required' => 'Please enter the person checked for S3 Pharmacodynamic (PD) Analysis',

                'pda_Date_Day_S4.required' => 'Please enter the S4 date for Pharmacodynamic (PD) Analysis',
                'pda_S4_Time.required' => 'Please enter the S4 Scheduled Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S4_Result.required' => 'Please enter the S4 Actual Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S4_Conducted.required' => 'Please enter the person collected for S4 Pharmacodynamic (PD) Analysis',
                'pda_S4_Checked.required' => 'Please enter the person checked for S4 Pharmacodynamic (PD) Analysis',

                'pda_Date_Day_S5.required' => 'Please enter the S5 date for Pharmacodynamic (PD) Analysis',
                'pda_S5_Time.required' => 'Please enter the S5 Scheduled Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S5_Result.required' => 'Please enter the S5 Actual Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S5_Conducted.required' => 'Please enter the person collected for S5 Pharmacodynamic (PD) Analysis',
                'pda_S5_Checked.required' => 'Please enter the person checked for S5 Pharmacodynamic (PD) Analysis',

                'pda_Date_Day_S6.required' => 'Please enter the S6 date for Pharmacodynamic (PD) Analysis',
                'pda_S6_Time.required' => 'Please enter the S6 Scheduled Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S6_Result.required' => 'Please enter the S6 Actual Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S6_Conducted.required' => 'Please enter the person collected for S6 Pharmacodynamic (PD) Analysis',
                'pda_S6_Checked.required' => 'Please enter the person checked for S6 Pharmacodynamic (PD) Analysis',

                'pda_Date_Day_S7.required' => 'Please enter the S7 date for Pharmacodynamic (PD) Analysis',
                'pda_S7_Time.required' => 'Please enter the S7 Scheduled Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S7_Result.required' => 'Please enter the S7 Actual Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S7_Conducted.required' => 'Please enter the person collected for S7 Pharmacodynamic (PD) Analysis',
                'pda_S7_Checked.required' => 'Please enter the person checked for S7 Pharmacodynamic (PD) Analysis',

                'pda_Date_Day_S8.required' => 'Please enter the S8 date for Pharmacodynamic (PD) Analysis',
                'pda_S8_Time.required' => 'Please enter the S8 Scheduled Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S8_Result.required' => 'Please enter the S8 Actual Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S8_Conducted.required' => 'Please enter the person collected for S8 Pharmacodynamic (PD) Analysis',
                'pda_S8_Checked.required' => 'Please enter the person checked for S8 Pharmacodynamic (PD) Analysis',

                'pda_Date_Day_S9.required' => 'Please enter the S9 date for Pharmacodynamic (PD) Analysis',
                'pda_S9_Time.required' => 'Please enter the S9 Scheduled Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S9_Result.required' => 'Please enter the S9 Actual Sampling Time for Pharmacodynamic (PD) Analysis',
                'pda_S9_Conducted.required' => 'Please enter the person collected for S9 Pharmacodynamic (PD) Analysis',
                'pda_S9_Checked.required' => 'Please enter the person checked for S9 Pharmacodynamic (PD) Analysis',
            ];
            //validation for required fields
            $validatedData=$this->validate($request,[
                'Day1' => 'required',
                'Day2' => 'required',

                'pda_Date_Day_PD' => 'required',
                'pda_PD_Result' => 'required',
                'pda_PD_Conducted' => 'required',
                'pda_PD_Checked' => 'required',

                'pda_Date_Day_S1' => 'required',
                'pda_S1_Time' => 'required',
                'pda_S1_Result' => 'required',
                'pda_S1_Conducted' => 'required',
                'pda_S1_Checked' => 'required',

                'pda_Date_Day_S2' => 'required',
                'pda_S2_Time' => 'required',
                'pda_S2_Result' => 'required',
                'pda_S2_Conducted' => 'required',
                'pda_S2_Checked' => 'required',

                'pda_Date_Day_S3' => 'required',
                'pda_S3_Time' => 'required',
                'pda_S3_Result' => 'required',
                'pda_S3_Conducted' => 'required',
                'pda_S3_Checked' => 'required',

                'pda_Date_Day_S4' => 'required',
                'pda_S4_Time' => 'required',
                'pda_S4_Result' => 'required',
                'pda_S4_Conducted' => 'required',
                'pda_S4_Checked' => 'required',

                'pda_Date_Day_S5' => 'required',
                'pda_S5_Time' => 'required',
                'pda_S5_Result' => 'required',
                'pda_S5_Conducted' => 'required',
                'pda_S5_Checked' => 'required',

                'pda_Date_Day_S6' => 'required',
                'pda_S6_Time' => 'required',
                'pda_S6_Result' => 'required',
                'pda_S6_Conducted' => 'required',
                'pda_S6_Checked' => 'required',

                'pda_Date_Day_S7' => 'required',
                'pda_S7_Time' => 'required',
                'pda_S7_Result' => 'required',
                'pda_S7_Conducted' => 'required',
                'pda_S7_Checked' => 'required',

                'pda_Date_Day_S8' => 'required',
                'pda_S8_Time' => 'required',
                'pda_S8_Result' => 'required',
                'pda_S8_Conducted' => 'required',
                'pda_S8_Checked' => 'required',

                'pda_Date_Day_S9' => 'required',
                'pda_S9_Time' => 'required',
                'pda_S9_Result' => 'required',
                'pda_S9_Conducted' => 'required',
                'pda_S9_Checked' => 'required',
            ],$custom);

            //day 1 to day 3 date
            $findPS1_PDAnalysis->Day1=$request->Day1;
            $findPS1_PDAnalysis->Day2=$request->Day2;
            //Actual Day 1 of Sample Code
            //PD
            $findPS1_PDAnalysis->pda_Date_Day_PD=$request->pda_Date_Day_PD;
            //No time for Sample Code PD
            $findPS1_PDAnalysis->pda_PD_Result=$request->pda_PD_Result;
            $findPS1_PDAnalysis->pda_PD_Conducted=$request->pda_PD_Conducted;
            $findPS1_PDAnalysis->pda_PD_Checked=$request->pda_PD_Checked;
            $findPS1_PDAnalysis->pda_PD_Comments=$request->pda_PD_Comments;
            //S1
            $findPS1_PDAnalysis->pda_Date_Day_S1=$request->pda_Date_Day_S1;
            $findPS1_PDAnalysis->pda_S1_Time=$request->pda_S1_Time;
            $findPS1_PDAnalysis->pda_S1_Result=$request->pda_S1_Result;
            $findPS1_PDAnalysis->pda_S1_Conducted=$request->pda_S1_Conducted;
            $findPS1_PDAnalysis->pda_S1_Checked=$request->pda_S1_Checked;
            $findPS1_PDAnalysis->pda_S1_Comments=$request->pda_S1_Comments;
            //S2
            $findPS1_PDAnalysis->pda_Date_Day_S2=$request->pda_Date_Day_S2;
            $findPS1_PDAnalysis->pda_S2_Time=$request->pda_S2_Time;
            $findPS1_PDAnalysis->pda_S2_Result=$request->pda_S2_Result;
            $findPS1_PDAnalysis->pda_S2_Conducted=$request->pda_S2_Conducted;
            $findPS1_PDAnalysis->pda_S2_Checked=$request->pda_S2_Checked;
            $findPS1_PDAnalysis->pda_S2_Comments=$request->pda_S2_Comments;
            //S3
            $findPS1_PDAnalysis->pda_Date_Day_S3=$request->pda_Date_Day_S3;
            $findPS1_PDAnalysis->pda_S3_Time=$request->pda_S3_Time;
            $findPS1_PDAnalysis->pda_S3_Result=$request->pda_S3_Result;
            $findPS1_PDAnalysis->pda_S3_Conducted=$request->pda_S3_Conducted;
            $findPS1_PDAnalysis->pda_S3_Checked=$request->pda_S3_Checked;
            $findPS1_PDAnalysis->pda_S3_Comments=$request->pda_S3_Comments;
            //S4
            $findPS1_PDAnalysis->pda_Date_Day_S4=$request->pda_Date_Day_S4;
            $findPS1_PDAnalysis->pda_S4_Time=$request->pda_S4_Time;
            $findPS1_PDAnalysis->pda_S4_Result=$request->pda_S4_Result;
            $findPS1_PDAnalysis->pda_S4_Conducted=$request->pda_S4_Conducted;
            $findPS1_PDAnalysis->pda_S4_Checked=$request->pda_S4_Checked;
            $findPS1_PDAnalysis->pda_S4_Comments=$request->pda_S4_Comments;
            //S5
            $findPS1_PDAnalysis->pda_Date_Day_S5=$request->pda_Date_Day_S5;
            $findPS1_PDAnalysis->pda_S5_Time=$request->pda_S5_Time;
            $findPS1_PDAnalysis->pda_S5_Result=$request->pda_S5_Result;
            $findPS1_PDAnalysis->pda_S5_Conducted=$request->pda_S5_Conducted;
            $findPS1_PDAnalysis->pda_S5_Checked=$request->pda_S5_Checked;
            $findPS1_PDAnalysis->pda_S5_Comments=$request->pda_S5_Comments;
            //S6
            $findPS1_PDAnalysis->pda_Date_Day_S6=$request->pda_Date_Day_S6;
            $findPS1_PDAnalysis->pda_S6_Time=$request->pda_S6_Time;
            $findPS1_PDAnalysis->pda_S6_Result=$request->pda_S6_Result;
            $findPS1_PDAnalysis->pda_S6_Conducted=$request->pda_S6_Conducted;
            $findPS1_PDAnalysis->pda_S6_Checked=$request->pda_S6_Checked;
            $findPS1_PDAnalysis->pda_S6_Comments=$request->pda_S6_Comments;
            //S7
            $findPS1_PDAnalysis->pda_Date_Day_S7=$request->pda_Date_Day_S7;
            $findPS1_PDAnalysis->pda_S7_Time=$request->pda_S7_Time;
            $findPS1_PDAnalysis->pda_S7_Result=$request->pda_S7_Result;
            $findPS1_PDAnalysis->pda_S7_Conducted=$request->pda_S7_Conducted;
            $findPS1_PDAnalysis->pda_S7_Checked=$request->pda_S7_Checked;
            $findPS1_PDAnalysis->pda_S7_Comments=$request->pda_S7_Comments;
            //S8
            $findPS1_PDAnalysis->pda_Date_Day_S8=$request->pda_Date_Day_S8;
            $findPS1_PDAnalysis->pda_S8_Time=$request->pda_S8_Time;
            $findPS1_PDAnalysis->pda_S8_Result=$request->pda_S8_Result;
            $findPS1_PDAnalysis->pda_S8_Conducted=$request->pda_S8_Conducted;
            $findPS1_PDAnalysis->pda_S8_Checked=$request->pda_S8_Checked;
            $findPS1_PDAnalysis->pda_S8_Comments=$request->pda_S8_Comments;
            //Actual Day 2 of Sample Code
            //S9
            $findPS1_PDAnalysis->pda_Date_Day_S9=$request->pda_Date_Day_S9;
            $findPS1_PDAnalysis->pda_S9_Time=$request->pda_S9_Time;
            $findPS1_PDAnalysis->pda_S9_Result=$request->pda_S9_Result;
            $findPS1_PDAnalysis->pda_S9_Conducted=$request->pda_S9_Conducted;
            $findPS1_PDAnalysis->pda_S9_Checked=$request->pda_S9_Checked;
            $findPS1_PDAnalysis->pda_S9_Comments=$request->pda_S9_Comments;


            $findPS1_PDAnalysis->save();
            return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the Pharmacodynamic Blood Analysis!');
        } else {
            alert()->error('Error!', 'This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input', $study_id));
        }
    }
    public function update(Request $request,$patient_id,$study_id){
        $flag=false;
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id',$patient_id)
            ->where('study_id',$study_id)
            ->first();
        if($findPSS !=NULL)
        {
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $PDAnalysis= SP1_PDynamicAnalysis::where('SP1_PDynamicAnalysis_ID',$findSP1->SP1_PDynamicAnalysis)->first();
        }
        $data = $request->except('_token','_method');
        foreach($data as $key=>$value)
        {
            if($value != NULL)
            {
                $PDAnalysis[$key]=$value;
                $flag=true;
            }
        }
        if($flag)
        {
            $PDAnalysis->save();
            return redirect(route('studySpecific.admin'))->with('success','You updated the subject study period details for Pharmacodynamic Blood Analysis!');
        }
    }
}
