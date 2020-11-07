<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_PDynamicSampling;
use App\SP2_PDynamicSampling;
use App\SP3_PDynamicSampling;
use App\SP4_PDynamicSampling;
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use Illuminate\Http\Request;

class SP_PDynamicSampling_Controller extends Controller
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
            $PDSampling= SP1_PDynamicSampling::where('SP1_PDynamicSampling_ID',$SP1->SP1_PDynamicSampling)->first();
            if($this->storeSP($findPSS,$PSS,$PDSampling,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Pharmacodynamic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $PDSampling= SP2_PDynamicSampling::where('SP2_PDynamicSampling_ID',$SP2->SP2_PDynamicSampling)->first();
            if($this->storeSP($findPSS,$PSS,$PDSampling,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Pharmacodynamic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $PDSampling= SP3_PDynamicSampling::where('SP3_PDynamicSampling_ID',$SP3->SP3_PDynamicSampling)->first();
            if($this->storeSP($findPSS,$PSS,$PDSampling,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Pharmacodynamic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $PDSampling= SP4_PDynamicSampling::where('SP4_PDynamicSampling_ID',$SP4->SP4_PDynamicSampling)->first();
            if($this->storeSP($findPSS,$PSS,$PDSampling,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 4 details for Pharmacodynamic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.input',$study_id));
        }
    }

    public function update(Request $request,$patient_id,$study_id,$study_period)
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
            $PDSampling= SP1_PDynamicSampling::where('SP1_PDynamicSampling_ID',$SP1->SP1_PDynamicSampling)->first();
            if($this->updateSP($findPSS,$PSS,$PDSampling,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 1 details for Pharmacodynamic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $PDSampling= SP2_PDynamicSampling::where('SP2_PDynamicSampling_ID',$SP2->SP2_PDynamicSampling)->first();
            if($this->updateSP($findPSS,$PSS,$PDSampling,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 2 details for Pharmacodynamic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $PDSampling= SP3_PDynamicSampling::where('SP3_PDynamicSampling_ID',$SP3->SP3_PDynamicSampling)->first();
            if($this->updateSP($findPSS,$PSS,$PDSampling,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 3 details for Pharmacodynamic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $PDSampling= SP4_PDynamicSampling::where('SP4_PDynamicSampling_ID',$SP4->SP4_PDynamicSampling)->first();
            if($this->updateSP($findPSS,$PSS,$PDSampling,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 4 details for Pharmacodynamic Blood Sampling!');
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
    public function storeSP($findPSS,$PSS,$PDSampling,$request){
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

            'S9_Date_Day_2.required' => 'Please enter the S9 date for Pharmacodynamic Blood Sampling',
            'S9_SST.required' => 'Please enter the S9 Scheduled Sampling Time for Pharmacodynamic Blood Sampling',
            'S9_AST.required' => 'Please enter the S9 Actual Sampling Time for Pharmacodynamic Blood Sampling',
            'S9_Collected.required' => 'Please enter the person collected for S9 Pharmacodynamic Blood Sampling',
            'S9_Checked.required' => 'Please enter the person checked for S9 Pharmacodynamic Blood Sampling',
        ];

        if($findPSS !=NULL && $PSS != NULL){
            if($PDSampling->day1 == NULL){
                $data = $request->except('patient_id','studyPeriod','_token','_method');
                
                if($request->Absent == 1){
                    foreach($data as $key=>$value){
                        if($value != NULL)
                        {
                            $PDSampling[$key]=NULL;
                        }
                    }
                }else{
                    if($request->NApplicable == 1){
                        foreach($data as $key=>$value){
                            if($value != NULL)
                            {
                                $PDSampling[$key]=NULL;
                            }
                        }
                    }else{
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

                            'S9_Date_Day_2' => 'required',
                            'S9_SST' => 'required',
                            'S9_AST' => 'required',
                            'S9_Collected' => 'required',
                            'S9_Checked' => 'required',
                        ],$custom);
                        foreach($data as $key=>$value){
                            if($value != NULL)
                            {
                                $PDSampling[$key]=$value;
                            }
                        }
                    }
                }
                $PDSampling->Absent=$request->Absent;
                $PDSampling->NApplicable=$request->NApplicable;

                $PDSampling->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }


    //update
    public function updateSP($findPSS,$PSS,$PDSampling,$request){
        if($findPSS !=NULL){
            $data = $request->except('_token','_method');
            if($request->Absent == 1){
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $PDSampling[$key]=NULL;
                    }
                }
            }else{
                if($request->NApplicable == 1){
                    foreach($data as $key=>$value){
                        if($value != NULL)
                        {
                            $PDSampling[$key]=NULL;
                        }
                    }
                }else{
                    foreach($data as $key=>$value){
                        if($value != NULL)
                        {
                            $PDSampling[$key]=$value;
                        }
                    }
                }
            }
            
            $PDSampling->Absent=$request->Absent;
            $PDSampling->NApplicable=$request->NApplicable;
            $PDSampling->save();
            return true;
        }else{
            return false;
        }
    }

}
