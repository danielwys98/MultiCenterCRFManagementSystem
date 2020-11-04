<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use Illuminate\Http\Request;
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use App\SP1_PDynamicSampling;
use App\SP2_PDynamicSampling;
use App\SP3_PDynamicSampling;
use App\SP4_PDynamicSampling;

class SP1_PDynamicSampling_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request,$study_id)
    {
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

        $PID = $request->patient_id;
        $study_period = $request->studyPeriod;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id',$PID)
                                        ->where('study_id',$study_id)
                                        ->first();
        //check study period and save
        if($study_period == '---'){
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }elseif($study_period == 1){
            if($this->storeSP1($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Pharmacodynamic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            if($this->storeSP2($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Pharmacodynamic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            if($this->storeSP3($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Pharmacodynamic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            if($this->storeSP4($findPSS,$request)){
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

    public function update(Request $request,$patient_id,$study_id){
        $study_period = $request->studyPeriod;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id',$patient_id)
                                        ->where('study_id',$study_id)
                                        ->first();
        //check study period and save
        if($study_period == '---'){
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.edit',$study_id));
        }elseif($study_period == 1){
            if($this->updateSP1($findPSS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 1 details for Pharmacodynamic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 2){
            if($this->updateSP2($findPSS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 2 details for Pharmacodynamic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 3){
            if($this->updateSP3($findPSS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 3 details for Pharmacodynamic Blood Sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 4){
            if($this->updateSP4($findPSS,$request)){
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

    //store SP1_PDynamicSampling
    public function storeSP1($PSS,$request){
        if($PSS !=NULL && $PSS->SP1_ID != NULL){
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$PSS->SP1_ID)->first();
            $PDSampling= SP1_PDynamicSampling::where('SP1_PDynamicSampling_ID',$findSP1->SP1_PDynamicSampling)->first();

            if($PDSampling->day1 == NULL){
                $flag=false;
                $data = $request->except('patient_id','studyPeriod','_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $PDSampling[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $PDSampling->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP2_PDynamicSampling
    public function storeSP2($PSS,$request){
        if($PSS !=NULL && $PSS->SP2_ID != NULL){
            //find admission table and update it
            $findSP2 = StudyPeriod2::where('SP2_ID',$PSS->SP2_ID)->first();
            $PDSampling= SP2_PDynamicSampling::where('SP2_PDynamicSampling_ID',$findSP2->SP2_PDynamicSampling)->first();

            if($PDSampling->day1 == NULL){
                $flag=false;
                $data = $request->except('patient_id','studyPeriod','_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $PDSampling[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $PDSampling->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP3_PDynamicSampling
    public function storeSP3($PSS,$request){
        if($PSS !=NULL && $PSS->SP3_ID != NULL){
            //find admission table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID',$PSS->SP3_ID)->first();
            $PDSampling= SP3_PDynamicSampling::where('SP3_PDynamicSampling_ID',$findSP3->SP3_PDynamicSampling)->first();

            if($PDSampling->day1 == NULL){
                $flag=false;
                $data = $request->except('patient_id','studyPeriod','_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $PDSampling[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $PDSampling->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP4_PDynamicSampling
    public function storeSP4($PSS,$request){
        if($PSS !=NULL && $PSS->SP4_ID != NULL){
            //find admission table and update it
            $findSP4 = StudyPeriod4::where('SP4_ID',$PSS->SP4_ID)->first();
            $PDSampling= SP4_PDynamicSampling::where('SP4_PDynamicSampling_ID',$findSP4->SP4_PDynamicSampling)->first();

            if($PDSampling->day1 == NULL){
                $flag=false;
                $data = $request->except('patient_id','studyPeriod','_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $PDSampling[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $PDSampling->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //update SP1_PDynamicSampling
    public function updateSP1($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$PSS->SP1_ID)->first();
            $PDSampling= SP1_PDynamicSampling::where('SP1_PDynamicSampling_ID',$findSP1->SP1_PDynamicSampling)->first();

            $flag=false;
            $data = $request->except('patient_id','studyPeriod','_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $PDSampling[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $PDSampling->save();
            }
            return true;
        }else{
            return false;
        }
    }

    //update SP2_PDynamicSampling
    public function updateSP2($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP2 = StudyPeriod2::where('SP2_ID',$PSS->SP2_ID)->first();
            $PDSampling= SP2_PDynamicSampling::where('SP2_PDynamicSampling_ID',$findSP2->SP2_PDynamicSampling)->first();

            $flag=false;
            $data = $request->except('patient_id','studyPeriod','_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $PDSampling[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $PDSampling->save();
            }
            return true;
        }else{
            return false;
        }
    }

    //update SP3_PDynamicSampling
    public function updateSP3($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID',$PSS->SP3_ID)->first();
            $PDSampling= SP3_PDynamicSampling::where('SP3_PDynamicSampling_ID',$findSP3->SP3_PDynamicSampling)->first();

            $flag=false;
            $data = $request->except('patient_id','studyPeriod','_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $PDSampling[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $PDSampling->save();
            }
            return true;
        }else{
            return false;
        }
    }

    //update SP4_PDynamicSampling
    public function updateSP4($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP4 = StudyPeriod4::where('SP4_ID',$PSS->SP4_ID)->first();
            $PDSampling= SP4_PDynamicSampling::where('SP4_PDynamicSampling_ID',$findSP4->SP4_PDynamicSampling)->first();

            $flag=false;
            $data = $request->except('patient_id','studyPeriod','_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $PDSampling[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $PDSampling->save();
            }
            return true;
        }else{
            return false;
        }
    }

}
