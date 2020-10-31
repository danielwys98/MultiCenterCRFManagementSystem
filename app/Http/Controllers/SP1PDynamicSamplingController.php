<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_PDynamicSampling;
use Illuminate\Http\Request;
use App\SP1_BMVS;
use App\StudyPeriod1;

class SP1PDynamicSamplingController extends Controller
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
                //find SP1_ID to access the SP1_Admission
                //find admission table and update it
                $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();

                $findSP1_PDS = SP1_PDynamicSampling::where('SP1_PDynamicSampling_ID',$findSP1->SP1_PDynamicSampling)->first();
                //SAVE BMVS stuffs
                //Day
                if(!empty($findSP1_PDS)) {
                    $findSP1_PDS->Day1 = $request->day1;
                    $findSP1_PDS->Day2 = $request->day2;
                    //PD
                    $findSP1_PDS->PD_Date_Day_1 = $request->PD_Date_Day_1;
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
