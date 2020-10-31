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
                                        ->first();
        if($findPSS !=NULL){
            if($findPSS->study_id == $study_id){
                //find SP1_ID to access the SP1_PKineticSampling
                //find table and update it
                $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
                $findSP1_PKineticSampling = SP1_PKineticSampling::where('SP1_PKineticSampling_ID',$findSP1->SP1_PKineticSampling)->first();
                //SAVE SP1_PKineticSampling stuffs

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
                $findSP1_PKineticSampling->pk_Date_Day_PD=$request->Pharmacokinetic_Date_Day_PD;
                //No SST for Sample Code PD
                $findSP1_PKineticSampling->pk_PD_AST=$request->Pharmacokinetic_PD_AST;
                $findSP1_PKineticSampling->pk_PD_Collected=$request->Pharmacokinetic_PD_Collected;
                $findSP1_PKineticSampling->pk_PD_Checked=$request->Pharmacokinetic_PD_Checked;
                $findSP1_PKineticSampling->pk_PD_Comments=$request->Pharmacokinetic_PD_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S1=$request->Pharmacokinetic_Date_Day_S1;
                $findSP1_PKineticSampling->pk_S1_SST=$request->Pharmacokinetic_S1_SST;
                $findSP1_PKineticSampling->pk_S1_AST=$request->Pharmacokinetic_S1_AST;
                $findSP1_PKineticSampling->pk_S1_Collected=$request->Pharmacokinetic_S1_Collected;
                $findSP1_PKineticSampling->pk_S1_Checked=$request->Pharmacokinetic_S1_Checked;
                $findSP1_PKineticSampling->pk_S1_Comments=$request->Pharmacokinetic_S1_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S2=$request->Pharmacokinetic_Date_Day_S2;
                $findSP1_PKineticSampling->pk_S2_SST=$request->Pharmacokinetic_S2_SST;
                $findSP1_PKineticSampling->pk_S2_AST=$request->Pharmacokinetic_S2_AST;
                $findSP1_PKineticSampling->pk_S2_Collected=$request->Pharmacokinetic_S2_Collected;
                $findSP1_PKineticSampling->pk_S2_Checked=$request->Pharmacokinetic_S2_Checked;
                $findSP1_PKineticSampling->pk_S2_Comments=$request->Pharmacokinetic_S2_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S3=$request->Pharmacokinetic_Date_Day_S3;
                $findSP1_PKineticSampling->pk_S3_SST=$request->Pharmacokinetic_S3_SST;
                $findSP1_PKineticSampling->pk_S3_AST=$request->Pharmacokinetic_S3_AST;
                $findSP1_PKineticSampling->pk_S3_Collected=$request->Pharmacokinetic_S3_Collected;
                $findSP1_PKineticSampling->pk_S3_Checked=$request->Pharmacokinetic_S3_Checked;
                $findSP1_PKineticSampling->pk_S3_Comments=$request->Pharmacokinetic_S3_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S4=$request->Pharmacokinetic_Date_Day_S4;
                $findSP1_PKineticSampling->pk_S4_SST=$request->Pharmacokinetic_S4_SST;
                $findSP1_PKineticSampling->pk_S4_AST=$request->Pharmacokinetic_S4_AST;
                $findSP1_PKineticSampling->pk_S4_Collected=$request->Pharmacokinetic_S4_Collected;
                $findSP1_PKineticSampling->pk_S4_Checked=$request->Pharmacokinetic_S4_Checked;
                $findSP1_PKineticSampling->pk_S4_Comments=$request->Pharmacokinetic_S4_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S5=$request->Pharmacokinetic_Date_Day_S5;
                $findSP1_PKineticSampling->pk_S5_SST=$request->Pharmacokinetic_S5_SST;
                $findSP1_PKineticSampling->pk_S5_AST=$request->Pharmacokinetic_S5_AST;
                $findSP1_PKineticSampling->pk_S5_Collected=$request->Pharmacokinetic_S5_Collected;
                $findSP1_PKineticSampling->pk_S5_Checked=$request->Pharmacokinetic_S5_Checked;
                $findSP1_PKineticSampling->pk_S5_Comments=$request->Pharmacokinetic_S5_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S6=$request->Pharmacokinetic_Date_Day_S6;
                $findSP1_PKineticSampling->pk_S6_SST=$request->Pharmacokinetic_S6_SST;
                $findSP1_PKineticSampling->pk_S6_AST=$request->Pharmacokinetic_S6_AST;
                $findSP1_PKineticSampling->pk_S6_Collected=$request->Pharmacokinetic_S6_Collected;
                $findSP1_PKineticSampling->pk_S6_Checked=$request->Pharmacokinetic_S6_Checked;
                $findSP1_PKineticSampling->pk_S6_Comments=$request->Pharmacokinetic_S6_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S7=$request->Pharmacokinetic_Date_Day_S7;
                $findSP1_PKineticSampling->pk_S7_SST=$request->Pharmacokinetic_S7_SST;
                $findSP1_PKineticSampling->pk_S7_AST=$request->Pharmacokinetic_S7_AST;
                $findSP1_PKineticSampling->pk_S7_Collected=$request->Pharmacokinetic_S7_Collected;
                $findSP1_PKineticSampling->pk_S7_Checked=$request->Pharmacokinetic_S7_Checked;
                $findSP1_PKineticSampling->pk_S7_Comments=$request->Pharmacokinetic_S7_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S8=$request->Pharmacokinetic_Date_Day_S8;
                $findSP1_PKineticSampling->pk_S8_SST=$request->Pharmacokinetic_S8_SST;
                $findSP1_PKineticSampling->pk_S8_AST=$request->Pharmacokinetic_S8_AST;
                $findSP1_PKineticSampling->pk_S8_Collected=$request->Pharmacokinetic_S8_Collected;
                $findSP1_PKineticSampling->pk_S8_Checked=$request->Pharmacokinetic_S8_Checked;
                $findSP1_PKineticSampling->pk_S8_Comments=$request->Pharmacokinetic_S8_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S9=$request->Pharmacokinetic_Date_Day_S9;
                $findSP1_PKineticSampling->pk_S9_SST=$request->Pharmacokinetic_S9_SST;
                $findSP1_PKineticSampling->pk_S9_AST=$request->Pharmacokinetic_S9_AST;
                $findSP1_PKineticSampling->pk_S9_Collected=$request->Pharmacokinetic_S9_Collected;
                $findSP1_PKineticSampling->pk_S9_Checked=$request->Pharmacokinetic_S9_Checked;
                $findSP1_PKineticSampling->pk_S9_Comments=$request->Pharmacokinetic_S9_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S10=$request->Pharmacokinetic_Date_Day_S10;
                $findSP1_PKineticSampling->pk_S10_SST=$request->Pharmacokinetic_S10_SST;
                $findSP1_PKineticSampling->pk_S10_AST=$request->Pharmacokinetic_S10_AST;
                $findSP1_PKineticSampling->pk_S10_Collected=$request->Pharmacokinetic_S10_Collected;
                $findSP1_PKineticSampling->pk_S10_Checked=$request->Pharmacokinetic_S10_Checked;
                $findSP1_PKineticSampling->pk_S10_Comments=$request->Pharmacokinetic_S10_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S11=$request->Pharmacokinetic_Date_Day_S11;
                $findSP1_PKineticSampling->pk_S11_SST=$request->Pharmacokinetic_S11_SST;
                $findSP1_PKineticSampling->pk_S11_AST=$request->Pharmacokinetic_S11_AST;
                $findSP1_PKineticSampling->pk_S11_Collected=$request->Pharmacokinetic_S11_Collected;
                $findSP1_PKineticSampling->pk_S11_Checked=$request->Pharmacokinetic_S11_Checked;
                $findSP1_PKineticSampling->pk_S11_Comments=$request->Pharmacokinetic_S11_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S12=$request->Pharmacokinetic_Date_Day_S12;
                $findSP1_PKineticSampling->pk_S12_SST=$request->Pharmacokinetic_S12_SST;
                $findSP1_PKineticSampling->pk_S12_AST=$request->Pharmacokinetic_S12_AST;
                $findSP1_PKineticSampling->pk_S12_Collected=$request->Pharmacokinetic_S12_Collected;
                $findSP1_PKineticSampling->pk_S12_Checked=$request->Pharmacokinetic_S12_Checked;
                $findSP1_PKineticSampling->pk_S12_Comments=$request->Pharmacokinetic_S12_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S13=$request->Pharmacokinetic_Date_Day_S13;
                $findSP1_PKineticSampling->pk_S13_SST=$request->Pharmacokinetic_S13_SST;
                $findSP1_PKineticSampling->pk_S13_AST=$request->Pharmacokinetic_S13_AST;
                $findSP1_PKineticSampling->pk_S13_Collected=$request->Pharmacokinetic_S13_Collected;
                $findSP1_PKineticSampling->pk_S13_Checked=$request->Pharmacokinetic_S13_Checked;
                $findSP1_PKineticSampling->pk_S13_Comments=$request->Pharmacokinetic_S13_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S14=$request->Pharmacokinetic_Date_Day_S14;
                $findSP1_PKineticSampling->pk_S14_SST=$request->Pharmacokinetic_S14_SST;
                $findSP1_PKineticSampling->pk_S14_AST=$request->Pharmacokinetic_S14_AST;
                $findSP1_PKineticSampling->pk_S14_Collected=$request->Pharmacokinetic_S14_Collected;
                $findSP1_PKineticSampling->pk_S14_Checked=$request->Pharmacokinetic_S14_Checked;
                $findSP1_PKineticSampling->pk_S14_Comments=$request->Pharmacokinetic_S14_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S15=$request->Pharmacokinetic_Date_Day_S15;
                $findSP1_PKineticSampling->pk_S15_SST=$request->Pharmacokinetic_S15_SST;
                $findSP1_PKineticSampling->pk_S15_AST=$request->Pharmacokinetic_S15_AST;
                $findSP1_PKineticSampling->pk_S15_Collected=$request->Pharmacokinetic_S15_Collected;
                $findSP1_PKineticSampling->pk_S15_Checked=$request->Pharmacokinetic_S15_Checked;
                $findSP1_PKineticSampling->pk_S15_Comments=$request->Pharmacokinetic_S15_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S16=$request->Pharmacokinetic_Date_Day_S16;
                $findSP1_PKineticSampling->pk_S16_SST=$request->Pharmacokinetic_S16_SST;
                $findSP1_PKineticSampling->pk_S16_AST=$request->Pharmacokinetic_S16_AST;
                $findSP1_PKineticSampling->pk_S16_Collected=$request->Pharmacokinetic_S16_Collected;
                $findSP1_PKineticSampling->pk_S16_Checked=$request->Pharmacokinetic_S16_Checked;
                $findSP1_PKineticSampling->pk_S16_Comments=$request->Pharmacokinetic_S16_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S17=$request->Pharmacokinetic_Date_Day_S17;
                $findSP1_PKineticSampling->pk_S17_SST=$request->Pharmacokinetic_S17_SST;
                $findSP1_PKineticSampling->pk_S17_AST=$request->Pharmacokinetic_S17_AST;
                $findSP1_PKineticSampling->pk_S17_Collected=$request->Pharmacokinetic_S17_Collected;
                $findSP1_PKineticSampling->pk_S17_Checked=$request->Pharmacokinetic_S17_Checked;
                $findSP1_PKineticSampling->pk_S17_Comments=$request->Pharmacokinetic_S17_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S18=$request->Pharmacokinetic_Date_Day_S18;
                $findSP1_PKineticSampling->pk_S18_SST=$request->Pharmacokinetic_S18_SST;
                $findSP1_PKineticSampling->pk_S18_AST=$request->Pharmacokinetic_S18_AST;
                $findSP1_PKineticSampling->pk_S18_Collected=$request->Pharmacokinetic_S18_Collected;
                $findSP1_PKineticSampling->pk_S18_Checked=$request->Pharmacokinetic_S18_Checked;
                $findSP1_PKineticSampling->pk_S18_Comments=$request->Pharmacokinetic_S18_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S19=$request->Pharmacokinetic_Date_Day_S19;
                $findSP1_PKineticSampling->pk_S19_SST=$request->Pharmacokinetic_S19_SST;
                $findSP1_PKineticSampling->pk_S19_AST=$request->Pharmacokinetic_S19_AST;
                $findSP1_PKineticSampling->pk_S19_Collected=$request->Pharmacokinetic_S19_Collected;
                $findSP1_PKineticSampling->pk_S19_Checked=$request->Pharmacokinetic_S19_Checked;
                $findSP1_PKineticSampling->pk_S19_Comments=$request->Pharmacokinetic_S19_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S20=$request->Pharmacokinetic_Date_Day_S20;
                $findSP1_PKineticSampling->pk_S20_SST=$request->Pharmacokinetic_S20_SST;
                $findSP1_PKineticSampling->pk_S20_AST=$request->Pharmacokinetic_S20_AST;
                $findSP1_PKineticSampling->pk_S20_Collected=$request->Pharmacokinetic_S20_Collected;
                $findSP1_PKineticSampling->pk_S20_Checked=$request->Pharmacokinetic_S20_Checked;
                $findSP1_PKineticSampling->pk_S20_Comments=$request->Pharmacokinetic_S20_Comments;

                $findSP1_PKineticSampling->pk_Date_Day_S21=$request->Pharmacokinetic_Date_Day_S21;
                $findSP1_PKineticSampling->pk_S21_SST=$request->Pharmacokinetic_S21_SST;
                $findSP1_PKineticSampling->pk_S21_AST=$request->Pharmacokinetic_S21_AST;
                $findSP1_PKineticSampling->pk_S21_Collected=$request->Pharmacokinetic_S21_Collected;
                $findSP1_PKineticSampling->pk_S21_Checked=$request->Pharmacokinetic_S21_Checked;
                $findSP1_PKineticSampling->pk_S21_Comments=$request->Pharmacokinetic_S21_Comments;

                $findSP1_PKineticSampling->save();
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','This subject is not enrolled into this study!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }else{
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }
    }

}
