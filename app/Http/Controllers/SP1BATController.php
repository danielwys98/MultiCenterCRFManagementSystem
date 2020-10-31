<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_Admission;
use App\SP1_BAT;
use App\StudyPeriod1;
use Illuminate\Http\Request;

class SP1BATController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request,$study_id)
    {
        $PID = $request->patient_id;
        //find Patient Study Specific table
        $findPSS =PatientStudySpecific::with('StudyPeriod1')->where('patient_id',$PID)->first();

        if($findPSS !=NULL){
            if($findPSS->study_id == $study_id)
            {
                //find SP1_ID to access the SP1_Admission
                //find admission table and update it
                $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
                $findSP1_BAT = SP1_BAT::where('SP1_BAT_ID',$findSP1->SP1_BATER)->first();
                $findSP1_BAT->dateTaken = $request->dateTaken;
                $findSP1_BAT->timeTaken = $request->timeTaken;
                if($request->Laboratory == 'Others')
                {
                    $findSP1_BAT->laboratory = $request->Laboratory_text;
                }else{
                    $findSP1_BAT->laboratory = $request->Laboratory;
                }
                $findSP1_BAT->breathalcohol = $request->breathalcohol;
                $findSP1_BAT->breathalcoholResult = $request->breathalcoholResult;
                $findSP1_BAT->Usertranscribed = $request->Usertranscribed;

                $findSP1_BAT->save();

                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Breath Alcohol Test!');
            }
            else
            {
                alert()->error('Error!','This subject is not enrolled into this study!');
                return redirect(route('studySpecific.input',$study_id));
            }

        }else{
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }

    }

}
