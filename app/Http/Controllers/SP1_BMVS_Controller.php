<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_BMVS;
use App\StudyPeriod1;
use Illuminate\Http\Request;

class SP1_BMVS_Controller extends Controller
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
            //find SP1_ID to access the SP1_BMVS
            //find table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $findSP1_BMVS = SP1_BMVS::where('SP1_BMVS_ID',$findSP1->SP1_BMVS)->first();
            //custom messages load for validation
            $custom = [
                'dateTaken.required' => 'Please enter the date taken for body measurement vital signs',
                'timeTaken.required' => 'Please enter the time taken for body measurement vital signs',
                'weight.required' => 'Please enter the weight for body measurement vital signs',
                'height.required' => 'Please enter the height for body measurement vital signs',
                'Supine_ReadingTime.required' => 'Please enter the Supine Reading Time',
                'Supine_BP.required' => 'Please enter the Supine Blood Pressure',
                'Supine_HR.required' => 'Please enter the Supine Heart Rate',
                'Supine_RespiratoryRate.required' => 'Please enter the Supine Respiratory Rate',
                'Sitting_ReadingTime.required' => 'Please enter the Sitting Reading Time',
                'Sitting_BP.required' => 'Please enter the Sitting Blood Pressure',
                'Sitting_HR.required' => 'Please enter the Sitting Heart Rate',
                'Sitting_RespiratoryRate.required' => 'Please enter the Sitting Respiratory Rate',
                'Sitting_ReadingTime_Repeat1.required_if' => 'Please enter the Sitting Reading Time for the first repeated test',
                'Sitting_BP_Repeat1.required_if' => 'Please enter the Sitting Blood Pressure for the first repeated test',
                'Sitting_HR_Repeat1.required_if' => 'Please enter the Sitting Heart Rate for the first repeated test',
                'Sitting_RespiratoryRate_Repeat1.required_if' => 'Please enter the Sitting Respiratory Rate for the first repeated test',
                'Sitting_ReadingTime_Repeat2.required_if' => 'Please enter the Sitting Reading Time for the second repeated test',
                'Sitting_BP_Repeat2.required_if' => 'Please enter the Sitting Blood Pressure for the second repeated test',
                'Sitting_HR_Repeat2.required_if' => 'Please enter the Sitting Heart Rate for the second repeated test',
                'Sitting_RespiratoryRate_Repeat2.required_if' => 'Please enter the Sitting Respiratory Rate for the second repeated test',
                'Initial.required' => 'Initial of the physician’s is required',
            ];
            //validation for required fields
            $validatedData=$this->validate($request,[
                'dateTaken' => 'required',
                'timeTaken' => 'required',
                'weight' => 'required',
                'height' => 'required',
                'temperature' => 'required',
                'Supine_ReadingTime' => 'required',
                'Supine_BP' => 'required',
                'Supine_HR' => 'required',
                'Supine_RespiratoryRate' => 'required',
                'Sitting_ReadingTime' => 'required',
                'Sitting_BP' => 'required',
                'Sitting_HR' => 'required',
                'Sitting_RespiratoryRate' => 'required',
                'Sitting_ReadingTime_Repeat1' => 'required_if:SittingRepeat1,==,Sitting Repeated',
                'Sitting_BP_Repeat1' => 'required_if:SittingRepeat1,==,Sitting Repeated',
                'Sitting_HR_Repeat1' => 'required_if:SittingRepeat1,==,Others',
                'Sitting_RespiratoryRate_Repeat1' => 'required_if:SittingRepeat1,==,Sitting Repeated',
                'Sitting_ReadingTime_Repeat2' => 'required_if:SittingRepeat2,==,Sitting Repeated',
                'Sitting_BP_Repeat2' => 'required_if:SittingRepeat2,==,Sitting Repeated',
                'Sitting_HR_Repeat2' => 'required_if:SittingRepeat2,==,Sitting Repeated',
                'Sitting_RespiratoryRate_Repeat2' => 'required_if:SittingRepeat2,==,Sitting Repeated',
                'Initial' => 'required',
            ],$custom);

            //date, time, weight, height, bmi will be auto calculate, temperature
            $findSP1_BMVS->dateTaken=$request->dateTaken;
            $findSP1_BMVS->timeTaken=$request->timeTaken;
            $findSP1_BMVS->weight=$request->weight;
            $findSP1_BMVS->height=$request->height;

            if($request->height>0 && $request->weight>0) {

                $findSP1_BMVS->bmi = $this->calculateBMI($request->height,$request->weight);
            }else{
                $findSP1_BMVS->bmi=0;
            }

            $findSP1_BMVS->temperature=$request->temperature;
            //supine record
            $findSP1_BMVS->Supine_ReadingTime=$request->Supine_ReadingTime;
            $findSP1_BMVS->Supine_BP=$request->Supine_BP;
            $findSP1_BMVS->Supine_HR=$request->Supine_HR;
            $findSP1_BMVS->Supine_RespiratoryRate=$request->Supine_RespiratoryRate;
            //sitting record
            $findSP1_BMVS->Sitting_ReadingTime=$request->Sitting_ReadingTime;
            $findSP1_BMVS->Sitting_BP=$request->Sitting_BP;
            $findSP1_BMVS->Sitting_HR=$request->Sitting_HR;
            $findSP1_BMVS->Sitting_RespiratoryRate=$request->Sitting_RespiratoryRate;
            //first repeated sitting record
            $repeat1 = $request->SittingRepeat1;
            if($repeat1=='Sitting Repeated'){
                //if sitting is repeated for the first time
                $findSP1_BMVS->Sitting_ReadingTime_Repeat1=$request->Sitting_ReadingTime_Repeat1;
                $findSP1_BMVS->Sitting_BP_Repeat1=$request->Sitting_BP_Repeat1;
                $findSP1_BMVS->Sitting_HR_Repeat1=$request->Sitting_HR_Repeat1;
                $findSP1_BMVS->Sitting_RespiratoryRate_Repeat1=$request->Sitting_RespiratoryRate_Repeat1;
            }else{
                //if sitting is repeated is non
                $findSP1_BMVS->Sitting_ReadingTime_Repeat1=NULL;
                $findSP1_BMVS->Sitting_BP_Repeat1=NULL;
                $findSP1_BMVS->Sitting_HR_Repeat1=NULL;
                $findSP1_BMVS->Sitting_RespiratoryRate_Repeat1=NULL;
            }

            $repeat2 = $request->SittingRepeat2;
            if($repeat2=='Sitting Repeated'){
                //if sitting is repeated for the second time
                $findSP1_BMVS->Sitting_ReadingTime_Repeat2=$request->Sitting_ReadingTime_Repeat2;
                $findSP1_BMVS->Sitting_BP_Repeat2=$request->Sitting_BP_Repeat2;
                $findSP1_BMVS->Sitting_HR_Repeat2=$request->Sitting_HR_Repeat2;
                $findSP1_BMVS->Sitting_RespiratoryRate_Repeat2=$request->Sitting_RespiratoryRate_Repeat2;
            }else{
                //if sitting is repeated is non
                $findSP1_BMVS->Sitting_ReadingTime_Repeat2=NULL;
                $findSP1_BMVS->Sitting_BP_Repeat2=NULL;
                $findSP1_BMVS->Sitting_HR_Repeat2=NULL;
                $findSP1_BMVS->Sitting_RespiratoryRate_Repeat2=NULL;
            }
            //physician's initial
            $findSP1_BMVS->Initial=$request->Initial;

            $findSP1_BMVS->save();
            return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Body Measurement and Vital Signs!');
        }else{
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }

    }

    public function update(Request $request, $patient_id, $study_id){
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id',$patient_id)
            ->where('study_id',$study_id)
            ->first();

        if($findPSS !=NULL)
        {
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $BMVS= SP1_BMVS::where('SP1_BMVS_ID',$findSP1->SP1_BMVS)->first();
        }
        //date, time, weight, height, bmi will be auto calculate, temperature
        $BMVS->dateTaken=$request->dateTaken;
        $BMVS->timeTaken=$request->timeTaken;
        $BMVS->weight=$request->weight;
        $BMVS->height=$request->height;

        if($request->height>0 && $request->weight>0) {

            $BMVS->bmi = $this->calculateBMI($request->height,$request->weight);
        }else{
            $BMVS->bmi=0;
        }

        $BMVS->temperature=$request->temperature;
        //supine record
        $BMVS->Supine_ReadingTime=$request->Supine_ReadingTime;
        $BMVS->Supine_BP=$request->Supine_BP;
        $BMVS->Supine_HR=$request->Supine_HR;
        $BMVS->Supine_RespiratoryRate=$request->Supine_RespiratoryRate;
        //sitting record
        $BMVS->Sitting_ReadingTime=$request->Sitting_ReadingTime;
        $BMVS->Sitting_BP=$request->Sitting_BP;
        $BMVS->Sitting_HR=$request->Sitting_HR;
        $BMVS->Sitting_RespiratoryRate=$request->Sitting_RespiratoryRate;
        //first repeated sitting record
        $repeat1 = $request->SittingRepeat1;
        if($repeat1=='Sitting Repeated'){
            //if sitting is repeated for the first time
            $BMVS->Sitting_ReadingTime_Repeat1=$request->Sitting_ReadingTime_Repeat1;
            $BMVS->Sitting_BP_Repeat1=$request->Sitting_BP_Repeat1;
            $BMVS->Sitting_HR_Repeat1=$request->Sitting_HR_Repeat1;
            $BMVS->Sitting_RespiratoryRate_Repeat1=$request->Sitting_RespiratoryRate_Repeat1;
        }else{
            //if sitting is repeated is non
            $BMVS->Sitting_ReadingTime_Repeat1=NULL;
            $BMVS->Sitting_BP_Repeat1=NULL;
            $BMVS->Sitting_HR_Repeat1=NULL;
            $BMVS->Sitting_RespiratoryRate_Repeat1=NULL;
        }

        $repeat2 = $request->SittingRepeat2;
        if($repeat2=='Sitting Repeated'){
            //if sitting is repeated for the second time
            $BMVS->Sitting_ReadingTime_Repeat2=$request->Sitting_ReadingTime_Repeat2;
            $BMVS->Sitting_BP_Repeat2=$request->Sitting_BP_Repeat2;
            $BMVS->Sitting_HR_Repeat2=$request->Sitting_HR_Repeat2;
            $BMVS->Sitting_RespiratoryRate_Repeat2=$request->Sitting_RespiratoryRate_Repeat2;
        }else{
            //if sitting is repeated is non
            $BMVS->Sitting_ReadingTime_Repeat2=NULL;
            $BMVS->Sitting_BP_Repeat2=NULL;
            $BMVS->Sitting_HR_Repeat2=NULL;
            $BMVS->Sitting_RespiratoryRate_Repeat2=NULL;
        }
        //physician's initial
        $BMVS->Initial=$request->Initial;

        $BMVS->save();
        return redirect(route('studySpecific.admin'))->with('success','You updated the subject study period details for Body Measurement and Vital Signs!');
    }

    public function calculateBMI($height,$weight){
        $m_height=$height/100;
        $actual_height=$m_height*$m_height;
        $bmi=$weight/$actual_height;
        $final_bmi=number_format($bmi,1);
        return $final_bmi;
    }
}
