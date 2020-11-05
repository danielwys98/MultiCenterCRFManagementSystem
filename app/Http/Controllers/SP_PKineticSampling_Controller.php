<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_PKineticSampling;
use App\SP2_PKineticSampling;
use App\SP3_PKineticSampling;
use App\SP4_PKineticSampling;
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use Illuminate\Http\Request;

class SP_PKineticSampling_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request,$study_id)
    {
        $PID = $request->patient_id;
        $study_period = $request->studyPeriod;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id',$PID)
                                        ->where('study_id',$study_id)
                                        ->first();
        //check study period and save
        if($study_period == 1){
            //SP1 query
            $SP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $PSS = $findPSS->SP1_ID;
            $PKineticS = SP1_PKineticSampling::where('SP1_PKineticSampling_ID', $SP1->SP1_PKineticSampling)->first();
            if($this->storeSP($findPSS,$PSS,$PKineticS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Pharmacokinetic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $PKineticS = SP2_PKineticSampling::where('SP2_PKineticSampling_ID', $SP2->SP2_PKineticSampling)->first();
            if($this->storeSP($findPSS,$PSS,$PKineticS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Pharmacokinetic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $PKineticS = SP3_PKineticSampling::where('SP3_PKineticSampling_ID', $SP3->SP3_PKineticSampling)->first();
            if($this->storeSP($findPSS,$PSS,$PKineticS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Pharmacokinetic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $PKineticS = SP4_PKineticSampling::where('SP4_PKineticSampling_ID', $SP4->SP4_PKineticSampling)->first();
            if($this->storeSP($findPSS,$PSS,$PKineticS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 4 details for Pharmacokinetic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.input',$study_id));
        }
    }

    public function update(Request $request, $patient_id, $study_id,$study_period)
    {
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id',$patient_id)
                                        ->where('study_id',$study_id)
                                        ->first();
        //check study period and save
        if($study_period == 1){
            //SP1 query
            $SP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $PSS = $findPSS->SP1_ID;
            $PKineticS = SP1_PKineticSampling::where('SP1_PKineticSampling_ID', $SP1->SP1_PKineticSampling)->first();
            if($this->updateSP($findPSS,$PSS,$PKineticS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 1 details for Pharmacokinetic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $PKineticS = SP2_PKineticSampling::where('SP2_PKineticSampling_ID', $SP2->SP2_PKineticSampling)->first();
            if($this->updateSP($findPSS,$PSS,$PKineticS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 2 details for Pharmacokinetic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $PKineticS = SP3_PKineticSampling::where('SP3_PKineticSampling_ID', $SP3->SP3_PKineticSampling)->first();
            if($this->updateSP($findPSS,$PSS,$PKineticS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 3 details for Pharmacokinetic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $PKineticS = SP4_PKineticSampling::where('SP4_PKineticSampling_ID', $SP4->SP4_PKineticSampling)->first();
            if($this->updateSP($findPSS,$PSS,$PKineticS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 4 details for Pharmacokinetic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.edit',$study_id));
        }
    }

    //store
    public function storeSP($findPSS,$PSS,$PKineticS,$request){
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
        
        if($findPSS !=NULL && $PSS != NULL){
            if($PKineticS->Day1 == NULL){
                $flag=false;
                $data = $request->except('patient_id','studyPeriod','_token','_method');
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
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $PKineticS[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $PKineticS->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //update
    public function updateSP($findPSS,$PSS,$PKineticS,$request){
        if($findPSS !=NULL){
            $flag=false;
            $data = $request->except('_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $PKineticS[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $PKineticS->save();
            }
            return true;
        }else{
            return false;
        }
    }

}
