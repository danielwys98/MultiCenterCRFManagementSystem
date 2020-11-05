<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_IQ96;
use App\SP2_IQ96;
use App\SP3_IQ96;
use App\SP4_IQ96;
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use Illuminate\Http\Request;

class SP_IQ96_Controller extends Controller
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
            $IQ96 = SP1_IQ96::where('SP1_IQ96_ID', $SP1->SP1_IQ96)->first();
            if($this->storeSP($findPSS,$PSS,$IQ96,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Interim Questionnaire(96 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $IQ96 = SP2_IQ96::where('SP2_IQ96_ID', $SP2->SP2_IQ96)->first();
            if($this->storeSP($findPSS,$PSS,$IQ96,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Interim Questionnaire(96 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $IQ96 = SP3_IQ96::where('SP3_IQ96_ID', $SP3->SP3_IQ96)->first();
            if($this->storeSP($findPSS,$PSS,$IQ96,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Interim Questionnaire(96 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $IQ96 = SP4_IQ96::where('SP4_IQ96_ID', $SP4->SP4_IQ96)->first();
            if($this->storeSP($findPSS,$PSS,$IQ96,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 4 details for Interim Questionnaire(96 hours Post Dose Visit)!');
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
            $IQ96 = SP1_IQ96::where('SP1_IQ96_ID', $SP1->SP1_IQ96)->first();
            if($this->updateSP($findPSS,$PSS,$IQ96,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 1 details for Interim Questionnaire(96 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $IQ96 = SP2_IQ96::where('SP2_IQ96_ID', $SP2->SP2_IQ96)->first();
            if($this->updateSP($findPSS,$PSS,$IQ96,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 2 details for Interim Questionnaire(96 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $IQ96 = SP3_IQ96::where('SP3_IQ96_ID', $SP3->SP3_IQ96)->first();
            if($this->updateSP($findPSS,$PSS,$IQ96,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 3 details for Interim Questionnaire(96 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $IQ96 = SP4_IQ96::where('SP4_IQ96_ID', $SP4->SP4_IQ96)->first();
            if($this->updateSP($findPSS,$PSS,$IQ96,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 4 details for Interim Questionnaire(96 hours Post Dose Visit)!');
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
    public function storeSP($findPSS,$PSS,$IQ96,$request){
        //custom messages load for validation
        $custom = [
            'dateTaken.required' => 'Please enter the date taken for Interim Questionnaire(96hrs pose dose vist)',
            'timeTaken.required' => 'Please enter the time taken for Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs01.required' => 'Please choose a selection for number 1 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs02.required' => 'Please choose a selection for number 2 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs03.required' => 'Please choose a selection for number 3 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs03txt.required_if' => 'Please specify amount and time taken for number 3 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs04.required' => 'Please choose a selection for number 4 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs04txt.required_if' => 'Please specify amount and time taken for number 4 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs05.required' => 'Please choose a selection for number 5 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs05txt.required_if' => 'Please provide details for number 5 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs06.required' => 'Please choose a selection for number 6 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs06txt.required_if' => 'Please provide details for number 6 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs07.required' => 'Please choose a selection for number 7 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs07txt.required_if' => 'Please provide details for number 7 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs08.required' => 'Please choose a selection for number 8 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrsInterviewedby.required' => 'Please state interviewed by who for Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrsCheckedby.required' => 'Please state checked by who for Interim Questionnaire(96hrs pose dose vist)',
           ];

        if($findPSS !=NULL && $PSS!= NULL){
            if($IQ96->dateTaken == NULL){

                $IQ96->NApplicable=$request->NApplicable;
                if($request->NApplicable == 1){
                    $IQ96->dateTaken=NULL;
                    $IQ96->timeTaken=NULL;
                    $IQ96->interim96hrs01=NULL;
                    $IQ96->interim96hrs02=NULL;
                    $IQ96->interim96hrs03=NULL;
                    $IQ96->interim96hrs04=NULL;
                    $IQ96->interim96hrs05=NULL;
                    $IQ96->interim96hrs06=NULL;
                    $IQ96->interim96hrs07=NULL;
                    $IQ96->Interim96hrsInterviewedby=NULL;
                    $IQ96->Interim96hrsCheckedby=NULL;
                }else{
                    //validation for required fields
                    $validatedData=$this->validate($request,[
                        'dateTaken' => 'required',
                        'timeTaken' => 'required',
                        'Interim96hrs01' => 'required',
                        'Interim96hrs02' => 'required',
                        'Interim96hrs03' => 'required',
                        'Interim96hrs03txt' => 'required_if:Interim96hrs03,==,Yes',
                        'Interim96hrs04' => 'required',
                        'Interim96hrs04txt' => 'required_if:Interim96hrs04,==,Yes',
                        'Interim96hrs05' => 'required',
                        'Interim96hrs05txt' => 'required_if:Interim96hrs05,==,Yes',
                        'Interim96hrs06' => 'required',
                        'Interim96hrs06txt' => 'required_if:Interim96hrs06,==,Yes',
                        'Interim96hrs07' => 'required',
                        'Interim96hrs07txt' => 'required_if:Interim96hrs07,==,Yes',
                        'Interim96hrs08' => 'required',
                        'Interim96hrsInterviewedby' => 'required',
                        'Interim96hrsCheckedby' => 'required',
                    ],$custom);
                    //date and time for interim questionnaire
                    $IQ96->dateTaken=$request->dateTaken;
                    $IQ96->timeTaken=$request->timeTaken;
                    //interim questionnaire
                    $IQ96->interim96hrs01=$request->Interim96hrs01;
                    $IQ96->interim96hrs02=$request->Interim96hrs02;
                    $iq03 = $request->Interim96hrs03;
                    if ($iq03 == 'No') {
                        $IQ96->interim96hrs03=$request->Interim96hrs03;
                    } else{
                        $IQ96->interim96hrs03=$request->Interim96hrs03txt;
                    }
                    $iq04 = $request->Interim96hrs04;
                    if ($iq04 == 'No') {
                        $IQ96->interim96hrs04=$request->Interim96hrs04;
                    } else{
                        $IQ96->interim96hrs04=$request->Interim96hrs04txt;
                    }
                    $iq05 = $request->Interim96hrs05;
                    if ($iq05 == 'No') {
                        $IQ96->interim96hrs05=$request->Interim96hrs05;
                    } else{
                        $IQ96->interim96hrs05=$request->Interim96hrs05txt;
                    }
                    $iq06 = $request->Interim96hrs06;
                    if ($iq06 == 'No') {
                        $IQ96->interim96hrs06=$request->Interim96hrs06;
                    } else{
                        $IQ96->interim96hrs06=$request->Interim96hrs06txt;
                    }
                    $iq07 = $request->Interim96hrs07;
                    if ($iq07 == 'No') {
                        $IQ96->interim96hrs07=$request->Interim96hrs07;
                    } else{
                        $IQ96->interim96hrs07=$request->Interim96hrs07txt;
                    }
                    $IQ96->interim96hrs08=$request->Interim96hrs08;
                    //interviewed and checked by
                    $IQ96->Interim96hrsInterviewedby=$request->Interim96hrsInterviewedby;
                    $IQ96->Interim96hrsCheckedby=$request->Interim96hrsCheckedby;
                }
                
                $IQ96->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //update
    public function updateSP($findPSS,$PSS,$IQ96,$request){
        //custom messages load for validation
        $custom = [
            'dateTaken.required' => 'Please enter the date taken for Interim Questionnaire(96hrs pose dose vist)',
            'timeTaken.required' => 'Please enter the time taken for Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs01.required' => 'Please choose a selection for number 1 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs02.required' => 'Please choose a selection for number 2 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs03.required' => 'Please choose a selection for number 3 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs03txt.required_if' => 'Please specify amount and time taken for number 3 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs04.required' => 'Please choose a selection for number 4 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs04txt.required_if' => 'Please specify amount and time taken for number 4 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs05.required' => 'Please choose a selection for number 5 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs05txt.required_if' => 'Please provide details for number 5 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs06.required' => 'Please choose a selection for number 6 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs06txt.required_if' => 'Please provide details for number 6 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs07.required' => 'Please choose a selection for number 7 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs07txt.required_if' => 'Please provide details for number 7 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrs08.required' => 'Please choose a selection for number 8 in Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrsInterviewedby.required' => 'Please state interviewed by who for Interim Questionnaire(96hrs pose dose vist)',
            'Interim96hrsCheckedby.required' => 'Please state checked by who for Interim Questionnaire(96hrs pose dose vist)',
           ];
        if($findPSS !=NULL){
            $IQ96->NApplicable=$request->NApplicable;
            if($request->NApplicable == 1){
                $IQ96->dateTaken=NULL;
                $IQ96->timeTaken=NULL;
                $IQ96->interim96hrs01=NULL;
                $IQ96->interim96hrs02=NULL;
                $IQ96->interim96hrs03=NULL;
                $IQ96->interim96hrs04=NULL;
                $IQ96->interim96hrs05=NULL;
                $IQ96->interim96hrs06=NULL;
                $IQ96->interim96hrs07=NULL;
                $IQ96->Interim96hrsInterviewedby=NULL;
                $IQ96->Interim96hrsCheckedby=NULL;
            }else{
                //validation for required fields
                // $validatedData=$this->validate($request,[
                //     'dateTaken' => 'required',
                //     'timeTaken' => 'required',
                //     'Interim96hrs01' => 'required',
                //     'Interim96hrs02' => 'required',
                //     'Interim96hrs03' => 'required',
                //     'Interim96hrs03txt' => 'required_if:Interim96hrs03,==,Yes',
                //     'Interim96hrs04' => 'required',
                //     'Interim96hrs04txt' => 'required_if:Interim96hrs04,==,Yes',
                //     'Interim96hrs05' => 'required',
                //     'Interim96hrs05txt' => 'required_if:Interim96hrs05,==,Yes',
                //     'Interim96hrs06' => 'required',
                //     'Interim96hrs06txt' => 'required_if:Interim96hrs06,==,Yes',
                //     'Interim96hrs07' => 'required',
                //     'Interim96hrs07txt' => 'required_if:Interim96hrs07,==,Yes',
                //     'Interim96hrs08' => 'required',
                //     'Interim96hrsInterviewedby' => 'required',
                //     'Interim96hrsCheckedby' => 'required',
                // ],$custom);
                //date and time for interim questionnaire
                $IQ96->dateTaken=$request->dateTaken;
                $IQ96->timeTaken=$request->timeTaken;
                //interim questionnaire
                $IQ96->interim96hrs01=$request->Interim96hrs01;
                $IQ96->interim96hrs02=$request->Interim96hrs02;
                $iq03 = $request->Interim96hrs03;
                if ($iq03 == 'No') {
                    $IQ96->interim96hrs03=$request->Interim96hrs03;
                } else{
                    $IQ96->interim96hrs03=$request->Interim96hrs03txt;
                }
                $iq04 = $request->Interim96hrs04;
                if ($iq04 == 'No') {
                    $IQ96->interim96hrs04=$request->Interim96hrs04;
                } else{
                    $IQ96->interim96hrs04=$request->Interim96hrs04txt;
                }
                $iq05 = $request->Interim96hrs05;
                if ($iq05 == 'No') {
                    $IQ96->interim96hrs05=$request->Interim96hrs05;
                } else{
                    $IQ96->interim96hrs05=$request->Interim96hrs05txt;
                }
                $iq06 = $request->Interim96hrs06;
                if ($iq06 == 'No') {
                    $IQ96->interim96hrs06=$request->Interim96hrs06;
                } else{
                    $IQ96->interim96hrs06=$request->Interim96hrs06txt;
                }
                $iq07 = $request->Interim96hrs07;
                if ($iq07 == 'No') {
                    $IQ96->interim96hrs07=$request->Interim96hrs07;
                } else{
                    $IQ96->interim96hrs07=$request->Interim96hrs07txt;
                }
                $IQ96->interim96hrs08=$request->Interim96hrs08;
                //interviewed and checked by
                $IQ96->Interim96hrsInterviewedby=$request->Interim96hrsInterviewedby;
                $IQ96->Interim96hrsCheckedby=$request->Interim96hrsCheckedby;
            }

            $IQ96->save();
            return true;
        }else{
            return false;
        }
    }
    
}
