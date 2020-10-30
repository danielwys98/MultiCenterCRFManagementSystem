<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientStudySpecific;
use App\StudyPeriod1;
use App\SP1_IQ48;
use DB;

class SP1_IQ48_Controller extends Controller
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
                                        ->first();
        if($findPSS !=NULL){
            if($findPSS->study_id == $study_id){
                //find SP1_ID to access the SP1_IQ48
                //find table and update it
                $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
                $findSP1_IQ48 = SP1_IQ48::where('SP1_IQ48_ID',$findSP1->SP1_IQ48)->first();
               //SAVE SP1_IQ48 stuffs
               //date and time for interim questionnaire
                $findSP1_IQ48->dateTaken=$request->dateTaken;
                $findSP1_IQ48->timeTaken=$request->timeTaken;
                //interim questionnaire
                $findSP1_IQ48->interim48hrs01=$request->Interim48hrs01;
                $findSP1_IQ48->interim48hrs02=$request->Interim48hrs02;
                $findSP1_IQ48->interim48hrs03=$request->Interim48hrs03;
                $findSP1_IQ48->interim48hrs04=$request->Interim48hrs04;
                $findSP1_IQ48->interim48hrs05=$request->Interim48hrs05;
                $findSP1_IQ48->interim48hrs06=$request->Interim48hrs06;
                $findSP1_IQ48->interim48hrs07=$request->Interim48hrs07;
                $findSP1_IQ48->interim48hrs08=$request->Interim48hrs08;
                //interviewed and checked by
                $findSP1_IQ48->Interim48hrsInterviewedby=$request->Interim48hrsInterviewedby;
                $findSP1_IQ48->Interim48hrsCheckedby=$request->Interim48hrsCheckedby;
                $findSP1_IQ48->save();
                dd($request);
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Interim Questionnaire(48 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','This subject is not enrolled into this study!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }else{
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }
    }

}
