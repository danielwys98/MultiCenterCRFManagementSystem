<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientStudySpecific;
use App\StudyPeriod1;
use App\SP1_UrineTest;
use DB;

class SP1_UrineTest_Controller extends Controller
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
                //find SP1_ID to access the SP1_UrineTest
                //find table and update it
                $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
                $findSP1_UrineTest = SP1_UrineTest::where('SP1_UrineTest_ID',$findSP1->SP1_UrineTest)->first();
                //SAVE SP1_UrineTest stuffs

                //Urine Pregnancy
                $findSP1_UrineTest->UPreg_male=$request->UPreg_male;
                $findSP1_UrineTest->UPreg_dateTaken=$request->UPreg_dateTaken;
                $findSP1_UrineTest->UPreg_TestTime=$request->UPreg_TestTime;
                $findSP1_UrineTest->UPreg_ReadTime=$request->UPreg_ReadTime;
                $findSP1_UrineTest->UPreg_Laboratory=$request->UPreg_Laboratory;
                $findSP1_UrineTest->UPreg_hCG=$request->UPreg_hCG;
                $findSP1_UrineTest->UPreg_hCG_Comment=$request->UPreg_hCG_Comment;
                $findSP1_UrineTest->UPreg_Transcribedby=$request->UPreg_Transcribedby;
                //Urine Drug
                $findSP1_UrineTest->UDrug_dateTaken=$request->UDrug_dateTaken;
                $findSP1_UrineTest->UDrug_TestTime=$request->UDrug_TestTime;
                $findSP1_UrineTest->UDrug_ReadTime=$request->UDrug_ReadTime;
                $findSP1_UrineTest->UDrug_Laboratory=$request->UDrug_Laboratory;
                $findSP1_UrineTest->UDrug_Methamphetamine=$request->UDrug_Methamphetamine;
                $findSP1_UrineTest->UDrug_Methamphetamine_Comment=$request->UDrug_Methamphetamine_Comment;
                $findSP1_UrineTest->UDrug_Morphine=$request->UDrug_Morphine;
                $findSP1_UrineTest->UDrug_Morphine_Comment=$request->UDrug_Morphine_Comment;
                $findSP1_UrineTest->UDrug_Marijuana=$request->UDrug_Marijuana;
                $findSP1_UrineTest->UDrug_Marijuana_Comment=$request->UDrug_Marijuana_Comment;
                $findSP1_UrineTest->UDrug_Transcribedby=$request->UDrug_Transcribedby;
                //Conclusion
                $findSP1_UrineTest->inclusionYesNo=$request->inclusionYesNo;
                $findSP1_UrineTest->Comments=$request->Comments;
                $findSP1_UrineTest->subjectFit=$request->subjectFit;
                $findSP1_UrineTest->physicianSign=$request->physicianSign;
                $findSP1_UrineTest->physicianName=$request->physicianName;
                
                $findSP1_UrineTest->save();
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
