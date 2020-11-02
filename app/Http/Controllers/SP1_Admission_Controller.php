<?php

namespace App\Http\Controllers;

use App\Patient;
use App\SP1_AQuestionnaire;
use App\SP1_BAT;
use App\SP1_BMVS;
use App\SP1_Discharge;
use App\SP1_DQuestionnaire;
use App\SP1_IQ36;
use App\SP1_IQ48;
use App\SP1_PDynamicAnalysis;
use App\SP1_PDynamicSampling;
use App\SP1_PKineticSampling;
use App\SP1_UrineTest;
use App\SP1_VitalSigns;
use Illuminate\Http\Request;
use App\PatientStudySpecific;
use App\StudyPeriod1;
use App\SP1_Admission;
use DB;
use Alert;

class SP1_Admission_Controller extends Controller
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
           //find SP1_ID to access the SP1_Admission
           //find admission table and update it
           $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
           $findSP1_Admission = SP1_Admission::where('SP1_Admission_ID',$findSP1->SP1_Admission)->first();
           //custom messages load for validation
           $custom = [
            'AdmissionDateTaken.required' => 'Please enter the admission date taken',
            'AdmissionTimeTaken.required' => 'Please enter the admission time taken',
            'ConsentDateTaken.required' => 'Please enter the consent date taken',
            'ConsentTimeTaken.required' => 'Please enter the consent time taken',
           ];

           //validation for required fields
           $validatedData=$this->validate($request,[
            'AdmissionDateTaken' => 'required',
            'AdmissionTimeTaken' => 'required',
            'ConsentDateTaken' => 'required',
            'ConsentTimeTaken' => 'required',
        ],$custom);

            //admission date and time
           $findSP1_Admission->AdmissionDateTaken = $request->AdmissionDateTaken;
           $findSP1_Admission->AdmissionTimeTaken = $request->AdmissionTimeTaken;
            //consent date and time
           $findSP1_Admission->ConsentDateTaken = $request->ConsentDateTaken;
           $findSP1_Admission->ConsentTimeTaken = $request->ConsentTimeTaken;

           $findSP1_Admission->save();

           return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Admission!');
       }else{
           alert()->error('Error!','This subject is not enrolled into any study!');
           return redirect(route('studySpecific.input',$study_id));
       }

    }

    public function edit(Request $request,$study_id)
    {
        $PID = $request->patient_id;
        $patient = Patient::where('id', $PID)->first();
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id', $PID)
            ->where('study_id', $study_id)
            ->first();
        if ($findPSS != NULL) {
            $findSP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
            $Admission = SP1_Admission::where('SP1_Admission_ID', $findSP1->SP1_Admission)->first();
            $BMVS = SP1_BMVS::where('SP1_BMVS_ID', $findSP1->SP1_BMVS)->first();
            $BAT = SP1_BAT::where('SP1_BAT_ID', $findSP1->SP1_BAT)->first();
            $AQuestionnaire = SP1_AQuestionnaire::where('SP1_AQuestionnaire_ID', $findSP1->SP1_AQuestionnaire)->first();
            $UrineTest = SP1_UrineTest::where('SP1_UrineTest_ID', $findSP1->SP1_Urine)->first();
            $PKinetic = SP1_PKineticSampling::where('SP1_PKineticSampling_ID', $findSP1->SP1_PKineticSampling)->first();
            $PDynamic = SP1_PDynamicSampling::where('SP1_PDynamicSampling_ID', $findSP1->SP1_PDynamicSampling)->first();
            $PDAnalysis = SP1_PDynamicAnalysis::where('SP1_PDynamicAnalysis_ID', $findSP1->SP1_PDynamiAnalysis)->first();
            $VitalSign = SP1_VitalSigns::where('SP1_VitalSign_ID', $findSP1->SP1_VitalSign)->first();
            $Discharge = SP1_Discharge::where('SP1_Discharge_ID', $findSP1->SP1_Discharge)->first();
            $DQuestionnaire = SP1_DQuestionnaire::where('SP1_DQuestionnaire_ID', $findSP1->SP1_DQuestionnaire)->first();
            $IQ36 = SP1_IQ36::where('SP1_IQ36_ID', $findSP1->SP1_IQ36)->first();
            $IQ48 = SP1_IQ48::where('SP1_IQ48_ID', $findSP1->SP1_IQ48)->first();
            return view('SubjectStudySpecific', compact('Admission',
                'BMVS',
                'BAT',
                'AQuestionnaire',
                'UrineTest',
                'PKinetic',
                'PDynamic',
                'PDAnalysis',
                'VitalSign',
                'Discharge',
                'DQuestionnaire',
                'IQ36',
                'IQ48',
                'study_id',
                'patient'));
        }
    }

    public function update(Request $request,$patient_id,$study_id)
    {
        $flag=false;
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
                                        ->where('patient_id',$patient_id)
                                        ->where('study_id',$study_id)
                                        ->first();
        if($findPSS !=NULL)
        {
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $admission = SP1_Admission::where('SP1_Admission_ID',$findSP1->SP1_Admission)->first();
        }
        $data = $request->except('_token','_method');
        foreach($data as $key=>$value)
        {
            if($value != NULL)
            {
                $admission[$key]=$value;
                $flag=true;
            }
        }
        if($flag)
        {
            $admission->save();
          return redirect(route('studySpecific.admin'))->with('success','You updated the subject study period details!');
        }


    }
}
