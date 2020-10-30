<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientStudySpecific;
use App\StudyPeriod1;
use App\SP1_IQ36;
use DB;


class SP1_IQ36_Controller extends Controller
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
                //find SP1_ID to access the SP1_IQ36
                //find table and update it
                $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
                $findSP1_IQ36 = SP1_IQ36::where('SP1_IQ36_ID',$findSP1->SP1_IQ36)->first();
               //SAVE SP1_IQ36 stuffs
               //date and time for interim questionnaire
                $findSP1_IQ36->dateTaken=$request->dateTaken;
                $findSP1_IQ36->timeTaken=$request->timeTaken;
                //interim questionnaire
                $findSP1_IQ36->interim36hrs01=$request->Interim36hrs01;
                $findSP1_IQ36->interim36hrs02=$request->Interim36hrs02;
                $findSP1_IQ36->interim36hrs03=$request->Interim36hrs03;
                $findSP1_IQ36->interim36hrs04=$request->Interim36hrs04;
                $findSP1_IQ36->interim36hrs05=$request->Interim36hrs05;
                $findSP1_IQ36->interim36hrs06=$request->Interim36hrs06;
                $findSP1_IQ36->interim36hrs07=$request->Interim36hrs07;
                $findSP1_IQ36->interim36hrs08=$request->Interim36hrs08;
                //interviewed and checked by
                $findSP1_IQ36->Interim36hrsInterviewedby=$request->Interim36hrsInterviewedby;
                $findSP1_IQ36->Interim36hrsCheckedby=$request->Interim36hrsCheckedby;
                $findSP1_IQ36->save();
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Interim Questionnaire(36 hours Post Dose Visit)!');
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
