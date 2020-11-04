<?php

namespace App\Http\Controllers;

use App\Patient;
use App\PatientStudySpecific;
use App\SP1_VitalSigns;
use App\SP2_VitalSigns;
use App\SP3_VitalSigns;
use App\SP4_VitalSigns;
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use Illuminate\Http\Request;

class SP1_VitalSign_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request,$study_id)
    {
        //custom messages load for validation
        $custom = [
            'TPD_1_Date.required' => 'Please enter the vital signs date of 1hr time post dose',
            'TPD_1_ReadingTime.required' => 'Please enter the vital signs reading time of 1hr time post dose',
            'TPD_1_SittingBP.required' => 'Please enter the vital signs sitting blood pressure of 1hr time post dose',
            'TPD_1_Pulse.required' => 'Please enter the vital signs pulse rate of 1hr time post dose',
            'TPD_1_Respiration.required' => 'Please enter the vital signs respiration rate of 1hr time post dose',
            'TPD_1_TakenBy.required' => 'Please enter the vital signs physician name of 1hr time post dose',

            'TPD_2_Date.required' => 'Please enter the vital signs date of 2hr time post dose',
            'TPD_2_ReadingTime.required' => 'Please enter the vital signs reading time of 2hr time post dose',
            'TPD_2_SittingBP.required' => 'Please enter the vital signs sitting blood pressure of 2hr time post dose',
            'TPD_2_Pulse.required' => 'Please enter the vital signs pulse rate of 2hr time post dose',
            'TPD_2_Respiration.required' => 'Please enter the vital signs respiration rate of 2hr time post dose',
            'TPD_2_TakenBy.required' => 'Please enter the vital signs physician name of 2hr time post dose',

            'TPD_5_Date.required' => 'Please enter the vital signs date of 5hr time post dose',
            'TPD_5_ReadingTime.required' => 'Please enter the vital signs reading time of 5hr time post dose',
            'TPD_5_SittingBP.required' => 'Please enter the vital signs sitting blood pressure of 5hr time post dose',
            'TPD_5_Pulse.required' => 'Please enter the vital signs pulse rate of 5hr time post dose',
            'TPD_5_Respiration.required' => 'Please enter the vital signs respiration rate of 5hr time post dose',
            'TPD_5_TakenBy.required' => 'Please enter the vital signs physician name of 5hr time post dose',

            'TPD_8_Date.required' => 'Please enter the vital signs date of 8hr time post dose',
            'TPD_8_ReadingTime.required' => 'Please enter the vital signs reading time of 8hr time post dose',
            'TPD_8_SittingBP.required' => 'Please enter the vital signs sitting blood pressure of 8hr time post dose',
            'TPD_8_Pulse.required' => 'Please enter the vital signs pulse rate of 8hr time post dose',
            'TPD_8_Respiration.required' => 'Please enter the vital signs respiration rate of 8hr time post dose',
            'TPD_8_TakenBy.required' => 'Please enter the vital signs physician name of 8hr time post dose',

            'TPD_12_Date.required' => 'Please enter the vital signs date of 12hr time post dose',
            'TPD_12_ReadingTime.required' => 'Please enter the vital signs reading time of 12hr time post dose',
            'TPD_12_SittingBP.required' => 'Please enter the vital signs sitting blood pressure of 12hr time post dose',
            'TPD_12_Pulse.required' => 'Please enter the vital signs pulse rate of 12hr time post dose',
            'TPD_12_Respiration.required' => 'Please enter the vital signs respiration rate of 12hr time post dose',
            'TPD_12_TakenBy.required' => 'Please enter the vital signs physician name of 12hr time post dose',

            'TPD_36_Date.required' => 'Please enter the vital signs date of 36hr time post dose',
            'TPD_36_ReadingTime.required' => 'Please enter the vital signs reading time of 36hr time post dose',
            'TPD_36_SittingBP.required' => 'Please enter the vital signs sitting blood pressure of 36hr time post dose',
            'TPD_36_Pulse.required' => 'Please enter the vital signs pulse rate of 36hr time post dose',
            'TPD_36_Respiration.required' => 'Please enter the vital signs respiration rate of 36hr time post dose',
            'TPD_36_TakenBy.required' => 'Please enter the vital signs physician name of 36hr time post dose',

            'TPD_48_Date.required' => 'Please enter the vital signs date of 48hr time post dose',
            'TPD_48_ReadingTime.required' => 'Please enter the vital signs reading time of 48hr time post dose',
            'TPD_48_SittingBP.required' => 'Please enter the vital signs sitting blood pressure of 48hr time post dose',
            'TPD_48_Pulse.required' => 'Please enter the vital signs pulse rate of 48hr time post dose',
            'TPD_48_Respiration.required' => 'Please enter the vital signs respiration rate of 48hr time post dose',
            'TPD_48_TakenBy.required' => 'Please enter the vital signs physician name of 48hr time post dose',
        ];

        //validation for required fields
        $validatedData = $this->validate($request, [
            'TPD_1_Date' => 'required',
            'TPD_1_ReadingTime' => 'required',
            'TPD_1_SittingBP' => 'required',
            'TPD_1_Pulse' => 'required',
            'TPD_1_Respiration' => 'required',
            'TPD_1_TakenBy' => 'required',

            'TPD_2_Date' => 'required',
            'TPD_2_ReadingTime' => 'required',
            'TPD_2_SittingBP' => 'required',
            'TPD_2_Pulse' => 'required',
            'TPD_2_Respiration' => 'required',
            'TPD_2_TakenBy' => 'required',

            'TPD_5_Date' => 'required',
            'TPD_5_ReadingTime' => 'required',
            'TPD_5_SittingBP' => 'required',
            'TPD_5_Pulse' => 'required',
            'TPD_5_Respiration' => 'required',
            'TPD_5_TakenBy' => 'required',

            'TPD_8_Date' => 'required',
            'TPD_8_ReadingTime' => 'required',
            'TPD_8_SittingBP' => 'required',
            'TPD_8_Pulse' => 'required',
            'TPD_8_Respiration' => 'required',
            'TPD_8_TakenBy' => 'required',

            'TPD_12_Date' => 'required',
            'TPD_12_ReadingTime' => 'required',
            'TPD_12_SittingBP' => 'required',
            'TPD_12_Pulse' => 'required',
            'TPD_12_Respiration' => 'required',
            'TPD_12_TakenBy' => 'required',

            'TPD_36_Date' => 'required',
            'TPD_36_ReadingTime' => 'required',
            'TPD_36_SittingBP' => 'required',
            'TPD_36_Pulse' => 'required',
            'TPD_36_Respiration' => 'required',
            'TPD_36_TakenBy' => 'required',

            'TPD_48_Date' => 'required',
            'TPD_48_ReadingTime' => 'required',
            'TPD_48_SittingBP' => 'required',
            'TPD_48_Pulse' => 'required',
            'TPD_48_Respiration' => 'required',
            'TPD_48_TakenBy' => 'required',
        ], $custom);

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
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Vital Signs!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            if($this->storeSP2($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Vital Signs!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            if($this->storeSP3($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Vital Signs!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            if($this->storeSP4($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 4 details for Vital Signs!');
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
            if($this->updateSP1($findPSS,$request)){
                return redirect(route('studySpecific.edit',$study_id))->with('success','You have successfully update the study period 1 details for Vital Signs!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 2){
            if($this->updateSP2($findPSS,$request)){
                return redirect(route('studySpecific.edit',$study_id))->with('success','You have successfully update the study period 2 details for Vital Signs!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 3){
            if($this->updateSP3($findPSS,$request)){
                return redirect(route('studySpecific.edit',$study_id))->with('success','You have successfully update the study period 3 details for Vital Signs!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 4){
            if($this->updateSP4($findPSS,$request)){
                return redirect(route('studySpecific.edit',$study_id))->with('success','You have successfully update the study period 4 details for Vital Signs!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.edit',$study_id));
        }
    }

    //store SP1_VitalSigns
    public function storeSP1($PSS,$request){
        if($PSS !=NULL && $PSS->SP1_ID != NULL){
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$PSS->SP1_ID)->first();
            $VitalSign = SP1_VitalSigns::where('SP1_VitalSign_ID', $findSP1->SP1_VitalSign)->first();

            if($VitalSign->TPD_1_Date == NULL){
                $flag=false;
                $data = $request->except('patient_id','studyPeriod','_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $VitalSign[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $VitalSign->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP2_VitalSigns
    public function storeSP2($PSS,$request){
        if($PSS !=NULL && $PSS->SP2_ID != NULL){
            //find admission table and update it
            $findSP2 = StudyPeriod2::where('SP2_ID',$PSS->SP2_ID)->first();
            $VitalSign = SP2_VitalSigns::where('SP2_VitalSign_ID', $findSP2->SP2_VitalSign)->first();

            if($VitalSign->TPD_1_Date == NULL){
                $flag=false;
                $data = $request->except('patient_id','studyPeriod','_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $VitalSign[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $VitalSign->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP3_VitalSigns
    public function storeSP3($PSS,$request){
        if($PSS !=NULL && $PSS->SP3_ID != NULL){
            //find admission table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID',$PSS->SP3_ID)->first();
            $VitalSign = SP3_VitalSigns::where('SP3_VitalSign_ID', $findSP3->SP3_VitalSign)->first();

            if($VitalSign->TPD_1_Date == NULL){
                $flag=false;
                $data = $request->except('patient_id','studyPeriod','_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $VitalSign[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $VitalSign->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP4_VitalSigns
    public function storeSP4($PSS,$request){
        if($PSS !=NULL && $PSS->SP4_ID != NULL){
            //find admission table and update it
            $findSP4 = StudyPeriod4::where('SP4_ID',$PSS->SP4_ID)->first();
            $VitalSign = SP4_VitalSigns::where('SP4_VitalSign_ID', $findSP4->SP4_VitalSign)->first();

            if($VitalSign->TPD_1_Date == NULL){
                $flag=false;
                $data = $request->except('patient_id','studyPeriod','_token','_method');
                foreach($data as $key=>$value){
                    if($value != NULL)
                    {
                        $VitalSign[$key]=$value;
                        $flag=true;
                    }
                }
                if($flag){
                    $VitalSign->save();
                }
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //update SP1_VitalSigns
    public function updateSP1($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$PSS->SP1_ID)->first();
            $VitalSign = SP1_VitalSigns::where('SP1_VitalSign_ID', $findSP1->SP1_VitalSign)->first();

            $flag=false;
            $data = $request->except('patient_id','studyPeriod','_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $VitalSign[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $VitalSign->save();
            }
            return true;
        }else{
            return false;
        }
    }

    //update SP2_VitalSigns
    public function updateSP2($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP2 = StudyPeriod2::where('SP2_ID',$PSS->SP2_ID)->first();
            $VitalSign = SP2_VitalSigns::where('SP2_VitalSign_ID', $findSP2->SP2_VitalSign)->first();

            $flag=false;
            $data = $request->except('patient_id','studyPeriod','_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $VitalSign[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $VitalSign->save();
            }
            return true;
        }else{
            return false;
        }
    }

    //update SP3_VitalSigns
    public function updateSP3($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID',$PSS->SP3_ID)->first();
            $VitalSign = SP3_VitalSigns::where('SP3_VitalSign_ID', $findSP3->SP3_VitalSign)->first();

            $flag=false;
            $data = $request->except('patient_id','studyPeriod','_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $VitalSign[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $VitalSign->save();
            }
            return true;
        }else{
            return false;
        }
    }

    //update SP4_VitalSigns
    public function updateSP4($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP4 = StudyPeriod4::where('SP4_ID',$PSS->SP4_ID)->first();
            $VitalSign = SP4_VitalSigns::where('SP4_VitalSign_ID', $findSP4->SP4_VitalSign)->first();

            $flag=false;
            $data = $request->except('patient_id','studyPeriod','_token','_method');
            foreach($data as $key=>$value){
                if($value != NULL)
                {
                    $VitalSign[$key]=$value;
                    $flag=true;
                }
            }
            if($flag){
                $VitalSign->save();
            }
            return true;
        }else{
            return false;
        }
    }

}
