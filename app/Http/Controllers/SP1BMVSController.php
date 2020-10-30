<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_Admission;
use App\SP1_BMVS;
use App\StudyPeriod1;
use Illuminate\Http\Request;

class SP1BMVSController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request,$study_id)
    {

        $PID = $request->patient_id;

        //assuming request inside has Patient ID of 2 and update study details (admission) of patient 5 (testing purpose)
        /*  $PID = 2;*/
        //find Patient Study Specific table
        $findPSS =PatientStudySpecific::with('StudyPeriod1')
                                        ->where('patient_id',$PID)
                                        ->first();

        if($findPSS !=NULL){
            if($findPSS->study_id == $study_id)
            {
                //find SP1_ID to access the SP1_Admission
                //find admission table and update it
                $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
                $findSP1_BMVS = SP1_BMVS::where('SP1_BMVS_ID',$findSP1->SP1_BMVS)->first();
               //SAVE BMVS stuffs
                $findSP1_BMVS->save();
                dd($request);
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Body Measurement and Vital Signs!');
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
