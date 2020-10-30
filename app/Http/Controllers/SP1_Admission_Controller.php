<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\studySpecific;
use App\Patient_Conclusion_Signature;
use App\PatientStudySpecific;
use App\StudyPeriod1;
use App\SP1_Admission;
use DB;

class SP1_Admission_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request,$study_id)
    {
        //assuming request inside has Patient ID of 5 and update study details (admission) of patient 5

        $PID = $request->patient_id;
        //find Patient Study Specific table
        $findPSS =PatientStudySpecific::with('StudyPeriod1')->where('patient_id',$PID)->first();

       if($findPSS !=NULL){
           if($findPSS->study_id == $study_id)
           {
               //find SP1_ID to access the SP1_Admission
               //find admission table and update it
               $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
               $findSP1_Admission = SP1_Admission::where('SP1_Admission_ID',$findSP1->SP1_Admission)->first();
               $findSP1_Admission->details1= "X";
               $findSP1_Admission->details2= "Z";

               $findSP1_Admission->save();
               echo "Saved successfully!";
           }
           else
           {
               echo "The subject is not enrolled into this study!";
           }

       }else{
           echo "This subject has not found in any studies!";
       }

    }
}
