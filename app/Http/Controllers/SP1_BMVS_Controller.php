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

class SP1_BMVS_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request, $study_id)
    {

        $PID = $request->patient_id;

        $study_period = $request->studyPeriod;

        //custom messages load for validation
        $custom = [
            'dateTaken.required' => 'Please enter the date taken for body measurement vital signs',
            'timeTaken.required' => 'Please enter the time taken for body measurement vital signs',
            'weight.required' => 'Please enter the weight for body measurement vital signs',
            'height.required' => 'Please enter the height for body measurement vital signs',/*
            'Supine_ReadingTime.required' => 'Please enter the Supine Reading Time',
            'Supine_BP.required' => 'Please enter the Supine Blood Pressure',
            'Supine_HR.required' => 'Please enter the Supine Heart Rate',
            'Supine_RespiratoryRate.required' => 'Please enter the Supine Respiratory Rate',*/
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
        $validatedData = $this->validate($request, [
            'dateTaken' => 'required',
            'timeTaken' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'temperature' => 'required',/*
            'Supine_ReadingTime' => 'required',
            'Supine_BP' => 'required',
            'Supine_HR' => 'required',
            'Supine_RespiratoryRate' => 'required',*/
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
        ], $custom);

        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id', $PID)
            ->where('study_id', $study_id)
            ->first();

        if ($study_period == '---') {
            alert()->error('Error!', 'This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input', $study_id));

        } elseif ($study_period == 1) {
            if($this->storeSP1($findPSS,$request)){
                return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Body Measurement and Vital Signs!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        } elseif ($study_period == 2) {
            if($this->storeSP2($findPSS,$request)){
                return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Body Measurement and Vital Signs!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        } elseif ($study_period == 3) {
            if($this->storeSP3($findPSS,$request)){
                return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Body Measurement and Vital Signs!');
            }else {
                alert()->error('Error!', 'You have already key the data for this subject!');
                return redirect(route('studySpecific.input', $study_id));
            }
        } elseif ($study_period == 4) {
            if($this->storeSP4($findPSS,$request)){
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
        if ($study_period == 1) {
            if($this->updateSP1($findPSS,$request)){
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details for Body Measurement and Vital Signs!');
              }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        } elseif ($study_period == 2) {
            if($this->updateSP2($findPSS,$request)){
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details for Body Measurement and Vital Signs!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        } elseif ($study_period == 3) {
            if($this->updateSP3($findPSS,$request)){
                return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details for Body Measurement and Vital Signs!');
            }else {
                alert()->error('Error!', 'You have already key the data for this subject!');
                return redirect(route('studySpecific.edit', $study_id));
            }
        } elseif ($study_period == 4) {
            if($this->updateSP4($findPSS,$request)){
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

    public function updateSP1($findPSS, $request){
        if ($findPSS != NULL) {
            $findSP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
            $BMVS = SP1_BMVS::where('SP1_BMVS_ID', $findSP1->SP1_BMVS)->first();
        }
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
        //supine record
        $BMVS->Supine_ReadingTime = $request->Supine_ReadingTime;
        $BMVS->Supine_BP = $request->Supine_BP;
        $BMVS->Supine_HR = $request->Supine_HR;
        $BMVS->Supine_RespiratoryRate = $request->Supine_RespiratoryRate;
        //sitting record
        $BMVS->Sitting_ReadingTime = $request->Sitting_ReadingTime;
        $BMVS->Sitting_BP = $request->Sitting_BP;
        $BMVS->Sitting_HR = $request->Sitting_HR;
        $BMVS->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;
        //first repeated sitting record
        $repeat1 = $request->SittingRepeat1;
        if ($repeat1 == 'Sitting Repeated') {
            //if sitting is repeated for the first time
            $BMVS->Sitting_ReadingTime_Repeat1 = $request->Sitting_ReadingTime_Repeat1;
            $BMVS->Sitting_BP_Repeat1 = $request->Sitting_BP_Repeat1;
            $BMVS->Sitting_HR_Repeat1 = $request->Sitting_HR_Repeat1;
            $BMVS->Sitting_RespiratoryRate_Repeat1 = $request->Sitting_RespiratoryRate_Repeat1;
        } else {
            //if sitting is repeated is non
            $BMVS->Sitting_ReadingTime_Repeat1 = NULL;
            $BMVS->Sitting_BP_Repeat1 = NULL;
            $BMVS->Sitting_HR_Repeat1 = NULL;
            $BMVS->Sitting_RespiratoryRate_Repeat1 = NULL;
        }

        $repeat2 = $request->SittingRepeat2;
        if ($repeat2 == 'Sitting Repeated') {
            //if sitting is repeated for the second time
            $BMVS->Sitting_ReadingTime_Repeat2 = $request->Sitting_ReadingTime_Repeat2;
            $BMVS->Sitting_BP_Repeat2 = $request->Sitting_BP_Repeat2;
            $BMVS->Sitting_HR_Repeat2 = $request->Sitting_HR_Repeat2;
            $BMVS->Sitting_RespiratoryRate_Repeat2 = $request->Sitting_RespiratoryRate_Repeat2;
        } else {
            //if sitting is repeated is non
            $BMVS->Sitting_ReadingTime_Repeat2 = NULL;
            $BMVS->Sitting_BP_Repeat2 = NULL;
            $BMVS->Sitting_HR_Repeat2 = NULL;
            $BMVS->Sitting_RespiratoryRate_Repeat2 = NULL;
        }
        //physician's initial
        $BMVS->Initial = $request->Initial;

        $BMVS->save();
        return true;
    }

    public function updateSP2($findPSS, $request)
    {
        if ($findPSS != NULL) {
            $findSP2 = StudyPeriod2::where('SP2_ID', $findPSS->SP2_ID)->first();
            $BMVS = SP2_BMVS::where('SP2_BMVS_ID', $findSP2->SP2_BMVS)->first();
        }
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
        //supine record
        $BMVS->Supine_ReadingTime = $request->Supine_ReadingTime;
        $BMVS->Supine_BP = $request->Supine_BP;
        $BMVS->Supine_HR = $request->Supine_HR;
        $BMVS->Supine_RespiratoryRate = $request->Supine_RespiratoryRate;
        //sitting record
        $BMVS->Sitting_ReadingTime = $request->Sitting_ReadingTime;
        $BMVS->Sitting_BP = $request->Sitting_BP;
        $BMVS->Sitting_HR = $request->Sitting_HR;
        $BMVS->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;
        //first repeated sitting record
        $repeat1 = $request->SittingRepeat1;
        if ($repeat1 == 'Sitting Repeated') {
            //if sitting is repeated for the first time
            $BMVS->Sitting_ReadingTime_Repeat1 = $request->Sitting_ReadingTime_Repeat1;
            $BMVS->Sitting_BP_Repeat1 = $request->Sitting_BP_Repeat1;
            $BMVS->Sitting_HR_Repeat1 = $request->Sitting_HR_Repeat1;
            $BMVS->Sitting_RespiratoryRate_Repeat1 = $request->Sitting_RespiratoryRate_Repeat1;
        } else {
            //if sitting is repeated is non
            $BMVS->Sitting_ReadingTime_Repeat1 = NULL;
            $BMVS->Sitting_BP_Repeat1 = NULL;
            $BMVS->Sitting_HR_Repeat1 = NULL;
            $BMVS->Sitting_RespiratoryRate_Repeat1 = NULL;
        }

        $repeat2 = $request->SittingRepeat2;
        if ($repeat2 == 'Sitting Repeated') {
            //if sitting is repeated for the second time
            $BMVS->Sitting_ReadingTime_Repeat2 = $request->Sitting_ReadingTime_Repeat2;
            $BMVS->Sitting_BP_Repeat2 = $request->Sitting_BP_Repeat2;
            $BMVS->Sitting_HR_Repeat2 = $request->Sitting_HR_Repeat2;
            $BMVS->Sitting_RespiratoryRate_Repeat2 = $request->Sitting_RespiratoryRate_Repeat2;
        } else {
            //if sitting is repeated is non
            $BMVS->Sitting_ReadingTime_Repeat2 = NULL;
            $BMVS->Sitting_BP_Repeat2 = NULL;
            $BMVS->Sitting_HR_Repeat2 = NULL;
            $BMVS->Sitting_RespiratoryRate_Repeat2 = NULL;
        }
        //physician's initial
        $BMVS->Initial = $request->Initial;

        $BMVS->save();
        return true;
    }

    public function updateSP3($findPSS, $request)
    {
        if ($findPSS != NULL) {
            $findSP3 = StudyPeriod3::where('SP3_ID', $findPSS->SP3_ID)->first();
            $BMVS = SP3_BMVS::where('SP3_BMVS_ID', $findSP3->SP3_BMVS)->first();
        }
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
        //supine record
        $BMVS->Supine_ReadingTime = $request->Supine_ReadingTime;
        $BMVS->Supine_BP = $request->Supine_BP;
        $BMVS->Supine_HR = $request->Supine_HR;
        $BMVS->Supine_RespiratoryRate = $request->Supine_RespiratoryRate;
        //sitting record
        $BMVS->Sitting_ReadingTime = $request->Sitting_ReadingTime;
        $BMVS->Sitting_BP = $request->Sitting_BP;
        $BMVS->Sitting_HR = $request->Sitting_HR;
        $BMVS->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;
        //first repeated sitting record
        $repeat1 = $request->SittingRepeat1;
        if ($repeat1 == 'Sitting Repeated') {
            //if sitting is repeated for the first time
            $BMVS->Sitting_ReadingTime_Repeat1 = $request->Sitting_ReadingTime_Repeat1;
            $BMVS->Sitting_BP_Repeat1 = $request->Sitting_BP_Repeat1;
            $BMVS->Sitting_HR_Repeat1 = $request->Sitting_HR_Repeat1;
            $BMVS->Sitting_RespiratoryRate_Repeat1 = $request->Sitting_RespiratoryRate_Repeat1;
        } else {
            //if sitting is repeated is non
            $BMVS->Sitting_ReadingTime_Repeat1 = NULL;
            $BMVS->Sitting_BP_Repeat1 = NULL;
            $BMVS->Sitting_HR_Repeat1 = NULL;
            $BMVS->Sitting_RespiratoryRate_Repeat1 = NULL;
        }

        $repeat2 = $request->SittingRepeat2;
        if ($repeat2 == 'Sitting Repeated') {
            //if sitting is repeated for the second time
            $BMVS->Sitting_ReadingTime_Repeat2 = $request->Sitting_ReadingTime_Repeat2;
            $BMVS->Sitting_BP_Repeat2 = $request->Sitting_BP_Repeat2;
            $BMVS->Sitting_HR_Repeat2 = $request->Sitting_HR_Repeat2;
            $BMVS->Sitting_RespiratoryRate_Repeat2 = $request->Sitting_RespiratoryRate_Repeat2;
        } else {
            //if sitting is repeated is non
            $BMVS->Sitting_ReadingTime_Repeat2 = NULL;
            $BMVS->Sitting_BP_Repeat2 = NULL;
            $BMVS->Sitting_HR_Repeat2 = NULL;
            $BMVS->Sitting_RespiratoryRate_Repeat2 = NULL;
        }
        //physician's initial
        $BMVS->Initial = $request->Initial;

        $BMVS->save();
        return true;
    }

    public function updateSP4($findPSS, $request)
    {
        if ($findPSS != NULL) {
            $findSP4 = StudyPeriod4::where('SP4_ID', $findPSS->SP4_ID)->first();
            $BMVS = SP4_BMVS::where('SP4_BMVS_ID', $findSP4->SP4_BMVS)->first();
        }
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
        //supine record
        $BMVS->Supine_ReadingTime = $request->Supine_ReadingTime;
        $BMVS->Supine_BP = $request->Supine_BP;
        $BMVS->Supine_HR = $request->Supine_HR;
        $BMVS->Supine_RespiratoryRate = $request->Supine_RespiratoryRate;
        //sitting record
        $BMVS->Sitting_ReadingTime = $request->Sitting_ReadingTime;
        $BMVS->Sitting_BP = $request->Sitting_BP;
        $BMVS->Sitting_HR = $request->Sitting_HR;
        $BMVS->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;
        //first repeated sitting record
        $repeat1 = $request->SittingRepeat1;
        if ($repeat1 == 'Sitting Repeated') {
            //if sitting is repeated for the first time
            $BMVS->Sitting_ReadingTime_Repeat1 = $request->Sitting_ReadingTime_Repeat1;
            $BMVS->Sitting_BP_Repeat1 = $request->Sitting_BP_Repeat1;
            $BMVS->Sitting_HR_Repeat1 = $request->Sitting_HR_Repeat1;
            $BMVS->Sitting_RespiratoryRate_Repeat1 = $request->Sitting_RespiratoryRate_Repeat1;
        } else {
            //if sitting is repeated is non
            $BMVS->Sitting_ReadingTime_Repeat1 = NULL;
            $BMVS->Sitting_BP_Repeat1 = NULL;
            $BMVS->Sitting_HR_Repeat1 = NULL;
            $BMVS->Sitting_RespiratoryRate_Repeat1 = NULL;
        }

        $repeat2 = $request->SittingRepeat2;
        if ($repeat2 == 'Sitting Repeated') {
            //if sitting is repeated for the second time
            $BMVS->Sitting_ReadingTime_Repeat2 = $request->Sitting_ReadingTime_Repeat2;
            $BMVS->Sitting_BP_Repeat2 = $request->Sitting_BP_Repeat2;
            $BMVS->Sitting_HR_Repeat2 = $request->Sitting_HR_Repeat2;
            $BMVS->Sitting_RespiratoryRate_Repeat2 = $request->Sitting_RespiratoryRate_Repeat2;
        } else {
            //if sitting is repeated is non
            $BMVS->Sitting_ReadingTime_Repeat2 = NULL;
            $BMVS->Sitting_BP_Repeat2 = NULL;
            $BMVS->Sitting_HR_Repeat2 = NULL;
            $BMVS->Sitting_RespiratoryRate_Repeat2 = NULL;
        }
        //physician's initial
        $BMVS->Initial = $request->Initial;

        $BMVS->save();
        return true;
    }

    public function storeSP1($findPSS, $request)
    {
        if ($findPSS != NULL && $findPSS->SP1_ID != NULL) {
            //find SP1_ID to access the SP1_BMVS
            //find table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
            $findSP1_BMVS = SP1_BMVS::where('SP1_BMVS_ID', $findSP1->SP1_BMVS)->first();


            if ($findSP1_BMVS->dateTaken == NULL) {
                //date, time, weight, height, bmi will be auto calculate, temperature
                $findSP1_BMVS->dateTaken = $request->dateTaken;
                $findSP1_BMVS->timeTaken = $request->timeTaken;
                $findSP1_BMVS->weight = $request->weight;
                $findSP1_BMVS->height = $request->height;

                if ($request->height > 0 && $request->weight > 0) {

                    $findSP1_BMVS->bmi = $this->calculateBMI($request->height, $request->weight);
                } else {
                    $findSP1_BMVS->bmi = 0;
                }

                $findSP1_BMVS->temperature = $request->temperature;
                //supine record
                $findSP1_BMVS->Supine_ReadingTime = $request->Supine_ReadingTime;
                $findSP1_BMVS->Supine_BP = $request->Supine_BP;
                $findSP1_BMVS->Supine_HR = $request->Supine_HR;
                $findSP1_BMVS->Supine_RespiratoryRate = $request->Supine_RespiratoryRate;
                //sitting record
                $findSP1_BMVS->Sitting_ReadingTime = $request->Sitting_ReadingTime;
                $findSP1_BMVS->Sitting_BP = $request->Sitting_BP;
                $findSP1_BMVS->Sitting_HR = $request->Sitting_HR;
                $findSP1_BMVS->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;
                //first repeated sitting record
                $repeat1 = $request->SittingRepeat1;
                if ($repeat1 == 'Sitting Repeated') {
                    //if sitting is repeated for the first time
                    $findSP1_BMVS->Sitting_ReadingTime_Repeat1 = $request->Sitting_ReadingTime_Repeat1;
                    $findSP1_BMVS->Sitting_BP_Repeat1 = $request->Sitting_BP_Repeat1;
                    $findSP1_BMVS->Sitting_HR_Repeat1 = $request->Sitting_HR_Repeat1;
                    $findSP1_BMVS->Sitting_RespiratoryRate_Repeat1 = $request->Sitting_RespiratoryRate_Repeat1;
                } else {
                    //if sitting is repeated is non
                    $findSP1_BMVS->Sitting_ReadingTime_Repeat1 = NULL;
                    $findSP1_BMVS->Sitting_BP_Repeat1 = NULL;
                    $findSP1_BMVS->Sitting_HR_Repeat1 = NULL;
                    $findSP1_BMVS->Sitting_RespiratoryRate_Repeat1 = NULL;
                }

                $repeat2 = $request->SittingRepeat2;
                if ($repeat2 == 'Sitting Repeated') {
                    //if sitting is repeated for the second time
                    $findSP1_BMVS->Sitting_ReadingTime_Repeat2 = $request->Sitting_ReadingTime_Repeat2;
                    $findSP1_BMVS->Sitting_BP_Repeat2 = $request->Sitting_BP_Repeat2;
                    $findSP1_BMVS->Sitting_HR_Repeat2 = $request->Sitting_HR_Repeat2;
                    $findSP1_BMVS->Sitting_RespiratoryRate_Repeat2 = $request->Sitting_RespiratoryRate_Repeat2;
                } else {
                    //if sitting is repeated is non
                    $findSP1_BMVS->Sitting_ReadingTime_Repeat2 = NULL;
                    $findSP1_BMVS->Sitting_BP_Repeat2 = NULL;
                    $findSP1_BMVS->Sitting_HR_Repeat2 = NULL;
                    $findSP1_BMVS->Sitting_RespiratoryRate_Repeat2 = NULL;
                }
                //physician's initial
                $findSP1_BMVS->Initial = $request->Initial;

                $findSP1_BMVS->save();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function storeSP2($findPSS, $request){
        if ($findPSS != NULL && $findPSS->SP2_ID != NULL) {
            //find SP2_ID to access the SP2_BMVS
            $findSP2 = StudyPeriod2::where('SP2_ID', $findPSS->SP2_ID)->first();
            $findSP2_BMVS = SP2_BMVS::where('SP2_BMVS_ID', $findSP2->SP2_BMVS)->first();


            if ($findSP2_BMVS->dateTaken == NULL) {
                //date, time, weight, height, bmi will be auto calculate, temperature
                $findSP2_BMVS->dateTaken = $request->dateTaken;
                $findSP2_BMVS->timeTaken = $request->timeTaken;
                $findSP2_BMVS->weight = $request->weight;
                $findSP2_BMVS->height = $request->height;

                if ($request->height > 0 && $request->weight > 0) {

                    $findSP2_BMVS->bmi = $this->calculateBMI($request->height, $request->weight);
                } else {
                    $findSP2_BMVS->bmi = 0;
                }

                $findSP2_BMVS->temperature = $request->temperature;
                //supine record
                $findSP2_BMVS->Supine_ReadingTime = $request->Supine_ReadingTime;
                $findSP2_BMVS->Supine_BP = $request->Supine_BP;
                $findSP2_BMVS->Supine_HR = $request->Supine_HR;
                $findSP2_BMVS->Supine_RespiratoryRate = $request->Supine_RespiratoryRate;
                //sitting record
                $findSP2_BMVS->Sitting_ReadingTime = $request->Sitting_ReadingTime;
                $findSP2_BMVS->Sitting_BP = $request->Sitting_BP;
                $findSP2_BMVS->Sitting_HR = $request->Sitting_HR;
                $findSP2_BMVS->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;
                //first repeated sitting record
                $repeat1 = $request->SittingRepeat1;
                if ($repeat1 == 'Sitting Repeated') {
                    //if sitting is repeated for the first time
                    $findSP2_BMVS->Sitting_ReadingTime_Repeat1 = $request->Sitting_ReadingTime_Repeat1;
                    $findSP2_BMVS->Sitting_BP_Repeat1 = $request->Sitting_BP_Repeat1;
                    $findSP2_BMVS->Sitting_HR_Repeat1 = $request->Sitting_HR_Repeat1;
                    $findSP2_BMVS->Sitting_RespiratoryRate_Repeat1 = $request->Sitting_RespiratoryRate_Repeat1;
                } else {
                    //if sitting is repeated is non
                    $findSP2_BMVS->Sitting_ReadingTime_Repeat1 = NULL;
                    $findSP2_BMVS->Sitting_BP_Repeat1 = NULL;
                    $findSP2_BMVS->Sitting_HR_Repeat1 = NULL;
                    $findSP2_BMVS->Sitting_RespiratoryRate_Repeat1 = NULL;
                }

                $repeat2 = $request->SittingRepeat2;
                if ($repeat2 == 'Sitting Repeated') {
                    //if sitting is repeated for the second time
                    $findSP2_BMVS->Sitting_ReadingTime_Repeat2 = $request->Sitting_ReadingTime_Repeat2;
                    $findSP2_BMVS->Sitting_BP_Repeat2 = $request->Sitting_BP_Repeat2;
                    $findSP2_BMVS->Sitting_HR_Repeat2 = $request->Sitting_HR_Repeat2;
                    $findSP2_BMVS->Sitting_RespiratoryRate_Repeat2 = $request->Sitting_RespiratoryRate_Repeat2;
                } else {
                    //if sitting is repeated is non
                    $findSP2_BMVS->Sitting_ReadingTime_Repeat2 = NULL;
                    $findSP2_BMVS->Sitting_BP_Repeat2 = NULL;
                    $findSP2_BMVS->Sitting_HR_Repeat2 = NULL;
                    $findSP2_BMVS->Sitting_RespiratoryRate_Repeat2 = NULL;
                }
                //physician's initial
                $findSP2_BMVS->Initial = $request->Initial;

                $findSP2_BMVS->save();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function storeSP3($findPSS,$request){
        if ($findPSS != NULL && $findPSS->SP3_ID != NULL) {
            //find SP1_ID to access the SP1_BMVS
            //find table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID', $findPSS->SP3_ID)->first();
            $findSP3_BMVS = SP3_BMVS::where('SP3_BMVS_ID', $findSP3->SP3_BMVS)->first();


            if ($findSP3_BMVS->dateTaken == NULL) {
                //date, time, weight, height, bmi will be auto calculate, temperature
                $findSP3_BMVS->dateTaken = $request->dateTaken;
                $findSP3_BMVS->timeTaken = $request->timeTaken;
                $findSP3_BMVS->weight = $request->weight;
                $findSP3_BMVS->height = $request->height;

                if ($request->height > 0 && $request->weight > 0) {

                    $findSP3_BMVS->bmi = $this->calculateBMI($request->height, $request->weight);
                } else {
                    $findSP3_BMVS->bmi = 0;
                }

                $findSP3_BMVS->temperature = $request->temperature;
                //supine record
                $findSP3_BMVS->Supine_ReadingTime = $request->Supine_ReadingTime;
                $findSP3_BMVS->Supine_BP = $request->Supine_BP;
                $findSP3_BMVS->Supine_HR = $request->Supine_HR;
                $findSP3_BMVS->Supine_RespiratoryRate = $request->Supine_RespiratoryRate;
                //sitting record
                $findSP3_BMVS->Sitting_ReadingTime = $request->Sitting_ReadingTime;
                $findSP3_BMVS->Sitting_BP = $request->Sitting_BP;
                $findSP3_BMVS->Sitting_HR = $request->Sitting_HR;
                $findSP3_BMVS->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;
                //first repeated sitting record
                $repeat1 = $request->SittingRepeat1;
                if ($repeat1 == 'Sitting Repeated') {
                    //if sitting is repeated for the first time
                    $findSP3_BMVS->Sitting_ReadingTime_Repeat1 = $request->Sitting_ReadingTime_Repeat1;
                    $findSP3_BMVS->Sitting_BP_Repeat1 = $request->Sitting_BP_Repeat1;
                    $findSP3_BMVS->Sitting_HR_Repeat1 = $request->Sitting_HR_Repeat1;
                    $findSP3_BMVS->Sitting_RespiratoryRate_Repeat1 = $request->Sitting_RespiratoryRate_Repeat1;
                } else {
                    //if sitting is repeated is non
                    $findSP3_BMVS->Sitting_ReadingTime_Repeat1 = NULL;
                    $findSP3_BMVS->Sitting_BP_Repeat1 = NULL;
                    $findSP3_BMVS->Sitting_HR_Repeat1 = NULL;
                    $findSP3_BMVS->Sitting_RespiratoryRate_Repeat1 = NULL;
                }

                $repeat2 = $request->SittingRepeat2;
                if ($repeat2 == 'Sitting Repeated') {
                    //if sitting is repeated for the second time
                    $findSP3_BMVS->Sitting_ReadingTime_Repeat2 = $request->Sitting_ReadingTime_Repeat2;
                    $findSP3_BMVS->Sitting_BP_Repeat2 = $request->Sitting_BP_Repeat2;
                    $findSP3_BMVS->Sitting_HR_Repeat2 = $request->Sitting_HR_Repeat2;
                    $findSP3_BMVS->Sitting_RespiratoryRate_Repeat2 = $request->Sitting_RespiratoryRate_Repeat2;
                } else {
                    //if sitting is repeated is non
                    $findSP3_BMVS->Sitting_ReadingTime_Repeat2 = NULL;
                    $findSP3_BMVS->Sitting_BP_Repeat2 = NULL;
                    $findSP3_BMVS->Sitting_HR_Repeat2 = NULL;
                    $findSP3_BMVS->Sitting_RespiratoryRate_Repeat2 = NULL;
                }
                //physician's initial
                $findSP3_BMVS->Initial = $request->Initial;

                $findSP3_BMVS->save();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function storeSP4($findPSS,$request){
        if ($findPSS != NULL && $findPSS->SP4_ID != NULL) {
            //find SP1_ID to access the SP1_BMVS
            //find table and update it
            $findSP4 = StudyPeriod4::where('SP4_ID', $findPSS->SP4_ID)->first();
            $findSP4_BMVS = SP4_BMVS::where('SP4_BMVS_ID', $findSP4->SP4_BMVS)->first();


            if ($findSP4_BMVS->dateTaken == NULL) {
                //date, time, weight, height, bmi will be auto calculate, temperature
                $findSP4_BMVS->dateTaken = $request->dateTaken;
                $findSP4_BMVS->timeTaken = $request->timeTaken;
                $findSP4_BMVS->weight = $request->weight;
                $findSP4_BMVS->height = $request->height;

                if ($request->height > 0 && $request->weight > 0) {

                    $findSP4_BMVS->bmi = $this->calculateBMI($request->height, $request->weight);
                } else {
                    $findSP4_BMVS->bmi = 0;
                }

                $findSP4_BMVS->temperature = $request->temperature;
                //supine record
                $findSP4_BMVS->Supine_ReadingTime = $request->Supine_ReadingTime;
                $findSP4_BMVS->Supine_BP = $request->Supine_BP;
                $findSP4_BMVS->Supine_HR = $request->Supine_HR;
                $findSP4_BMVS->Supine_RespiratoryRate = $request->Supine_RespiratoryRate;
                //sitting record
                $findSP4_BMVS->Sitting_ReadingTime = $request->Sitting_ReadingTime;
                $findSP4_BMVS->Sitting_BP = $request->Sitting_BP;
                $findSP4_BMVS->Sitting_HR = $request->Sitting_HR;
                $findSP4_BMVS->Sitting_RespiratoryRate = $request->Sitting_RespiratoryRate;
                //first repeated sitting record
                $repeat1 = $request->SittingRepeat1;
                if ($repeat1 == 'Sitting Repeated') {
                    //if sitting is repeated for the first time
                    $findSP4_BMVS->Sitting_ReadingTime_Repeat1 = $request->Sitting_ReadingTime_Repeat1;
                    $findSP4_BMVS->Sitting_BP_Repeat1 = $request->Sitting_BP_Repeat1;
                    $findSP4_BMVS->Sitting_HR_Repeat1 = $request->Sitting_HR_Repeat1;
                    $findSP4_BMVS->Sitting_RespiratoryRate_Repeat1 = $request->Sitting_RespiratoryRate_Repeat1;
                } else {
                    //if sitting is repeated is non
                    $findSP4_BMVS->Sitting_ReadingTime_Repeat1 = NULL;
                    $findSP4_BMVS->Sitting_BP_Repeat1 = NULL;
                    $findSP4_BMVS->Sitting_HR_Repeat1 = NULL;
                    $findSP4_BMVS->Sitting_RespiratoryRate_Repeat1 = NULL;
                }

                $repeat2 = $request->SittingRepeat2;
                if ($repeat2 == 'Sitting Repeated') {
                    //if sitting is repeated for the second time
                    $findSP4_BMVS->Sitting_ReadingTime_Repeat2 = $request->Sitting_ReadingTime_Repeat2;
                    $findSP4_BMVS->Sitting_BP_Repeat2 = $request->Sitting_BP_Repeat2;
                    $findSP4_BMVS->Sitting_HR_Repeat2 = $request->Sitting_HR_Repeat2;
                    $findSP4_BMVS->Sitting_RespiratoryRate_Repeat2 = $request->Sitting_RespiratoryRate_Repeat2;
                } else {
                    //if sitting is repeated is non
                    $findSP4_BMVS->Sitting_ReadingTime_Repeat2 = NULL;
                    $findSP4_BMVS->Sitting_BP_Repeat2 = NULL;
                    $findSP4_BMVS->Sitting_HR_Repeat2 = NULL;
                    $findSP4_BMVS->Sitting_RespiratoryRate_Repeat2 = NULL;
                }
                //physician's initial
                $findSP4_BMVS->Initial = $request->Initial;

                $findSP4_BMVS->save();
                return true;
            } else {
                return false;
            }
        } else {
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
