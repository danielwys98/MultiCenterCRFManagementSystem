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

class SP_UrineTest_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request,$study_id)
    {
        $PID = $request->patient_id;
        $study_period = $request->studyPeriod;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id',$PID)
                                        ->where('study_id',$study_id)
                                        ->first();
        //check study period and save
        if($study_period == 1){
            //SP1 query
            $SP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $PSS = $findPSS->SP1_ID;
            $UT = SP1_UrineTest::where('SP1_UrineTest_ID', $SP1->SP1_UrineTest)->first();
            if($this->storeSP($findPSS,$PSS,$UT,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Urine Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $UT = SP2_UrineTest::where('SP2_UrineTest_ID', $SP2->SP2_UrineTest)->first();
            if($this->storeSP($findPSS,$PSS,$UT,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Urine Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $UT = SP3_UrineTest::where('SP3_UrineTest_ID', $SP3->SP3_UrineTest)->first();
            if($this->storeSP($findPSS,$PSS,$UT,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Urine Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $UT = SP4_UrineTest::where('SP4_UrineTest_ID', $SP4->SP4_UrineTest)->first();
            if($this->storeSP($findPSS,$PSS,$UT,$request)){
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

    public function update(Request $request, $patient_id, $study_id,$study_period){
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id',$patient_id)
                                        ->where('study_id',$study_id)
                                        ->first();
        //check study period and save
        if($study_period == 1){
            //SP1 query
            $SP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $PSS = $findPSS->SP1_ID;
            $UT = SP1_UrineTest::where('SP1_UrineTest_ID', $SP1->SP1_UrineTest)->first();
            if($this->updateSP($findPSS,$PSS,$UT,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 1 details for Urine Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $UT = SP2_UrineTest::where('SP2_UrineTest_ID', $SP2->SP2_UrineTest)->first();
            if($this->updateSP($findPSS,$PSS,$UT,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 2 details for Urine Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $UT = SP3_UrineTest::where('SP3_UrineTest_ID', $SP3->SP3_UrineTest)->first();
            if($this->updateSP($findPSS,$PSS,$UT,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 3 details for Urine Test!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $UT = SP4_UrineTest::where('SP4_UrineTest_ID', $SP4->SP4_UrineTest)->first();
            if($this->updateSP($findPSS,$PSS,$UT,$request)){
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

    //store
    public function storeSP($findPSS,$PSS,$UT,$request){
        //custom messages load for validation
        $custom = [
            'UPreg_dateTaken.required_if' => 'Please enter the date taken for urine pregnancy test',
            'UPreg_TestTime.required_if' => 'Please enter the test time for urine pregnancy test',
            'UPreg_ReadTime.required_if' => 'Please enter the read time for urine pregnancy test',
            'uPreg_Laboratory.required_if' => 'Please select which laboratory does the urine pregnancy test conducted',
            'uPreg_Laboratory_Text.required_if' => 'If other laboratory were selected, please state the name of the laboratory where urine pregnancy test conducted',
            'UPreg_hCG.required_if' => 'Please select the results of hCG(Human chorionic gonadotropin) for urine pregnancy test',
            'UPreg_Transcribedby.required_if' => 'Please state the user transcribed for urine pregnancy test',
            'UDrug_dateTaken.required_if' => 'Please enter the date taken for urine drugs of abuse test',
            'UDrug_TestTime.required_if' => 'Please enter the test time for urine drugs of abuse test',
            'UDrug_ReadTime.required_if' => 'Please enter the read time for urine drugs of abuse test',
            'uDrug_Laboratory.required_if' => 'Please select which laboratory does the urine drugs of abuse test conducted',
            'uDrug_Laboratory_Text.required_if' => 'If other laboratory were selected, please state the name of the laboratory where urine drugs of abuse test conducted',
            'UDrug_Methamphetamine.required_if' => 'Please select the results of Methamphetamine for urine drugs of abuse test',
            'UDrug_Morphine.required_if' => 'Please select the results of Morphine for urine drugs of abuse test',
            'UDrug_Marijuana.required_if' => 'Please select the results of Marijuana for urine drugs of abuse test',
            'UDrug_Transcribedby.required_if' => 'Please state the user transcribed for urine drugs of abuse test',
            'inclusionYesNo.required' => 'Please select whether the subject fulfill all the inclusion criteria and none of the exclusion criteria',
            'subjectFit.required' => 'Please select whether the subject is fit for dosing',
            'physicianSign.required' => 'Physician’s signature is required',
            'physicianName.required' => 'Physician’s name is required',
           ];
        if($findPSS !=NULL && $PSS != NULL){
            //validation for required fields
            $validatedData=$this->validate($request,[
                'uPreg_Laboratory' => 'required_if:UPreg_male,==,',
                'uPreg_Laboratory_Text' => 'required_if:uPreg_Laboratory,==,Other',
                'uDrug_Laboratory' => 'required_if:NApplicable,==,',
                'uDrug_Laboratory_Text' => 'required_if:uDrug_Laboratory,==,Other',
                'UPreg_dateTaken' => 'required_if:UPreg_male,==,',
                'UPreg_TestTime' => 'required_if:UPreg_male,==,',
                'UPreg_ReadTime' => 'required_if:UPreg_male,==,',
                'UPreg_hCG' => 'required_if:UPreg_male,==,',
                'UPreg_Transcribedby' => 'required_if:UPreg_male,==,',
                'UDrug_dateTaken' => 'required_if:NApplicable,==,',
                'UDrug_TestTime' => 'required_if:NApplicable,==,',
                'UDrug_ReadTime' => 'required_if:NApplicable,==,',
                'UDrug_Methamphetamine' => 'required_if:NApplicable,==,',
                'UDrug_Morphine' => 'required_if:NApplicable,==,',
                'UDrug_Marijuana' => 'required_if:NApplicable,==,',
                'UDrug_Transcribedby' => 'required_if:NApplicable,==,',
                'inclusionYesNo' => 'required',
                'subjectFit' => 'required',
                'physicianSign' => 'required',
                'physicianName' => 'required',
            ],$custom);

            if($UT->inclusionYesNo == NULL){
                //Urine Pregnacy
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
                $UT->NApplicable=$request->NApplicable;
                //Urine Drug
                if($request->NApplicable == 1){
                    $UT->UDrug_dateTaken=NULL;
                    $UT->UDrug_TestTime=NULL;
                    $UT->UDrug_ReadTime=NULL;
                    $UT->UDrug_Laboratory=NULL;
                    $UT->UDrug_Methamphetamine=NULL;
                    $UT->UDrug_Methamphetamine_Comment=NULL;
                    $UT->UDrug_Morphine=NULL;
                    $UT->UDrug_Morphine_Comment=NULL;
                    $UT->UDrug_Marijuana=NULL;
                    $UT->UDrug_Marijuana_Comment=NULL;
                    $UT->UDrug_Transcribedby=NULL;
                }else{
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
                }
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

    //update
    public function updateSP($findPSS,$PSS,$UT,$request){ 
        if($findPSS !=NULL){
            //Urine Pregnacy
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
            $UT->NApplicable=$request->NApplicable;
            //Urine Drug
            if($request->NApplicable == 1){
                $UT->UDrug_dateTaken=NULL;
                $UT->UDrug_TestTime=NULL;
                $UT->UDrug_ReadTime=NULL;
                $UT->UDrug_Laboratory=NULL;
                $UT->UDrug_Methamphetamine=NULL;
                $UT->UDrug_Methamphetamine_Comment=NULL;
                $UT->UDrug_Morphine=NULL;
                $UT->UDrug_Morphine_Comment=NULL;
                $UT->UDrug_Marijuana=NULL;
                $UT->UDrug_Marijuana_Comment=NULL;
                $UT->UDrug_Transcribedby=NULL;
            }else{
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
            }
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
