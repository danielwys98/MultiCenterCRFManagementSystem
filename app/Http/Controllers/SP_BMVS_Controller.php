<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_BMVS;
use App\SP2_BMVS;
use App\SP3_BMVS;
use App\SP4_BMVS;
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use Illuminate\Http\Request;

class SP_BMVS_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $study_id)
    {
        $PID = $request->patient_id;
        $study_period = $request->studyPeriod;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id', $PID)
                                        ->where('study_id', $study_id)
                                        ->first();
        //check study period and save
        if ($study_period == 1) {
            //SP1 query
            $SP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $PSS = $findPSS->SP1_ID;
            $BMVS = SP1_BMVS::where('SP1_BMVS_ID', $SP1->SP1_BMVS)->first();
            if($this->storeSP($findPSS,$PSS,$BMVS,$request)){
                return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Body Measurement and Vital Signs!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        } elseif ($study_period == 2) {
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $BMVS = SP2_BMVS::where('SP2_BMVS_ID', $SP2->SP2_BMVS)->first();
            if($this->storeSP($findPSS,$PSS,$BMVS,$request)){
                return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Body Measurement and Vital Signs!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        } elseif ($study_period == 3) {
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $BMVS = SP3_BMVS::where('SP3_BMVS_ID', $SP3->SP3_BMVS)->first();
            if($this->storeSP($findPSS,$PSS,$BMVS,$request)){
                return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Body Measurement and Vital Signs!');
            }else {
                alert()->error('Error!', 'You have already key the data for this subject!');
                return redirect(route('studySpecific.input', $study_id));
            }
        } elseif ($study_period == 4) {
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $BMVS = SP4_BMVS::where('SP4_BMVS_ID', $SP4->SP4_BMVS)->first();
            if($this->storeSP($findPSS,$PSS,$BMVS,$request)){
                return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Body Measurement and Vital Signs!');
            }else {
                alert()->error('Error!', 'You have already key the data for this subject!');
                return redirect(route('studySpecific.input', $study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.input',$study_id));
        }
    }

    public function update(Request $request, $patient_id, $study_id,$study_period)
    {
        $findPSS = PatientStudySpecific::where('patient_id', $patient_id)
            ->where('study_id', $study_id)
            ->first();
        {
        if ($study_period == 1) {
            //SP1 query
            $SP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $PSS = $findPSS->SP1_ID;
            $BMVS = SP1_BMVS::where('SP1_BMVS_ID', $SP1->SP1_BMVS)->first();
           if($this->updateSP($findPSS,$PSS,$BMVS,$request)){
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details for Body Measurement and Vital Signs!');
              }else{
                alert()->error('Error!','something wrong');
                return redirect(route('studySpecific.admin',$study_id));
            }
        } elseif ($study_period == 2) {
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $BMVS = SP2_BMVS::where('SP2_BMVS_ID', $SP2->SP2_BMVS)->first();
            if($this->updateSP($findPSS,$PSS,$BMVS,$request)){
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details for Body Measurement and Vital Signs!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        } elseif ($study_period == 3) {
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $BMVS = SP3_BMVS::where('SP3_BMVS_ID', $SP3->SP3_BMVS)->first();
            if($this->updateSP($findPSS,$PSS,$BMVS,$request)){
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details for Body Measurement and Vital Signs!');
            }else {
                alert()->error('Error!', 'You have already key the data for this subject!');
                return redirect(route('studySpecific.edit', $study_id));
            }
        } elseif ($study_period == 4) {
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $BMVS = SP4_BMVS::where('SP4_BMVS_ID', $SP4->SP4_BMVS)->first();
            if($this->updateSP($findPSS,$PSS,$BMVS,$request)){
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details for Body Measurement and Vital Signs!');
            }else {
                alert()->error('Error!', 'You have already key the data for this subject!');
                return redirect(route('studySpecific.edit', $study_id));
            }
        }else {
            alert()->error('Error!', 'You did not select the study period!');
            return redirect(route('studySpecific.edit', $study_id));
        }
        }
    }

    public function storeSP($findPSS,$PSS,$BMVS,$request){
        //custom messages load for validation
        $custom = [
            'dateTaken.required' => 'Please enter the date taken for body measurement vital signs',
            'timeTaken.required' => 'Please enter the time taken for body measurement vital signs',
            'weight.required' => 'Please enter the weight for body measurement vital signs',
            'height.required' => 'Please enter the height for body measurement vital signs',
            'Sitting_ReadingTime.required' => 'Please enter the Sitting Reading Time',
            'Sitting_BP_S.required' => 'Please enter the Systolic for Blood Pressure',
            'Sitting_BP_D.required' => 'Please enter the Diastolic for Blood Pressure',
            'Sitting_HR.required' => 'Please enter the Sitting Heart Rate',
            'Sitting_RespiratoryRate.required' => 'Please enter the Sitting Respiratory Rate',
            'Sitting_ReadingTime_Repeat1.required_if' => 'Please enter the Sitting Reading Time for the first repeated test',
            'Sitting_BP_S_Repeat1.required_if' => 'Please enter the Systolic for Blood Pressure for the first repeated test',
            'Sitting_BP_D_Repeat1.required_if' => 'Please enter the Diastolic for Blood Pressure for the first repeated test',
            'Sitting_HR_Repeat1.required_if' => 'Please enter the Sitting Heart Rate for the first repeated test',
            'Sitting_RespiratoryRate_Repeat1.required_if' => 'Please enter the Sitting Respiratory Rate for the first repeated test',
            'Sitting_ReadingTime_Repeat2.required_if' => 'Please enter the Sitting Reading Time for the second repeated test',
            'Sitting_BP_S_Repeat2.required_if' => 'Please enter the Systolic for Blood Pressure for the second repeated test',
            'Sitting_BP_D_Repeat2.required_if' => 'Please enter the Diastolic for Blood Pressure for the second repeated test',
            'Sitting_HR_Repeat2.required_if' => 'Please enter the Sitting Heart Rate for the second repeated test',
            'Sitting_RespiratoryRate_Repeat2.required_if' => 'Please enter the Sitting Respiratory Rate for the second repeated test',
            'Initial.required' => 'Initial of the physician’s is required',
        ];

        if ($findPSS != NULL && $PSS != NULL) {
            if ($BMVS->dateTaken == NULL) {
                //validation for required fields
                $validatedData = $this->validate($request, [
                    'dateTaken' => 'required',
                    'timeTaken' => 'required',
                    'weight' => 'required',
                    'height' => 'required',
                    'temperature' => 'required',
                    'Sitting_ReadingTime' => 'required',
                    'Sitting_BP_S' => 'required',
                    'Sitting_BP_D' => 'required',
                    'Sitting_HR' => 'required',
                    'Sitting_RespiratoryRate' => 'required',
                    'Sitting_ReadingTime_Repeat1' => 'required_if:SittingRepeat1,==,Sitting Repeated',
                    'Sitting_BP_S_Repeat1' => 'required_if:SittingRepeat1,==,Sitting Repeated',
                    'Sitting_BP_D_Repeat1' => 'required_if:SittingRepeat1,==,Sitting Repeated',
                    'Sitting_HR_Repeat1' => 'required_if:SittingRepeat1,==,Others',
                    'Sitting_RespiratoryRate_Repeat1' => 'required_if:SittingRepeat1,==,Sitting Repeated',
                    'Sitting_ReadingTime_Repeat2' => 'required_if:SittingRepeat2,==,Sitting Repeated',
                    'Sitting_BP_S_Repeat2' => 'required_if:SittingRepeat2,==,Sitting Repeated',
                    'Sitting_BP_D_Repeat2' => 'required_if:SittingRepeat2,==,Sitting Repeated',
                    'Sitting_HR_Repeat2' => 'required_if:SittingRepeat2,==,Sitting Repeated',
                    'Sitting_RespiratoryRate_Repeat2' => 'required_if:SittingRepeat2,==,Sitting Repeated',
                    'Initial' => 'required',
                ], $custom);
                //date, time, weight, height, bmi will be auto calculate, temperature
                $BMVS->dateTaken = $request->dateTaken;
                $BMVS->timeTaken = $request->timeTaken;
                $BMVS->weight = $request->weight;
                $BMVS->height = $request->height;
                if ($request->height > 0 && $request->weight > 0) {

                    $BMVS->bmi = $this->calculateBMI($request->height, $request->weight);
                } else {
                    $BMVS->bmi = 0;
                }
                $BMVS->temperature = $request->temperature;
                //sitting record
                $BMVS->Sitting_ReadingTime = $request->Sitting_ReadingTime;
                $BMVS->Sitting_BP_S = $request->Sitting_BP_S;
                $BMVS->Sitting_BP_D = $request->Sitting_BP_D;
                $BMVS->Sitting_HR = $request->Sitting_HR;
                $BMVS->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;
                //first repeated sitting record
                $repeat1 = $request->SittingRepeat1;
                if ($repeat1 == 'Sitting Repeated') {
                    //if sitting is repeated for the first time
                    $BMVS->Sitting_ReadingTime_Repeat1 = $request->Sitting_ReadingTime_Repeat1;
                    $BMVS->Sitting_BP_S_Repeat1 = $request->Sitting_BP_S_Repeat1;
                    $BMVS->Sitting_BP_D_Repeat1 = $request->Sitting_BP_D_Repeat1;
                    $BMVS->Sitting_HR_Repeat1 = $request->Sitting_HR_Repeat1;
                    $BMVS->Sitting_RespiratoryRate_Repeat1 = $request->Sitting_RespiratoryRate_Repeat1;
                } else {
                    //if sitting is repeated is non
                    $BMVS->Sitting_ReadingTime_Repeat1 = NULL;
                    $BMVS->Sitting_BP_S_Repeat1 = NULL;
                    $BMVS->Sitting_BP_D_Repeat1 = NULL;
                    $BMVS->Sitting_HR_Repeat1 = NULL;
                    $BMVS->Sitting_RespiratoryRate_Repeat1 = NULL;
                }
                //second repeated sitting record
                $repeat2 = $request->SittingRepeat2;
                if ($repeat2 == 'Sitting Repeated') {
                    //if sitting is repeated for the second time
                    $BMVS->Sitting_ReadingTime_Repeat2 = $request->Sitting_ReadingTime_Repeat2;
                    $BMVS->Sitting_BP_S_Repeat2 = $request->Sitting_BP_S_Repeat2;
                    $BMVS->Sitting_BP_D_Repeat2 = $request->_BP_D_Repeat2;
                    $BMVS->Sitting_HR_Repeat2 = $request->Sitting_HR_Repeat2;
                    $BMVS->Sitting_RespiratoryRate_Repeat2 = $request->Sitting_RespiratoryRate_Repeat2;
                } else {
                    //if sitting is repeated is non
                    $BMVS->Sitting_ReadingTime_Repeat2 = NULL;
                    $BMVS->Sitting_BP_S_Repeat2 = NULL;
                    $BMVS->Sitting_BP_D_Repeat2 = NULL;
                    $BMVS->Sitting_HR_Repeat2 = NULL;
                    $BMVS->Sitting_RespiratoryRate_Repeat2 = NULL;
                }
                //physician's initial
                $BMVS->Initial = $request->Initial;
                $BMVS->Comment=$request->Comment;

                $BMVS->save();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updateSP($findPSS,$PSS,$BMVS,$request){

        //date, time, weight, height, bmi will be auto calculate, temperature
        if ($findPSS != NULL) {

            $BMVS->dateTaken = $request->dateTaken;
            $BMVS->timeTaken = $request->timeTaken;
            $BMVS->weight = $request->weight;
            $BMVS->height = $request->height;
            if ($request->height > 0 && $request->weight > 0) {

                $BMVS->bmi = $this->calculateBMI($request->height, $request->weight);
            } else {
                $BMVS->bmi = 0;
            }
            $BMVS->temperature = $request->temperature;
            //sitting record
            $BMVS->Sitting_ReadingTime = $request->Sitting_ReadingTime;
            $BMVS->Sitting_BP_S = $request->Sitting_BP_S;
            $BMVS->Sitting_BP_D = $request->Sitting_BP_D;
            $BMVS->Sitting_HR = $request->Sitting_HR;
            $BMVS->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;
            //first repeated sitting record
            $repeat1 = $request->SittingRepeat1;
            if ($repeat1 == 'Sitting Repeated') {
                //if sitting is repeated for the first time
                $BMVS->Sitting_ReadingTime_Repeat1 = $request->Sitting_ReadingTime_Repeat1;
                $BMVS->Sitting_BP_S_Repeat1 = $request->Sitting_BP_S_Repeat1;
                $BMVS->Sitting_BP_D_Repeat1 = $request->Sitting_BP_D_Repeat1;
                $BMVS->Sitting_HR_Repeat1 = $request->Sitting_HR_Repeat1;
                $BMVS->Sitting_RespiratoryRate_Repeat1 = $request->Sitting_RespiratoryRate_Repeat1;
            } else {
                //if sitting is repeated is non
                $BMVS->Sitting_ReadingTime_Repeat1 = NULL;
                $BMVS->Sitting_BP_S_Repeat1 = NULL;
                $BMVS->Sitting_BP_D_Repeat1 = NULL;
                $BMVS->Sitting_HR_Repeat1 = NULL;
                $BMVS->Sitting_RespiratoryRate_Repeat1 = NULL;
            }
            //second repeated sitting record
            $repeat2 = $request->SittingRepeat2;
            if ($repeat2 == 'Sitting Repeated') {
                //if sitting is repeated for the second time
                $BMVS->Sitting_ReadingTime_Repeat2 = $request->Sitting_ReadingTime_Repeat2;
                $BMVS->Sitting_BP_S_Repeat2 = $request->Sitting_BP_S_Repeat2;
                $BMVS->Sitting_BP_D_Repeat2 = $request->_BP_D_Repeat2;
                $BMVS->Sitting_HR_Repeat2 = $request->Sitting_HR_Repeat2;
                $BMVS->Sitting_RespiratoryRate_Repeat2 = $request->Sitting_RespiratoryRate_Repeat2;
            } else {
                //if sitting is repeated is non
                $BMVS->Sitting_ReadingTime_Repeat2 = NULL;
                $BMVS->Sitting_BP_S_Repeat2 = NULL;
                $BMVS->Sitting_BP_D_Repeat2 = NULL;
                $BMVS->Sitting_HR_Repeat2 = NULL;
                $BMVS->Sitting_RespiratoryRate_Repeat2 = NULL;
            }
            //physician's initial
            $BMVS->Initial = $request->Initial;
            $BMVS->Comment=$request->Comment;

            $BMVS->save();
            return true;
        }else{
            return false;
        }
    }
    public function calculateBMI($height, $weight)
    {
        $m_height = $height / 100;
        $actual_height = $m_height * $m_height;
        $bmi = $weight / $actual_height;
        $final_bmi = number_format($bmi, 1);
        return $final_bmi;
    }
}
