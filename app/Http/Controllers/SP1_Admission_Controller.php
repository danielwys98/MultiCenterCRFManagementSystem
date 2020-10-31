<?php

namespace App\Http\Controllers;

use App\Patient;
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
        $patient = Patient::where('id',$PID)->first();
       $findPSS = PatientStudySpecific::with('StudyPeriod1')
                                       ->where('patient_id',$PID)
                                       ->where('study_id',$study_id)
                                        ->first();
       if($findPSS !=NULL)
       {
           $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
           $admission = SP1_Admission::where('SP1_Admission_ID',$findSP1->SP1_Admission)->first();

           return view('SubjectStudySpecific',compact('admission','study_id','patient'));
       }

    }

    public function update(Request $request,$patient_id,$study_id)
    {
        $patient = Patient::find($patient_id,'id')->first();
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
