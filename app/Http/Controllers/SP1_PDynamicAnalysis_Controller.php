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
            ->where('patient_id', $PID)
            ->first();
        if ($findPSS != NULL) {
            if ($findPSS->study_id == $study_id) {
                //find SP1_ID to access the SP1_PKineticSampling
                //find table and update it
                $findSP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
                $findPS1_PDAnalysis=SP1_PDynamicAnalysis::where('SP1_PDynamicAnalysis_ID',$findSP1->SP1_PDynamicAnalysis)->first();

                $findPS1_PDAnalysis->Day1=$request->Day1;
                $findPS1_PDAnalysis->Day2=$request->Day2;

                $findPS1_PDAnalysis->pda_Date_Day_PD=$request->pda_Date_Day_PD;
                $findPS1_PDAnalysis->pda_PD_Result=$request->pda_PD_Result;
                $findPS1_PDAnalysis->pda_PD_Conducted=$request->pda_PD_Conducted;
                $findPS1_PDAnalysis->pda_PD_Checked=$request->pda_PD_Checked;
                $findPS1_PDAnalysis->pda_PD_Comments=$request->pda_PD_Comments;

                $findPS1_PDAnalysis->pda_Date_Day_S1=$request->pda_Date_Day_S1;
                $findPS1_PDAnalysis->pda_S1_Time=$request->pda_S1_Time;
                $findPS1_PDAnalysis->pda_S1_Result=$request->pda_S1_Result;
                $findPS1_PDAnalysis->pda_S1_Conducted=$request->pda_S1_Conducted;
                $findPS1_PDAnalysis->pda_S1_Checked=$request->pda_S1_Checked;
                $findPS1_PDAnalysis->pda_S1_Comments=$request->pda_S1_Comments;

                $findPS1_PDAnalysis->pda_Date_Day_S2=$request->pda_Date_Day_S2;
                $findPS1_PDAnalysis->pda_S2_Time=$request->pda_S2_Time;
                $findPS1_PDAnalysis->pda_S2_Result=$request->pda_S2_Result;
                $findPS1_PDAnalysis->pda_S2_Conducted=$request->pda_S2_Conducted;
                $findPS1_PDAnalysis->pda_S2_Checked=$request->pda_S2_Checked;
                $findPS1_PDAnalysis->pda_S2_Comments=$request->pda_S2_Comments;

                $findPS1_PDAnalysis->pda_Date_Day_S3=$request->pda_Date_Day_S3;
                $findPS1_PDAnalysis->pda_S3_Time=$request->pda_S3_Time;
                $findPS1_PDAnalysis->pda_S3_Result=$request->pda_S3_Result;
                $findPS1_PDAnalysis->pda_S3_Conducted=$request->pda_S3_Conducted;
                $findPS1_PDAnalysis->pda_S3_Checked=$request->pda_S3_Checked;
                $findPS1_PDAnalysis->pda_S3_Comments=$request->pda_S3_Comments;

                $findPS1_PDAnalysis->pda_Date_Day_S4=$request->pda_Date_Day_S4;
                $findPS1_PDAnalysis->pda_S4_Time=$request->pda_S4_Time;
                $findPS1_PDAnalysis->pda_S4_Result=$request->pda_S4_Result;
                $findPS1_PDAnalysis->pda_S4_Conducted=$request->pda_S4_Conducted;
                $findPS1_PDAnalysis->pda_S4_Checked=$request->pda_S4_Checked;
                $findPS1_PDAnalysis->pda_S4_Comments=$request->pda_S4_Comments;

                $findPS1_PDAnalysis->pda_Date_Day_S5=$request->pda_Date_Day_S5;
                $findPS1_PDAnalysis->pda_S5_Time=$request->pda_S5_Time;
                $findPS1_PDAnalysis->pda_S5_Result=$request->pda_S5_Result;
                $findPS1_PDAnalysis->pda_S5_Conducted=$request->pda_S5_Conducted;
                $findPS1_PDAnalysis->pda_S5_Checked=$request->pda_S5_Checked;
                $findPS1_PDAnalysis->pda_S5_Comments=$request->pda_S5_Comments;

                $findPS1_PDAnalysis->pda_Date_Day_S6=$request->pda_Date_Day_S6;
                $findPS1_PDAnalysis->pda_S6_Time=$request->pda_S6_Time;
                $findPS1_PDAnalysis->pda_S6_Result=$request->pda_S6_Result;
                $findPS1_PDAnalysis->pda_S6_Conducted=$request->pda_S6_Conducted;
                $findPS1_PDAnalysis->pda_S6_Checked=$request->pda_S6_Checked;
                $findPS1_PDAnalysis->pda_S6_Comments=$request->pda_S6_Comments;

                $findPS1_PDAnalysis->pda_Date_Day_S7=$request->pda_Date_Day_S7;
                $findPS1_PDAnalysis->pda_S7_Time=$request->pda_S7_Time;
                $findPS1_PDAnalysis->pda_S7_Result=$request->pda_S7_Result;
                $findPS1_PDAnalysis->pda_S7_Conducted=$request->pda_S7_Conducted;
                $findPS1_PDAnalysis->pda_S7_Checked=$request->pda_S7_Checked;
                $findPS1_PDAnalysis->pda_S7_Comments=$request->pda_S7_Comments;

                $findPS1_PDAnalysis->pda_Date_Day_S8=$request->pda_Date_Day_S8;
                $findPS1_PDAnalysis->pda_S8_Time=$request->pda_S8_Time;
                $findPS1_PDAnalysis->pda_S8_Result=$request->pda_S8_Result;
                $findPS1_PDAnalysis->pda_S8_Conducted=$request->pda_S8_Conducted;
                $findPS1_PDAnalysis->pda_S8_Checked=$request->pda_S8_Checked;
                $findPS1_PDAnalysis->pda_S8_Comments=$request->pda_S8_Comments;

                $findPS1_PDAnalysis->pda_Date_Day_S9=$request->pda_Date_Day_S9;
                $findPS1_PDAnalysis->pda_S9_Time=$request->pda_S9_Time;
                $findPS1_PDAnalysis->pda_S9_Result=$request->pda_S9_Result;
                $findPS1_PDAnalysis->pda_S9_Conducted=$request->pda_S9_Conducted;
                $findPS1_PDAnalysis->pda_S9_Checked=$request->pda_S9_Checked;
                $findPS1_PDAnalysis->pda_S9_Comments=$request->pda_S9_Comments;


                $findPS1_PDAnalysis->save();
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the Pharmacodynamic Blood Analysis!');
            } else {
                alert()->error('Error!', 'This subject is not enrolled into this study!');
                return redirect(route('studySpecific.input', $study_id));
            }
        } else {
            alert()->error('Error!', 'This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input', $study_id));
        }
    }
}
