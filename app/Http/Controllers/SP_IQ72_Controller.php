<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_IQ72;
use App\SP2_IQ72;
use App\SP3_IQ72;
use App\SP4_IQ72;
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use Illuminate\Http\Request;

class SP_IQ72_Controller extends Controller
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
            $IQ72 = SP1_IQ72::where('SP1_IQ72_ID', $SP1->SP1_IQ72)->first();
            if($this->storeSP($findPSS,$PSS,$IQ72,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Interim Questionnaire(72 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $IQ72 = SP2_IQ72::where('SP2_IQ72_ID', $SP2->SP2_IQ72)->first();
            if($this->storeSP($findPSS,$PSS,$IQ72,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Interim Questionnaire(72 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $IQ72 = SP3_IQ72::where('SP3_IQ72_ID', $SP3->SP3_IQ72)->first();
            if($this->storeSP($findPSS,$PSS,$IQ72,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Interim Questionnaire(72 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $IQ72 = SP4_IQ72::where('SP4_IQ72_ID', $SP4->SP4_IQ72)->first();
            if($this->storeSP($findPSS,$PSS,$IQ72,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 4 details for Interim Questionnaire(72 hours Post Dose Visit)!');
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
            //SP1 query
            $SP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $PSS = $findPSS->SP1_ID;
            $IQ72 = SP1_IQ72::where('SP1_IQ72_ID', $SP1->SP1_IQ72)->first();
            if($this->updateSP($findPSS,$PSS,$IQ72,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 1 details for Interim Questionnaire(72 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $IQ72 = SP2_IQ72::where('SP2_IQ72_ID', $SP2->SP2_IQ72)->first();
            if($this->updateSP($findPSS,$PSS,$IQ72,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 2 details for Interim Questionnaire(72 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $IQ72 = SP3_IQ72::where('SP3_IQ72_ID', $SP3->SP3_IQ72)->first();
            if($this->updateSP($findPSS,$PSS,$IQ72,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 3 details for Interim Questionnaire(72 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $IQ72 = SP4_IQ72::where('SP4_IQ72_ID', $SP4->SP4_IQ72)->first();
            if($this->updateSP($findPSS,$PSS,$IQ72,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 4 details for Interim Questionnaire(72 hours Post Dose Visit)!');
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
    public function storeSP($findPSS,$PSS,$IQ72,$request){
        //custom messages load for validation
        $custom = [
            'dateTaken.required' => 'Please enter the date taken for Interim Questionnaire(72hrs pose dose vist)',
            'timeTaken.required' => 'Please enter the time taken for Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs01.required' => 'Please choose a selection for number 1 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs02.required' => 'Please choose a selection for number 2 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs03.required' => 'Please choose a selection for number 3 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs03txt.required_if' => 'Please specify amount and time taken for number 3 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs04.required' => 'Please choose a selection for number 4 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs04txt.required_if' => 'Please specify amount and time taken for number 4 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs05.required' => 'Please choose a selection for number 5 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs05txt.required_if' => 'Please provide details for number 5 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs06.required' => 'Please choose a selection for number 6 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs06txt.required_if' => 'Please provide details for number 6 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs07.required' => 'Please choose a selection for number 7 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs07txt.required_if' => 'Please provide details for number 7 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs08.required' => 'Please choose a selection for number 8 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrsInterviewedby.required' => 'Please state interviewed by who for Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrsCheckedby.required' => 'Please state checked by who for Interim Questionnaire(72hrs pose dose vist)',
           ];

        if($findPSS !=NULL && $PSS!= NULL){
            if($IQ72->dateTaken == NULL){

                $IQ72->NApplicable=$request->NApplicable;
                if($request->NApplicable == 1){
                    $IQ72->dateTaken=NULL;
                    $IQ72->timeTaken=NULL;
                    $IQ72->interim72hrs01=NULL;
                    $IQ72->interim72hrs02=NULL;
                    $IQ72->interim72hrs03=NULL;
                    $IQ72->interim72hrs04=NULL;
                    $IQ72->interim72hrs05=NULL;
                    $IQ72->interim72hrs06=NULL;
                    $IQ72->interim72hrs07=NULL;
                    $IQ72->Interim72hrsInterviewedby=NULL;
                    $IQ72->Interim72hrsCheckedby=NULL;
                }else{
                    //validation for required fields
                    $validatedData=$this->validate($request,[
                        'dateTaken' => 'required',
                        'timeTaken' => 'required',
                        'Interim72hrs01' => 'required',
                        'Interim72hrs02' => 'required',
                        'Interim72hrs03' => 'required',
                        'Interim72hrs03txt' => 'required_if:Interim72hrs03,==,Yes',
                        'Interim72hrs04' => 'required',
                        'Interim72hrs04txt' => 'required_if:Interim72hrs04,==,Yes',
                        'Interim72hrs05' => 'required',
                        'Interim72hrs05txt' => 'required_if:Interim72hrs05,==,Yes',
                        'Interim72hrs06' => 'required',
                        'Interim72hrs06txt' => 'required_if:Interim72hrs06,==,Yes',
                        'Interim72hrs07' => 'required',
                        'Interim72hrs07txt' => 'required_if:Interim72hrs07,==,Yes',
                        'Interim72hrs08' => 'required',
                        'Interim72hrsInterviewedby' => 'required',
                        'Interim72hrsCheckedby' => 'required',
                    ],$custom);
                    //date and time for interim questionnaire
                    $IQ72->dateTaken=$request->dateTaken;
                    $IQ72->timeTaken=$request->timeTaken;
                    //interim questionnaire
                    $IQ72->interim72hrs01=$request->Interim72hrs01;
                    $IQ72->interim72hrs02=$request->Interim72hrs02;
                    $iq03 = $request->Interim72hrs03;
                    if ($iq03 == 'No') {
                        $IQ72->interim72hrs03=$request->Interim72hrs03;
                    } else{
                        $IQ72->interim72hrs03=$request->Interim72hrs03txt;
                    }
                    $iq04 = $request->Interim72hrs04;
                    if ($iq04 == 'No') {
                        $IQ72->interim72hrs04=$request->Interim72hrs04;
                    } else{
                        $IQ72->interim72hrs04=$request->Interim72hrs04txt;
                    }
                    $iq05 = $request->Interim72hrs05;
                    if ($iq05 == 'No') {
                        $IQ72->interim72hrs05=$request->Interim72hrs05;
                    } else{
                        $IQ72->interim72hrs05=$request->Interim72hrs05txt;
                    }
                    $iq06 = $request->Interim72hrs06;
                    if ($iq06 == 'No') {
                        $IQ72->interim72hrs06=$request->Interim72hrs06;
                    } else{
                        $IQ72->interim72hrs06=$request->Interim72hrs06txt;
                    }
                    $iq07 = $request->Interim72hrs07;
                    if ($iq07 == 'No') {
                        $IQ72->interim72hrs07=$request->Interim72hrs07;
                    } else{
                        $IQ72->interim72hrs07=$request->Interim72hrs07txt;
                    }
                    $IQ72->interim72hrs08=$request->Interim72hrs08;
                    //interviewed and checked by
                    $IQ72->Interim72hrsInterviewedby=$request->Interim72hrsInterviewedby;
                    $IQ72->Interim72hrsCheckedby=$request->Interim72hrsCheckedby;
                }
                
                $IQ72->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //update
    public function updateSP($findPSS,$PSS,$IQ72,$request){
        //custom messages load for validation
        $custom = [
            'dateTaken.required' => 'Please enter the date taken for Interim Questionnaire(72hrs pose dose vist)',
            'timeTaken.required' => 'Please enter the time taken for Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs01.required' => 'Please choose a selection for number 1 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs02.required' => 'Please choose a selection for number 2 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs03.required' => 'Please choose a selection for number 3 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs03txt.required_if' => 'Please specify amount and time taken for number 3 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs04.required' => 'Please choose a selection for number 4 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs04txt.required_if' => 'Please specify amount and time taken for number 4 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs05.required' => 'Please choose a selection for number 5 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs05txt.required_if' => 'Please provide details for number 5 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs06.required' => 'Please choose a selection for number 6 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs06txt.required_if' => 'Please provide details for number 6 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs07.required' => 'Please choose a selection for number 7 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs07txt.required_if' => 'Please provide details for number 7 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrs08.required' => 'Please choose a selection for number 8 in Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrsInterviewedby.required' => 'Please state interviewed by who for Interim Questionnaire(72hrs pose dose vist)',
            'Interim72hrsCheckedby.required' => 'Please state checked by who for Interim Questionnaire(72hrs pose dose vist)',
           ];
        if($findPSS !=NULL){
            $IQ72->NApplicable=$request->NApplicable;
            if($request->NApplicable == 1){
                $IQ72->dateTaken=NULL;
                $IQ72->timeTaken=NULL;
                $IQ72->interim72hrs01=NULL;
                $IQ72->interim72hrs02=NULL;
                $IQ72->interim72hrs03=NULL;
                $IQ72->interim72hrs04=NULL;
                $IQ72->interim72hrs05=NULL;
                $IQ72->interim72hrs06=NULL;
                $IQ72->interim72hrs07=NULL;
                $IQ72->Interim72hrsInterviewedby=NULL;
                $IQ72->Interim72hrsCheckedby=NULL;
            }else{
                //validation for required fields
                // $validatedData=$this->validate($request,[
                //     'dateTaken' => 'required',
                //     'timeTaken' => 'required',
                //     'Interim72hrs01' => 'required',
                //     'Interim72hrs02' => 'required',
                //     'Interim72hrs03' => 'required',
                //     'Interim72hrs03txt' => 'required_if:Interim72hrs03,==,Yes',
                //     'Interim72hrs04' => 'required',
                //     'Interim72hrs04txt' => 'required_if:Interim72hrs04,==,Yes',
                //     'Interim72hrs05' => 'required',
                //     'Interim72hrs05txt' => 'required_if:Interim72hrs05,==,Yes',
                //     'Interim72hrs06' => 'required',
                //     'Interim72hrs06txt' => 'required_if:Interim72hrs06,==,Yes',
                //     'Interim72hrs07' => 'required',
                //     'Interim72hrs07txt' => 'required_if:Interim72hrs07,==,Yes',
                //     'Interim72hrs08' => 'required',
                //     'Interim72hrsInterviewedby' => 'required',
                //     'Interim72hrsCheckedby' => 'required',
                // ],$custom);
                //date and time for interim questionnaire
                $IQ72->dateTaken=$request->dateTaken;
                $IQ72->timeTaken=$request->timeTaken;
                //interim questionnaire
                $IQ72->interim72hrs01=$request->Interim72hrs01;
                $IQ72->interim72hrs02=$request->Interim72hrs02;
                $iq03 = $request->Interim72hrs03;
                if ($iq03 == 'No') {
                    $IQ72->interim72hrs03=$request->Interim72hrs03;
                } else{
                    $IQ72->interim72hrs03=$request->Interim72hrs03txt;
                }
                $iq04 = $request->Interim72hrs04;
                if ($iq04 == 'No') {
                    $IQ72->interim72hrs04=$request->Interim72hrs04;
                } else{
                    $IQ72->interim72hrs04=$request->Interim72hrs04txt;
                }
                $iq05 = $request->Interim72hrs05;
                if ($iq05 == 'No') {
                    $IQ72->interim72hrs05=$request->Interim72hrs05;
                } else{
                    $IQ72->interim72hrs05=$request->Interim72hrs05txt;
                }
                $iq06 = $request->Interim72hrs06;
                if ($iq06 == 'No') {
                    $IQ72->interim72hrs06=$request->Interim72hrs06;
                } else{
                    $IQ72->interim72hrs06=$request->Interim72hrs06txt;
                }
                $iq07 = $request->Interim72hrs07;
                if ($iq07 == 'No') {
                    $IQ72->interim72hrs07=$request->Interim72hrs07;
                } else{
                    $IQ72->interim72hrs07=$request->Interim72hrs07txt;
                }
                $IQ72->interim72hrs08=$request->Interim72hrs08;
                //interviewed and checked by
                $IQ72->Interim72hrsInterviewedby=$request->Interim72hrsInterviewedby;
                $IQ72->Interim72hrsCheckedby=$request->Interim72hrsCheckedby;
            }

            $IQ72->save();
            return true;
        }else{
            return false;
        }
    }
    
}
