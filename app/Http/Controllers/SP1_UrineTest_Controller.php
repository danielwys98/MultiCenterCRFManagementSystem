<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientStudySpecific;
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use App\SP1_UrineTest;
use App\SP2_UrineTest;
use App\SP3_UrineTest;
use App\SP4_UrineTest;
use DB;

class SP1_UrineTest_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request,$study_id)
    {
        //custom messages load for validation
        $custom = [
            'UPreg_dateTaken.required' => 'Please enter the date taken for urine pregnancy test',
            'UPreg_TestTime.required' => 'Please enter the test time for urine pregnancy test',
            'UPreg_ReadTime.required' => 'Please enter the read time for urine pregnancy test',
            'uPreg_Laboratory.required' => 'Please select which laboratory does the urine pregnancy test conducted',
            'uPreg_Laboratory_Text.required_if' => 'If other laboratory were selected, please state the name of the laboratory where urine pregnancy test conducted',
            'UPreg_hCG.required' => 'Please select the results of hCG(Human chorionic gonadotropin) for urine pregnancy test',
            'UPreg_Transcribedby.required' => 'Please state the user transcribed for urine pregnancy test',
            'UDrug_dateTaken.required' => 'Please enter the date taken for urine drugs of abuse test',
            'UDrug_TestTime.required' => 'Please enter the test time for urine drugs of abuse test',
            'UDrug_ReadTime.required' => 'Please enter the read time for urine drugs of abuse test',
            'uDrug_Laboratory.required' => 'Please select which laboratory does the urine drugs of abuse test conducted',
            'uDrug_Laboratory_Text.required_if' => 'If other laboratory were selected, please state the name of the laboratory where urine drugs of abuse test conducted',
            'UDrug_Methamphetamine.required' => 'Please select the results of Methamphetamine for urine drugs of abuse test',
            'UDrug_Morphine.required' => 'Please select the results of Morphine for urine drugs of abuse test',
            'UDrug_Marijuana.required' => 'Please select the results of Marijuana for urine drugs of abuse test',
            'UDrug_Transcribedby.required' => 'Please state the user transcribed for urine drugs of abuse test',
            'inclusionYesNo.required' => 'Please select whether the subject fulfill all the inclusion criteria and none of the exclusion criteria',
            'subjectFit.required' => 'Please select whether the subject is fit for dosing',
            'physicianSign.required' => 'Physician’s signature is required',
            'physicianName.required' => 'Physician’s name is required',
           ];

        $PID = $request->patient_id;
        $study_period = $request->studyPeriod;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id',$PID)
                                        ->where('study_id',$study_id)
                                        ->first();
        //check study period and save
        if($study_period == '---'){
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }elseif($study_period == 1){
            if($this->storeSP1($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Urine Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            if($this->storeSP2($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Urine Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            if($this->storeSP3($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Urine Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            if($this->storeSP4($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 4 details for Urine Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.input',$study_id));
        }

    }

    public function update(Request $request, $patient_id, $study_id,$study_period)
    {        
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id',$patient_id)
                                        ->where('study_id',$study_id)
                                        ->first();
        //check study period and save
        if($study_period == 1){
            if($this->updateSP1($findPSS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 1 details for Urine Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 2){
            if($this->updateSP2($findPSS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 2 details for Urine Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 3){
            if($this->updateSP3($findPSS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 3 details for Urine Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 4){
            if($this->updateSP4($findPSS,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 4 details for Urine Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.edit',$study_id));
        }
    }

    //store SP1_UrineTest
    public function storeSP1($PSS,$request){
        if($PSS !=NULL && $PSS->SP1_ID != NULL){
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$PSS->SP1_ID)->first();
            $UT = SP1_UrineTest::where('SP1_UrineTest_ID', $findSP1->SP1_UrineTest)->first();

            if($UT->UDrug_dateTaken == NULL){
                $UT->UPreg_male=$request->UPreg_male;
                if($request->UPreg_male == 1){
                    //if subject is male
                    //validation for required fields
                    $validatedData=$this->validate($request,[
                        'uDrug_Laboratory' => 'required',
                        'uDrug_Laboratory_Text' => 'required_if:uDrug_Laboratory,==,Other',
                        'UDrug_dateTaken' => 'required',
                        'UDrug_TestTime' => 'required',
                        'UDrug_ReadTime' => 'required',
                        'UDrug_Methamphetamine' => 'required',
                        'UDrug_Morphine' => 'required',
                        'UDrug_Marijuana' => 'required',
                        'UDrug_Transcribedby' => 'required',
                        'inclusionYesNo' => 'required',
                        'subjectFit' => 'required',
                        'physicianSign' => 'required',
                        'physicianName' => 'required',
                    ],$custom);
                    $UT->UPreg_dateTaken=NULL;
                    $UT->UPreg_TestTime=NULL;
                    $UT->UPreg_ReadTime=NULL;
                    $UT->UPreg_Laboratory=NULL;
                    $UT->UPreg_hCG=NULL;
                    $UT->UPreg_hCG_Comment=NULL;
                    $UT->UPreg_Transcribedby=NULL;
                }else{
                    //if subject is female
                    //validation for required fields
                    $validatedData=$this->validate($request,[
                        'uPreg_Laboratory' => 'required',
                        'uPreg_Laboratory_Text' => 'required_if:uPreg_Laboratory,==,Other',
                        'uDrug_Laboratory' => 'required',
                        'uDrug_Laboratory_Text' => 'required_if:uDrug_Laboratory,==,Other',
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
                        'inclusionYesNo' => 'required',
                        'subjectFit' => 'required',
                        'physicianSign' => 'required',
                        'physicianName' => 'required',
                    ],$custom);
                    $UT->UPreg_dateTaken=$request->UPreg_dateTaken;
                    $UT->UPreg_TestTime=$request->UPreg_TestTime;
                    $UT->UPreg_ReadTime=$request->UPreg_ReadTime;
                    $upreglab = $request->uPreg_Laboratory;
                    if ($upreglab == 'Other') {
                        $UT->UPreg_Laboratory=$request->uPreg_Laboratory_Text;
                    } else{
                        $UT->UPreg_Laboratory=$request->uPreg_Laboratory;
                    }
                    $UT->UPreg_hCG=$request->UPreg_hCG;
                    $UT->UPreg_hCG_Comment=$request->UPreg_hCG_Comment;
                    $UT->UPreg_Transcribedby=$request->UPreg_Transcribedby;
                }
                //Urine Drug
                $UT->UDrug_dateTaken=$request->UDrug_dateTaken;
                $UT->UDrug_TestTime=$request->UDrug_TestTime;
                $UT->UDrug_ReadTime=$request->UDrug_ReadTime;
                $udruglab = $request->uDrug_Laboratory;
                if ($udruglab == 'Other') {
                    $UT->UDrug_Laboratory=$request->uDrug_Laboratory_Text;
                } else{
                    $UT->UDrug_Laboratory=$request->uDrug_Laboratory;
                }
                $UT->UDrug_Methamphetamine=$request->UDrug_Methamphetamine;
                $UT->UDrug_Methamphetamine_Comment=$request->UDrug_Methamphetamine_Comment;
                $UT->UDrug_Morphine=$request->UDrug_Morphine;
                $UT->UDrug_Morphine_Comment=$request->UDrug_Morphine_Comment;
                $UT->UDrug_Marijuana=$request->UDrug_Marijuana;
                $UT->UDrug_Marijuana_Comment=$request->UDrug_Marijuana_Comment;
                $UT->UDrug_Transcribedby=$request->UDrug_Transcribedby;
                //Conclusion
                $UT->inclusionYesNo=$request->inclusionYesNo;
                $UT->Comments=$request->Comments;
                $UT->subjectFit=$request->subjectFit;
                $UT->physicianSign=$request->physicianSign;
                $UT->physicianName=$request->physicianName;

                $UT->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP2_UrineTest
    public function storeSP2($PSS,$request){
        if($PSS !=NULL && $PSS->SP2_ID != NULL){
            //find admission table and update it
            $findSP2 = StudyPeriod2::where('SP2_ID',$PSS->SP2_ID)->first();
            $UT = SP2_UrineTest::where('SP2_UrineTest_ID', $findSP2->SP2_UrineTest)->first();

            if($UT->UDrug_dateTaken == NULL){
                $UT->UPreg_male=$request->UPreg_male;
                if($request->UPreg_male == 1){
                    //if subject is male
                    //validation for required fields
                    $validatedData=$this->validate($request,[
                        'uDrug_Laboratory' => 'required',
                        'uDrug_Laboratory_Text' => 'required_if:uDrug_Laboratory,==,Other',
                        'UDrug_dateTaken' => 'required',
                        'UDrug_TestTime' => 'required',
                        'UDrug_ReadTime' => 'required',
                        'UDrug_Methamphetamine' => 'required',
                        'UDrug_Morphine' => 'required',
                        'UDrug_Marijuana' => 'required',
                        'UDrug_Transcribedby' => 'required',
                        'inclusionYesNo' => 'required',
                        'subjectFit' => 'required',
                        'physicianSign' => 'required',
                        'physicianName' => 'required',
                    ],$custom);
                    $UT->UPreg_dateTaken=NULL;
                    $UT->UPreg_TestTime=NULL;
                    $UT->UPreg_ReadTime=NULL;
                    $UT->UPreg_Laboratory=NULL;
                    $UT->UPreg_hCG=NULL;
                    $UT->UPreg_hCG_Comment=NULL;
                    $UT->UPreg_Transcribedby=NULL;
                }else{
                    //if subject is female
                    //validation for required fields
                    $validatedData=$this->validate($request,[
                        'uPreg_Laboratory' => 'required',
                        'uPreg_Laboratory_Text' => 'required_if:uPreg_Laboratory,==,Other',
                        'uDrug_Laboratory' => 'required',
                        'uDrug_Laboratory_Text' => 'required_if:uDrug_Laboratory,==,Other',
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
                        'inclusionYesNo' => 'required',
                        'subjectFit' => 'required',
                        'physicianSign' => 'required',
                        'physicianName' => 'required',
                    ],$custom);
                    $UT->UPreg_dateTaken=$request->UPreg_dateTaken;
                    $UT->UPreg_TestTime=$request->UPreg_TestTime;
                    $UT->UPreg_ReadTime=$request->UPreg_ReadTime;
                    $upreglab = $request->uPreg_Laboratory;
                    if ($upreglab == 'Other') {
                        $UT->UPreg_Laboratory=$request->uPreg_Laboratory_Text;
                    } else{
                        $UT->UPreg_Laboratory=$request->uPreg_Laboratory;
                    }
                    $UT->UPreg_hCG=$request->UPreg_hCG;
                    $UT->UPreg_hCG_Comment=$request->UPreg_hCG_Comment;
                    $UT->UPreg_Transcribedby=$request->UPreg_Transcribedby;
                }
                //Urine Drug
                $UT->UDrug_dateTaken=$request->UDrug_dateTaken;
                $UT->UDrug_TestTime=$request->UDrug_TestTime;
                $UT->UDrug_ReadTime=$request->UDrug_ReadTime;
                $udruglab = $request->uDrug_Laboratory;
                if ($udruglab == 'Other') {
                    $UT->UDrug_Laboratory=$request->uDrug_Laboratory_Text;
                } else{
                    $UT->UDrug_Laboratory=$request->uDrug_Laboratory;
                }
                $UT->UDrug_Methamphetamine=$request->UDrug_Methamphetamine;
                $UT->UDrug_Methamphetamine_Comment=$request->UDrug_Methamphetamine_Comment;
                $UT->UDrug_Morphine=$request->UDrug_Morphine;
                $UT->UDrug_Morphine_Comment=$request->UDrug_Morphine_Comment;
                $UT->UDrug_Marijuana=$request->UDrug_Marijuana;
                $UT->UDrug_Marijuana_Comment=$request->UDrug_Marijuana_Comment;
                $UT->UDrug_Transcribedby=$request->UDrug_Transcribedby;
                //Conclusion
                $UT->inclusionYesNo=$request->inclusionYesNo;
                $UT->Comments=$request->Comments;
                $UT->subjectFit=$request->subjectFit;
                $UT->physicianSign=$request->physicianSign;
                $UT->physicianName=$request->physicianName;

                $UT->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP3_UrineTest
    public function storeSP3($PSS,$request){
        if($PSS !=NULL && $PSS->SP3_ID != NULL){
            //find admission table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID',$PSS->SP3_ID)->first();
            $UT = SP3_UrineTest::where('SP3_UrineTest_ID', $findSP3->SP3_UrineTest)->first();

            if($UT->UDrug_dateTaken == NULL){
                $UT->UPreg_male=$request->UPreg_male;
                if($request->UPreg_male == 1){
                    //if subject is male
                    //validation for required fields
                    $validatedData=$this->validate($request,[
                        'uDrug_Laboratory' => 'required',
                        'uDrug_Laboratory_Text' => 'required_if:uDrug_Laboratory,==,Other',
                        'UDrug_dateTaken' => 'required',
                        'UDrug_TestTime' => 'required',
                        'UDrug_ReadTime' => 'required',
                        'UDrug_Methamphetamine' => 'required',
                        'UDrug_Morphine' => 'required',
                        'UDrug_Marijuana' => 'required',
                        'UDrug_Transcribedby' => 'required',
                        'inclusionYesNo' => 'required',
                        'subjectFit' => 'required',
                        'physicianSign' => 'required',
                        'physicianName' => 'required',
                    ],$custom);
                    $UT->UPreg_dateTaken=NULL;
                    $UT->UPreg_TestTime=NULL;
                    $UT->UPreg_ReadTime=NULL;
                    $UT->UPreg_Laboratory=NULL;
                    $UT->UPreg_hCG=NULL;
                    $UT->UPreg_hCG_Comment=NULL;
                    $UT->UPreg_Transcribedby=NULL;
                }else{
                    //if subject is female
                    //validation for required fields
                    $validatedData=$this->validate($request,[
                        'uPreg_Laboratory' => 'required',
                        'uPreg_Laboratory_Text' => 'required_if:uPreg_Laboratory,==,Other',
                        'uDrug_Laboratory' => 'required',
                        'uDrug_Laboratory_Text' => 'required_if:uDrug_Laboratory,==,Other',
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
                        'inclusionYesNo' => 'required',
                        'subjectFit' => 'required',
                        'physicianSign' => 'required',
                        'physicianName' => 'required',
                    ],$custom);
                    $UT->UPreg_dateTaken=$request->UPreg_dateTaken;
                    $UT->UPreg_TestTime=$request->UPreg_TestTime;
                    $UT->UPreg_ReadTime=$request->UPreg_ReadTime;
                    $upreglab = $request->uPreg_Laboratory;
                    if ($upreglab == 'Other') {
                        $UT->UPreg_Laboratory=$request->uPreg_Laboratory_Text;
                    } else{
                        $UT->UPreg_Laboratory=$request->uPreg_Laboratory;
                    }
                    $UT->UPreg_hCG=$request->UPreg_hCG;
                    $UT->UPreg_hCG_Comment=$request->UPreg_hCG_Comment;
                    $UT->UPreg_Transcribedby=$request->UPreg_Transcribedby;
                }
                //Urine Drug
                $UT->UDrug_dateTaken=$request->UDrug_dateTaken;
                $UT->UDrug_TestTime=$request->UDrug_TestTime;
                $UT->UDrug_ReadTime=$request->UDrug_ReadTime;
                $udruglab = $request->uDrug_Laboratory;
                if ($udruglab == 'Other') {
                    $UT->UDrug_Laboratory=$request->uDrug_Laboratory_Text;
                } else{
                    $UT->UDrug_Laboratory=$request->uDrug_Laboratory;
                }
                $UT->UDrug_Methamphetamine=$request->UDrug_Methamphetamine;
                $UT->UDrug_Methamphetamine_Comment=$request->UDrug_Methamphetamine_Comment;
                $UT->UDrug_Morphine=$request->UDrug_Morphine;
                $UT->UDrug_Morphine_Comment=$request->UDrug_Morphine_Comment;
                $UT->UDrug_Marijuana=$request->UDrug_Marijuana;
                $UT->UDrug_Marijuana_Comment=$request->UDrug_Marijuana_Comment;
                $UT->UDrug_Transcribedby=$request->UDrug_Transcribedby;
                //Conclusion
                $UT->inclusionYesNo=$request->inclusionYesNo;
                $UT->Comments=$request->Comments;
                $UT->subjectFit=$request->subjectFit;
                $UT->physicianSign=$request->physicianSign;
                $UT->physicianName=$request->physicianName;

                $UT->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP4_UrineTest
    public function storeSP4($PSS,$request){
        if($PSS !=NULL && $PSS->SP4_ID != NULL){
            //find admission table and update it
            $findSP4 = StudyPeriod4::where('SP4_ID',$PSS->SP4_ID)->first();
            $UT = SP4_UrineTest::where('SP4_UrineTest_ID', $findSP4->SP4_UrineTest)->first();

            if($UT->UDrug_dateTaken == NULL){
                $UT->UPreg_male=$request->UPreg_male;
                if($request->UPreg_male == 1){
                    //if subject is male
                    //validation for required fields
                    $validatedData=$this->validate($request,[
                        'uDrug_Laboratory' => 'required',
                        'uDrug_Laboratory_Text' => 'required_if:uDrug_Laboratory,==,Other',
                        'UDrug_dateTaken' => 'required',
                        'UDrug_TestTime' => 'required',
                        'UDrug_ReadTime' => 'required',
                        'UDrug_Methamphetamine' => 'required',
                        'UDrug_Morphine' => 'required',
                        'UDrug_Marijuana' => 'required',
                        'UDrug_Transcribedby' => 'required',
                        'inclusionYesNo' => 'required',
                        'subjectFit' => 'required',
                        'physicianSign' => 'required',
                        'physicianName' => 'required',
                    ],$custom);
                    $UT->UPreg_dateTaken=NULL;
                    $UT->UPreg_TestTime=NULL;
                    $UT->UPreg_ReadTime=NULL;
                    $UT->UPreg_Laboratory=NULL;
                    $UT->UPreg_hCG=NULL;
                    $UT->UPreg_hCG_Comment=NULL;
                    $UT->UPreg_Transcribedby=NULL;
                }else{
                    //if subject is female
                    //validation for required fields
                    $validatedData=$this->validate($request,[
                        'uPreg_Laboratory' => 'required',
                        'uPreg_Laboratory_Text' => 'required_if:uPreg_Laboratory,==,Other',
                        'uDrug_Laboratory' => 'required',
                        'uDrug_Laboratory_Text' => 'required_if:uDrug_Laboratory,==,Other',
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
                        'inclusionYesNo' => 'required',
                        'subjectFit' => 'required',
                        'physicianSign' => 'required',
                        'physicianName' => 'required',
                    ],$custom);
                    $UT->UPreg_dateTaken=$request->UPreg_dateTaken;
                    $UT->UPreg_TestTime=$request->UPreg_TestTime;
                    $UT->UPreg_ReadTime=$request->UPreg_ReadTime;
                    $upreglab = $request->uPreg_Laboratory;
                    if ($upreglab == 'Other') {
                        $UT->UPreg_Laboratory=$request->uPreg_Laboratory_Text;
                    } else{
                        $UT->UPreg_Laboratory=$request->uPreg_Laboratory;
                    }
                    $UT->UPreg_hCG=$request->UPreg_hCG;
                    $UT->UPreg_hCG_Comment=$request->UPreg_hCG_Comment;
                    $UT->UPreg_Transcribedby=$request->UPreg_Transcribedby;
                }
                //Urine Drug
                $UT->UDrug_dateTaken=$request->UDrug_dateTaken;
                $UT->UDrug_TestTime=$request->UDrug_TestTime;
                $UT->UDrug_ReadTime=$request->UDrug_ReadTime;
                $udruglab = $request->uDrug_Laboratory;
                if ($udruglab == 'Other') {
                    $UT->UDrug_Laboratory=$request->uDrug_Laboratory_Text;
                } else{
                    $UT->UDrug_Laboratory=$request->uDrug_Laboratory;
                }
                $UT->UDrug_Methamphetamine=$request->UDrug_Methamphetamine;
                $UT->UDrug_Methamphetamine_Comment=$request->UDrug_Methamphetamine_Comment;
                $UT->UDrug_Morphine=$request->UDrug_Morphine;
                $UT->UDrug_Morphine_Comment=$request->UDrug_Morphine_Comment;
                $UT->UDrug_Marijuana=$request->UDrug_Marijuana;
                $UT->UDrug_Marijuana_Comment=$request->UDrug_Marijuana_Comment;
                $UT->UDrug_Transcribedby=$request->UDrug_Transcribedby;
                //Conclusion
                $UT->inclusionYesNo=$request->inclusionYesNo;
                $UT->Comments=$request->Comments;
                $UT->subjectFit=$request->subjectFit;
                $UT->physicianSign=$request->physicianSign;
                $UT->physicianName=$request->physicianName;

                $UT->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //update SP1_UrineTest
    public function updateSP1($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$PSS->SP1_ID)->first();
            $UT = SP1_UrineTest::where('SP1_UrineTest_ID', $findSP1->SP1_UrineTest)->first();

            $UT->UPreg_male=$request->UPreg_male;
            if($request->UPreg_male == 1){
                //if subject is male
                $UT->UPreg_dateTaken=NULL;
                $UT->UPreg_TestTime=NULL;
                $UT->UPreg_ReadTime=NULL;
                $UT->UPreg_Laboratory=NULL;
                $UT->UPreg_hCG=NULL;
                $UT->UPreg_hCG_Comment=NULL;
                $UT->UPreg_Transcribedby=NULL;
            }else{
                //if subject is female
                $UT->UPreg_dateTaken=$request->UPreg_dateTaken;
                $UT->UPreg_TestTime=$request->UPreg_TestTime;
                $UT->UPreg_ReadTime=$request->UPreg_ReadTime;
                $upreglab = $request->uPreg_Laboratory;
                if ($upreglab == 'Other') {
                    $UT->UPreg_Laboratory=$request->uPreg_Laboratory_Text;
                } else{
                    $UT->UPreg_Laboratory=$request->uPreg_Laboratory;
                }
                $UT->UPreg_hCG=$request->UPreg_hCG;
                $UT->UPreg_hCG_Comment=$request->UPreg_hCG_Comment;
                $UT->UPreg_Transcribedby=$request->UPreg_Transcribedby;
            }
            //Urine Drug
            $UT->UDrug_dateTaken=$request->UDrug_dateTaken;
            $UT->UDrug_TestTime=$request->UDrug_TestTime;
            $UT->UDrug_ReadTime=$request->UDrug_ReadTime;
            $udruglab = $request->uDrug_Laboratory;
            if ($udruglab == 'Other') {
                $UT->UDrug_Laboratory=$request->uDrug_Laboratory_Text;
            } else{
                $UT->UDrug_Laboratory=$request->uDrug_Laboratory;
            }
            $UT->UDrug_Methamphetamine=$request->UDrug_Methamphetamine;
            $UT->UDrug_Methamphetamine_Comment=$request->UDrug_Methamphetamine_Comment;
            $UT->UDrug_Morphine=$request->UDrug_Morphine;
            $UT->UDrug_Morphine_Comment=$request->UDrug_Morphine_Comment;
            $UT->UDrug_Marijuana=$request->UDrug_Marijuana;
            $UT->UDrug_Marijuana_Comment=$request->UDrug_Marijuana_Comment;
            $UT->UDrug_Transcribedby=$request->UDrug_Transcribedby;
            //Conclusion
            $UT->inclusionYesNo=$request->inclusionYesNo;
            $UT->Comments=$request->Comments;
            $UT->subjectFit=$request->subjectFit;
            $UT->physicianSign=$request->physicianSign;
            $UT->physicianName=$request->physicianName;

            $UT->save();
            return true;
        }else{
            return false;
        }
    }

    //update SP2_UrineTest
    public function updateSP2($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP2 = StudyPeriod2::where('SP2_ID',$PSS->SP2_ID)->first();
            $UT = SP2_UrineTest::where('SP2_UrineTest_ID', $findSP2->SP2_UrineTest)->first();

            $UT->UPreg_male=$request->UPreg_male;
            if($request->UPreg_male == 1){
                //if subject is male
                $UT->UPreg_dateTaken=NULL;
                $UT->UPreg_TestTime=NULL;
                $UT->UPreg_ReadTime=NULL;
                $UT->UPreg_Laboratory=NULL;
                $UT->UPreg_hCG=NULL;
                $UT->UPreg_hCG_Comment=NULL;
                $UT->UPreg_Transcribedby=NULL;
            }else{
                //if subject is female
                $UT->UPreg_dateTaken=$request->UPreg_dateTaken;
                $UT->UPreg_TestTime=$request->UPreg_TestTime;
                $UT->UPreg_ReadTime=$request->UPreg_ReadTime;
                $upreglab = $request->uPreg_Laboratory;
                if ($upreglab == 'Other') {
                    $UT->UPreg_Laboratory=$request->uPreg_Laboratory_Text;
                } else{
                    $UT->UPreg_Laboratory=$request->uPreg_Laboratory;
                }
                $UT->UPreg_hCG=$request->UPreg_hCG;
                $UT->UPreg_hCG_Comment=$request->UPreg_hCG_Comment;
                $UT->UPreg_Transcribedby=$request->UPreg_Transcribedby;
            }
            //Urine Drug
            $UT->UDrug_dateTaken=$request->UDrug_dateTaken;
            $UT->UDrug_TestTime=$request->UDrug_TestTime;
            $UT->UDrug_ReadTime=$request->UDrug_ReadTime;
            $udruglab = $request->uDrug_Laboratory;
            if ($udruglab == 'Other') {
                $UT->UDrug_Laboratory=$request->uDrug_Laboratory_Text;
            } else{
                $UT->UDrug_Laboratory=$request->uDrug_Laboratory;
            }
            $UT->UDrug_Methamphetamine=$request->UDrug_Methamphetamine;
            $UT->UDrug_Methamphetamine_Comment=$request->UDrug_Methamphetamine_Comment;
            $UT->UDrug_Morphine=$request->UDrug_Morphine;
            $UT->UDrug_Morphine_Comment=$request->UDrug_Morphine_Comment;
            $UT->UDrug_Marijuana=$request->UDrug_Marijuana;
            $UT->UDrug_Marijuana_Comment=$request->UDrug_Marijuana_Comment;
            $UT->UDrug_Transcribedby=$request->UDrug_Transcribedby;
            //Conclusion
            $UT->inclusionYesNo=$request->inclusionYesNo;
            $UT->Comments=$request->Comments;
            $UT->subjectFit=$request->subjectFit;
            $UT->physicianSign=$request->physicianSign;
            $UT->physicianName=$request->physicianName;

            $UT->save();
            return true;
        }else{
            return false;
        }
    }

    //update SP3_UrineTest
    public function updateSP3($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID',$PSS->SP3_ID)->first();
            $UT = SP3_UrineTest::where('SP3_UrineTest_ID', $findSP3->SP3_UrineTest)->first();

            $UT->UPreg_male=$request->UPreg_male;
            if($request->UPreg_male == 1){
                //if subject is male
                $UT->UPreg_dateTaken=NULL;
                $UT->UPreg_TestTime=NULL;
                $UT->UPreg_ReadTime=NULL;
                $UT->UPreg_Laboratory=NULL;
                $UT->UPreg_hCG=NULL;
                $UT->UPreg_hCG_Comment=NULL;
                $UT->UPreg_Transcribedby=NULL;
            }else{
                //if subject is female
                $UT->UPreg_dateTaken=$request->UPreg_dateTaken;
                $UT->UPreg_TestTime=$request->UPreg_TestTime;
                $UT->UPreg_ReadTime=$request->UPreg_ReadTime;
                $upreglab = $request->uPreg_Laboratory;
                if ($upreglab == 'Other') {
                    $UT->UPreg_Laboratory=$request->uPreg_Laboratory_Text;
                } else{
                    $UT->UPreg_Laboratory=$request->uPreg_Laboratory;
                }
                $UT->UPreg_hCG=$request->UPreg_hCG;
                $UT->UPreg_hCG_Comment=$request->UPreg_hCG_Comment;
                $UT->UPreg_Transcribedby=$request->UPreg_Transcribedby;
            }
            //Urine Drug
            $UT->UDrug_dateTaken=$request->UDrug_dateTaken;
            $UT->UDrug_TestTime=$request->UDrug_TestTime;
            $UT->UDrug_ReadTime=$request->UDrug_ReadTime;
            $udruglab = $request->uDrug_Laboratory;
            if ($udruglab == 'Other') {
                $UT->UDrug_Laboratory=$request->uDrug_Laboratory_Text;
            } else{
                $UT->UDrug_Laboratory=$request->uDrug_Laboratory;
            }
            $UT->UDrug_Methamphetamine=$request->UDrug_Methamphetamine;
            $UT->UDrug_Methamphetamine_Comment=$request->UDrug_Methamphetamine_Comment;
            $UT->UDrug_Morphine=$request->UDrug_Morphine;
            $UT->UDrug_Morphine_Comment=$request->UDrug_Morphine_Comment;
            $UT->UDrug_Marijuana=$request->UDrug_Marijuana;
            $UT->UDrug_Marijuana_Comment=$request->UDrug_Marijuana_Comment;
            $UT->UDrug_Transcribedby=$request->UDrug_Transcribedby;
            //Conclusion
            $UT->inclusionYesNo=$request->inclusionYesNo;
            $UT->Comments=$request->Comments;
            $UT->subjectFit=$request->subjectFit;
            $UT->physicianSign=$request->physicianSign;
            $UT->physicianName=$request->physicianName;

            $UT->save();
            return true;
        }else{
            return false;
        }
    }

    //update SP4_UrineTest
    public function updateSP4($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP4 = StudyPeriod4::where('SP4_ID',$PSS->SP4_ID)->first();
            $UT = SP4_UrineTest::where('SP4_UrineTest_ID', $findSP4->SP4_UrineTest)->first();

            $UT->UPreg_male=$request->UPreg_male;
            if($request->UPreg_male == 1){
                //if subject is male
                $UT->UPreg_dateTaken=NULL;
                $UT->UPreg_TestTime=NULL;
                $UT->UPreg_ReadTime=NULL;
                $UT->UPreg_Laboratory=NULL;
                $UT->UPreg_hCG=NULL;
                $UT->UPreg_hCG_Comment=NULL;
                $UT->UPreg_Transcribedby=NULL;
            }else{
                //if subject is female
                $UT->UPreg_dateTaken=$request->UPreg_dateTaken;
                $UT->UPreg_TestTime=$request->UPreg_TestTime;
                $UT->UPreg_ReadTime=$request->UPreg_ReadTime;
                $upreglab = $request->uPreg_Laboratory;
                if ($upreglab == 'Other') {
                    $UT->UPreg_Laboratory=$request->uPreg_Laboratory_Text;
                } else{
                    $UT->UPreg_Laboratory=$request->uPreg_Laboratory;
                }
                $UT->UPreg_hCG=$request->UPreg_hCG;
                $UT->UPreg_hCG_Comment=$request->UPreg_hCG_Comment;
                $UT->UPreg_Transcribedby=$request->UPreg_Transcribedby;
            }
            //Urine Drug
            $UT->UDrug_dateTaken=$request->UDrug_dateTaken;
            $UT->UDrug_TestTime=$request->UDrug_TestTime;
            $UT->UDrug_ReadTime=$request->UDrug_ReadTime;
            $udruglab = $request->uDrug_Laboratory;
            if ($udruglab == 'Other') {
                $UT->UDrug_Laboratory=$request->uDrug_Laboratory_Text;
            } else{
                $UT->UDrug_Laboratory=$request->uDrug_Laboratory;
            }
            $UT->UDrug_Methamphetamine=$request->UDrug_Methamphetamine;
            $UT->UDrug_Methamphetamine_Comment=$request->UDrug_Methamphetamine_Comment;
            $UT->UDrug_Morphine=$request->UDrug_Morphine;
            $UT->UDrug_Morphine_Comment=$request->UDrug_Morphine_Comment;
            $UT->UDrug_Marijuana=$request->UDrug_Marijuana;
            $UT->UDrug_Marijuana_Comment=$request->UDrug_Marijuana_Comment;
            $UT->UDrug_Transcribedby=$request->UDrug_Transcribedby;
            //Conclusion
            $UT->inclusionYesNo=$request->inclusionYesNo;
            $UT->Comments=$request->Comments;
            $UT->subjectFit=$request->subjectFit;
            $UT->physicianSign=$request->physicianSign;
            $UT->physicianName=$request->physicianName;

            $UT->save();
            return true;
        }else{
            return false;
        }
    }

}
