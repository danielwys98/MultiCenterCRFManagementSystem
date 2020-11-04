<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_PDynamicAnalysis;
use App\SP2_PDynamicAnalysis;
use App\SP3_PDynamicAnalysis;
use App\SP4_PDynamicAnalysis;
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use Illuminate\Http\Request;

class SP1_PDynamicAnalysis_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $study_id)
    {
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
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Pharmacodynamic (PD) Analysis sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            if($this->storeSP2($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Pharmacodynamic (PD) Analysis sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            if($this->storeSP3($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Pharmacodynamic (PD) Analysis sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            if($this->storeSP4($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 4 details for Pharmacodynamic (PD) Analysis sampling!');
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
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 1 details for Pharmacodynamic (PD) Analysis sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 2){
            if($this->updateSP2($findPSS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 2 details for Pharmacodynamic (PD) Analysis sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 3){
            if($this->updateSP3($findPSS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 3 details for Pharmacodynamic (PD) Analysis sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 4){
            if($this->updateSP4($findPSS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 4 details for Pharmacodynamic (PD) Analysis sampling!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.edit',$study_id));
        }
    }

    //store SP1_PDynamicAnalysis
    public function storeSP1($PSS,$request){
        if($PSS !=NULL && $PSS->SP1_ID != NULL){
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$PSS->SP1_ID)->first();
            $PDAnalysis= SP1_PDynamicAnalysis::where('SP1_PDynamicAnalysis_ID',$findSP1->SP1_PDynamicAnalysis)->first();

            if($PDAnalysis->Day1 == NULL){
                $flag=false;
                $data = $request->except('_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $PDAnalysis[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $PDAnalysis->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP2_PDynamicAnalysis
    public function storeSP2($PSS,$request){
        if($PSS !=NULL && $PSS->SP2_ID != NULL){
            //find admission table and update it
            $findSP2 = StudyPeriod2::where('SP2_ID',$PSS->SP2_ID)->first();
            $PDAnalysis= SP2_PDynamicAnalysis::where('SP2_PDynamicAnalysis_ID',$findSP2->SP2_PDynamicAnalysis)->first();

            if($PDAnalysis->Day1 == NULL){
                $flag=false;
                $data = $request->except('_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $PDAnalysis[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $PDAnalysis->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP3_PDynamicAnalysis
    public function storeSP3($PSS,$request){
        if($PSS !=NULL && $PSS->SP3_ID != NULL){
            //find admission table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID',$PSS->SP3_ID)->first();
            $PDAnalysis= SP3_PDynamicAnalysis::where('SP3_PDynamicAnalysis_ID',$findSP3->SP3_PDynamicAnalysis)->first();

            if($PDAnalysis->Day1 == NULL){
                $flag=false;
                $data = $request->except('_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $PDAnalysis[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $PDAnalysis->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP4_PDynamicAnalysis
    public function storeSP4($PSS,$request){
        if($PSS !=NULL && $PSS->SP4_ID != NULL){
            //find admission table and update it
            $findSP4 = StudyPeriod4::where('SP4_ID',$PSS->SP4_ID)->first();
            $PDAnalysis= SP4_PDynamicAnalysis::where('SP4_PDynamicAnalysis_ID',$findSP4->SP4_PDynamicAnalysis)->first();

            if($PDAnalysis->Day1 == NULL){
                $flag=false;
                $data = $request->except('_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $PDAnalysis[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $PDAnalysis->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //update SP1_PDynamicAnalysis
    public function updateSP1($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$PSS->SP1_ID)->first();
            $PDAnalysis= SP1_PDynamicAnalysis::where('SP1_PDynamicAnalysis_ID',$findSP1->SP1_PDynamicAnalysis)->first();

            $flag=false;
            $data = $request->except('_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $PDAnalysis[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $PDAnalysis->save();
            }
            return true;
        }else{
            return false;
        }
    }

    //update SP2_PDynamicAnalysis
    public function updateSP2($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP2 = StudyPeriod2::where('SP2_ID',$PSS->SP2_ID)->first();
            $PDAnalysis= SP2_PDynamicAnalysis::where('SP2_PDynamicAnalysis_ID',$findSP2->SP2_PDynamicAnalysis)->first();

            $flag=false;
            $data = $request->except('_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $PDAnalysis[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $PDAnalysis->save();
            }
            return true;
        }else{
            return false;
        }
    }

    //update SP3_PDynamicAnalysis
    public function updateSP3($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID',$PSS->SP3_ID)->first();
            $PDAnalysis= SP3_PDynamicAnalysis::where('SP3_PDynamicAnalysis_ID',$findSP3->SP3_PDynamicAnalysis)->first();

            $flag=false;
            $data = $request->except('_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $PDAnalysis[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $PDAnalysis->save();
            }
            return true;
        }else{
            return false;
        }
    }

    //update SP4_PDynamicAnalysis
    public function updateSP4($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP4 = StudyPeriod4::where('SP4_ID',$PSS->SP4_ID)->first();
            $PDAnalysis= SP4_PDynamicAnalysis::where('SP4_PDynamicAnalysis_ID',$findSP4->SP4_PDynamicAnalysis)->first();

            $flag=false;
            $data = $request->except('_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $PDAnalysis[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $PDAnalysis->save();
            }
            return true;
        }else{
            return false;
        }
    }
    
}
