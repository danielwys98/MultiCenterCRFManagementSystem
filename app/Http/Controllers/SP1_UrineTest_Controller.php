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
                                        ->where('study_id',$study_id)
                                        ->first();
        if($findPSS !=NULL){
            //find SP1_ID to access the SP1_UrineTest
            //find table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $findSP1_UrineTest = SP1_UrineTest::where('SP1_UrineTest_ID',$findSP1->SP1_UrineTest)->first();
            //SAVE SP1_UrineTest stuffs
            //custom messages load for validation
           $custom = [
            'UPreg_dateTaken.required' => 'Please enter the date taken for urine pregnancy test',
            'UPreg_TestTime.required' => 'Please enter the test time for urine pregnancy test',
            'UPreg_ReadTime.required' => 'Please enter the read time for urine pregnancy test',
            'UPreg_Laboratory.required' => 'Please select which laboratory does the urine pregnancy test conducted',
            'UPreg_Laboratory_Text.required_if' => 'If other laboratory were selected, please state the name of the laboratory where urine pregnancy test conducted',
            'UPreg_hCG.required' => 'Please select the results of hCG(Human chorionic gonadotropin) for urine pregnancy test',
            'UPreg_Transcribedby.required' => 'Please state the user transcribed for urine pregnancy test',
            'UDrug_dateTaken.required' => 'Please enter the date taken for urine drugs of abuse test',
            'UDrug_TestTime.required' => 'Please enter the test time for urine drugs of abuse test',
            'UDrug_ReadTime.required' => 'Please enter the read time for urine drugs of abuse test',
            'UDrug_Laboratory.required' => 'Please select which laboratory does the urine drugs of abuse test conducted',
            'UDrug_Laboratory_Text.required_if' => 'If other laboratory were selected, please state the name of the laboratory where urine drugs of abuse test conducted',
            'UDrug_Methamphetamine.required' => 'Please select the results of Methamphetamine for urine drugs of abuse test',
            'UDrug_Morphine.required' => 'Please select the results of Morphine for urine drugs of abuse test',
            'UDrug_Marijuana.required' => 'Please select the results of Marijuana for urine drugs of abuse test',
            'UDrug_Transcribedby.required' => 'Please state the user transcribed for urine drugs of abuse test',
           ];

            //Urine Pregnancy
            $findSP1_UrineTest->UPreg_male=$request->UPreg_male;
            if($request->UPreg_male == 1){
                //if subject is male
                //validation for required fields
                $validatedData=$this->validate($request,[
                    'UDrug_Laboratory' => 'required',
                    'UDrug_Laboratory_Text' => 'required_if:UDrug_Laboratory,==,Other',
                    'UDrug_dateTaken' => 'required',
                    'UDrug_TestTime' => 'required',
                    'UDrug_ReadTime' => 'required',
                    'UDrug_Methamphetamine' => 'required',
                    'UDrug_Morphine' => 'required',
                    'UDrug_Marijuana' => 'required',
                    'UDrug_Transcribedby' => 'required',
                ],$custom);
                $findSP1_UrineTest->UPreg_dateTaken=NULL;
                $findSP1_UrineTest->UPreg_TestTime=NULL;
                $findSP1_UrineTest->UPreg_ReadTime=NULL;
                $findSP1_UrineTest->UPreg_Laboratory=NULL;
                $findSP1_UrineTest->UPreg_hCG=NULL;
                $findSP1_UrineTest->UPreg_hCG_Comment=NULL;
                $findSP1_UrineTest->UPreg_Transcribedby=NULL;
            }else{
                //if subject is female
                //validation for required fields
                $validatedData=$this->validate($request,[
                    'UPreg_Laboratory' => 'required',
                    'UPreg_Laboratory_Text' => 'required_if:UPreg_Laboratory,==,Other',
                    'UDrug_Laboratory' => 'required',
                    'UDrug_Laboratory_Text' => 'required_if:UDrug_Laboratory,==,Other',
                    'UPreg_dateTaken' => 'required',
                    'UPreg_TestTime' => 'required',
                    'UPreg_ReadTime' => 'required',
                    'UPreg_hCG' => 'required',
                    'UPreg_Transcribedby' => 'required',
                    'UDrug_dateTaken' => 'required',
                    'UDrug_TestTime' => 'required',
                    'UDrug_ReadTime' => 'required',
                    'UDrug_Methamphetamine' => 'required',
                    'UDrug_Morphine' => 'required',
                    'UDrug_Marijuana' => 'required',
                    'UDrug_Transcribedby' => 'required',
                ],$custom);
                $findSP1_UrineTest->UPreg_dateTaken=$request->UPreg_dateTaken;
                $findSP1_UrineTest->UPreg_TestTime=$request->UPreg_TestTime;
                $findSP1_UrineTest->UPreg_ReadTime=$request->UPreg_ReadTime;
                $upreglab = $request->UPreg_Laboratory;
                if ($upreglab == 'Other') {
                    $findSP1_UrineTest->UPreg_Laboratory=$request->UPreg_Laboratory_Text;
                } else{
                    $findSP1_UrineTest->UPreg_Laboratory=$request->UPreg_Laboratory;
                }
                $findSP1_UrineTest->UPreg_hCG=$request->UPreg_hCG;
                $findSP1_UrineTest->UPreg_hCG_Comment=$request->UPreg_hCG_Comment;
                $findSP1_UrineTest->UPreg_Transcribedby=$request->UPreg_Transcribedby;
            }
            //Urine Drug
            $findSP1_UrineTest->UDrug_dateTaken=$request->UDrug_dateTaken;
            $findSP1_UrineTest->UDrug_TestTime=$request->UDrug_TestTime;
            $findSP1_UrineTest->UDrug_ReadTime=$request->UDrug_ReadTime;
            $udruglab = $request->UDrug_Laboratory;
            if ($udruglab == 'Other') {
                $findSP1_UrineTest->UDrug_Laboratory=$request->UDrug_Laboratory_Text;
            } else{
                $findSP1_UrineTest->UDrug_Laboratory=$request->UDrug_Laboratory;
            }
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
            return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Urine Test!');
        }else{
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }
    }

}
