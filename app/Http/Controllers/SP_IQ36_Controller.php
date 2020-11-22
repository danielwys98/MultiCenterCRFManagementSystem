<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_IQ36;
use App\SP2_IQ36;
use App\SP3_IQ36;
use App\SP4_IQ36;
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use Illuminate\Http\Request;

class SP_IQ36_Controller extends Controller
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
            $IQ36 = SP1_IQ36::where('SP1_IQ36_ID', $SP1->SP1_IQ36)->first();
            if($this->storeSP($findPSS,$PSS,$IQ36,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $IQ36 = SP2_IQ36::where('SP2_IQ36_ID', $SP2->SP2_IQ36)->first();
            if($this->storeSP($findPSS,$PSS,$IQ36,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $IQ36 = SP3_IQ36::where('SP3_IQ36_ID', $SP3->SP3_IQ36)->first();
            if($this->storeSP($findPSS,$PSS,$IQ36,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $IQ36 = SP4_IQ36::where('SP4_IQ36_ID', $SP4->SP4_IQ36)->first();
            if($this->storeSP($findPSS,$PSS,$IQ36,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 4 details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            /*return redirect(route('studySpecific.input',$study_id));*/
            return redirect()->back()->withInput();
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
            $IQ36 = SP1_IQ36::where('SP1_IQ36_ID', $SP1->SP1_IQ36)->first();
            if($this->updateSP($findPSS,$PSS,$IQ36,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 1 details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $IQ36 = SP2_IQ36::where('SP2_IQ36_ID', $SP2->SP2_IQ36)->first();
            if($this->updateSP($findPSS,$PSS,$IQ36,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 2 details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $IQ36 = SP3_IQ36::where('SP3_IQ36_ID', $SP3->SP3_IQ36)->first();
            if($this->updateSP($findPSS,$PSS,$IQ36,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 3 details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $IQ36 = SP4_IQ36::where('SP4_IQ36_ID', $SP4->SP4_IQ36)->first();
            if($this->updateSP($findPSS,$PSS,$IQ36,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 4 details for Interim Questionnaire(36 hours Post Dose Visit)!');
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
    public function storeSP($findPSS,$PSS,$IQ36,$request){
        //custom messages load for validation
        $custom = [
            'dateTaken.required' => 'Please enter the date taken for Interim Questionnaire(36hrs pose dose vist)',
            'timeTaken.required' => 'Please enter the time taken for Interim Questionnaire(36hrs pose dose vist)',
            'Interim36hrs01.required' => 'Please choose a selection for number 1 in Interim Questionnaire(36hrs pose dose vist)',
            'Interim36hrs02.required' => 'Please choose a selection for number 2 in Interim Questionnaire(36hrs pose dose vist)',
            'Interim36hrs03.required' => 'Please choose a selection for number 3 in Interim Questionnaire(36hrs pose dose vist)',
            'Interim36hrs03txt.required_if' => 'Please specify amount and time taken for number 3 in Interim Questionnaire(36hrs pose dose vist)',
            'Interim36hrs04.required' => 'Please choose a selection for number 4 in Interim Questionnaire(36hrs pose dose vist)',
            'Interim36hrs04txt.required_if' => 'Please specify amount and time taken for number 4 in Interim Questionnaire(36hrs pose dose vist)',
            'Interim36hrs05.required' => 'Please choose a selection for number 5 in Interim Questionnaire(36hrs pose dose vist)',
            'Interim36hrs05txt.required_if' => 'Please provide details for number 5 in Interim Questionnaire(36hrs pose dose vist)',
            'Interim36hrs06.required' => 'Please choose a selection for number 6 in Interim Questionnaire(36hrs pose dose vist)',
            'Interim36hrs06txt.required_if' => 'Please provide details for number 6 in Interim Questionnaire(36hrs pose dose vist)',
            'Interim36hrs07.required' => 'Please choose a selection for number 7 in Interim Questionnaire(36hrs pose dose vist)',
            'Interim36hrs07txt.required_if' => 'Please provide details for number 7 in Interim Questionnaire(36hrs pose dose vist)',
            'Interim36hrs08.required' => 'Please choose a selection for number 8 in Interim Questionnaire(36hrs pose dose vist)',
            'Interim36hrsInterviewedby.required' => 'Please state interviewed by who for Interim Questionnaire(36hrs pose dose vist)',
            'Interim36hrsCheckedby.required' => 'Please state checked by who for Interim Questionnaire(36hrs pose dose vist)',
           ];

        if($findPSS !=NULL && $PSS!= NULL){
            if($IQ36->dateTaken == NULL){
                if($request->Absent == 1){
                    $IQ36->dateTaken=NULL;
                    $IQ36->timeTaken=NULL;
                    $IQ36->interim36hrs01=NULL;
                    $IQ36->interim36hrs02=NULL;
                    $IQ36->interim36hrs03=NULL;
                    $IQ36->interim36hrs04=NULL;
                    $IQ36->interim36hrs05=NULL;
                    $IQ36->interim36hrs06=NULL;
                    $IQ36->interim36hrs07=NULL;
                    $IQ36->Interim36hrsInterviewedby=NULL;
                    $IQ36->Interim36hrsCheckedby=NULL;
                }else{
                    if($request->NApplicable == 1){
                        $IQ36->dateTaken=NULL;
                        $IQ36->timeTaken=NULL;
                        $IQ36->interim36hrs01=NULL;
                        $IQ36->interim36hrs02=NULL;
                        $IQ36->interim36hrs03=NULL;
                        $IQ36->interim36hrs04=NULL;
                        $IQ36->interim36hrs05=NULL;
                        $IQ36->interim36hrs06=NULL;
                        $IQ36->interim36hrs07=NULL;
                        $IQ36->Interim36hrsInterviewedby=NULL;
                        $IQ36->Interim36hrsCheckedby=NULL;
                    }else{
                        //validation for required fields
                        $validatedData=$this->validate($request,[
                            'dateTaken' => 'required',
                            'timeTaken' => 'required',
                            'Interim36hrs01' => 'required',
                            'Interim36hrs02' => 'required',
                            'Interim36hrs03' => 'required',
                            'Interim36hrs03txt' => 'required_if:Interim36hrs03,==,Yes',
                            'Interim36hrs04' => 'required',
                            'Interim36hrs04txt' => 'required_if:Interim36hrs04,==,Yes',
                            'Interim36hrs05' => 'required',
                            'Interim36hrs05txt' => 'required_if:Interim36hrs05,==,Yes',
                            'Interim36hrs06' => 'required',
                            'Interim36hrs06txt' => 'required_if:Interim36hrs06,==,Yes',
                            'Interim36hrs07' => 'required',
                            'Interim36hrs07txt' => 'required_if:Interim36hrs07,==,Yes',
                            'Interim36hrs08' => 'required',
                            'Interim36hrsInterviewedby' => 'required',
                            'Interim36hrsCheckedby' => 'required',
                        ],$custom);
                        //date and time for interim questionnaire
                        $IQ36->dateTaken=$request->dateTaken;
                        $IQ36->timeTaken=$request->timeTaken;
                        //interim questionnaire
                        $IQ36->interim36hrs01=$request->Interim36hrs01;
                        $IQ36->interim36hrs02=$request->Interim36hrs02;
                        $iq03 = $request->Interim36hrs03;
                        if ($iq03 == 'No') {
                            $IQ36->interim36hrs03=$request->Interim36hrs03;
                        } else{
                            $IQ36->interim36hrs03=$request->Interim36hrs03txt;
                        }
                        $iq04 = $request->Interim36hrs04;
                        if ($iq04 == 'No') {
                            $IQ36->interim36hrs04=$request->Interim36hrs04;
                        } else{
                            $IQ36->interim36hrs04=$request->Interim36hrs04txt;
                        }
                        $iq05 = $request->Interim36hrs05;
                        if ($iq05 == 'No') {
                            $IQ36->interim36hrs05=$request->Interim36hrs05;
                        } else{
                            $IQ36->interim36hrs05=$request->Interim36hrs05txt;
                        }
                        $iq06 = $request->Interim36hrs06;
                        if ($iq06 == 'No') {
                            $IQ36->interim36hrs06=$request->Interim36hrs06;
                        } else{
                            $IQ36->interim36hrs06=$request->Interim36hrs06txt;
                        }
                        $iq07 = $request->Interim36hrs07;
                        if ($iq07 == 'No') {
                            $IQ36->interim36hrs07=$request->Interim36hrs07;
                        } else{
                            $IQ36->interim36hrs07=$request->Interim36hrs07txt;
                        }
                        $IQ36->interim36hrs08=$request->Interim36hrs08;
                        //interviewed and checked by
                        $IQ36->Interim36hrsInterviewedby=$request->Interim36hrsInterviewedby;
                        $IQ36->Interim36hrsCheckedby=$request->Interim36hrsCheckedby;
                    }
                }

                $IQ36->Absent=$request->Absent;
                $IQ36->NApplicable=$request->NApplicable;
                $IQ36->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //update
    public function updateSP($findPSS,$PSS,$IQ36,$request){
        if($findPSS !=NULL){
            if($request->Absent == 1){
                $IQ36->dateTaken=NULL;
                $IQ36->timeTaken=NULL;
                $IQ36->interim36hrs01=NULL;
                $IQ36->interim36hrs02=NULL;
                $IQ36->interim36hrs03=NULL;
                $IQ36->interim36hrs04=NULL;
                $IQ36->interim36hrs05=NULL;
                $IQ36->interim36hrs06=NULL;
                $IQ36->interim36hrs07=NULL;
                $IQ36->Interim36hrsInterviewedby=NULL;
                $IQ36->Interim36hrsCheckedby=NULL;
            }else{
                if($request->NApplicable == 1){
                    $IQ36->dateTaken=NULL;
                    $IQ36->timeTaken=NULL;
                    $IQ36->interim36hrs01=NULL;
                    $IQ36->interim36hrs02=NULL;
                    $IQ36->interim36hrs03=NULL;
                    $IQ36->interim36hrs04=NULL;
                    $IQ36->interim36hrs05=NULL;
                    $IQ36->interim36hrs06=NULL;
                    $IQ36->interim36hrs07=NULL;
                    $IQ36->Interim36hrsInterviewedby=NULL;
                    $IQ36->Interim36hrsCheckedby=NULL;
                }else{
                    //date and time for interim questionnaire
                    $IQ36->dateTaken=$request->dateTaken;
                    $IQ36->timeTaken=$request->timeTaken;
                    //interim questionnaire
                    $IQ36->interim36hrs01=$request->Interim36hrs01;
                    $IQ36->interim36hrs02=$request->Interim36hrs02;
                    $iq03 = $request->Interim36hrs03;
                    if ($iq03 == 'No') {
                        $IQ36->interim36hrs03=$request->Interim36hrs03;
                    } else{
                        $IQ36->interim36hrs03=$request->Interim36hrs03txt;
                    }
                    $iq04 = $request->Interim36hrs04;
                    if ($iq04 == 'No') {
                        $IQ36->interim36hrs04=$request->Interim36hrs04;
                    } else{
                        $IQ36->interim36hrs04=$request->Interim36hrs04txt;
                    }
                    $iq05 = $request->Interim36hrs05;
                    if ($iq05 == 'No') {
                        $IQ36->interim36hrs05=$request->Interim36hrs05;
                    } else{
                        $IQ36->interim36hrs05=$request->Interim36hrs05txt;
                    }
                    $iq06 = $request->Interim36hrs06;
                    if ($iq06 == 'No') {
                        $IQ36->interim36hrs06=$request->Interim36hrs06;
                    } else{
                        $IQ36->interim36hrs06=$request->Interim36hrs06txt;
                    }
                    $iq07 = $request->Interim36hrs07;
                    if ($iq07 == 'No') {
                        $IQ36->interim36hrs07=$request->Interim36hrs07;
                    } else{
                        $IQ36->interim36hrs07=$request->Interim36hrs07txt;
                    }
                    $IQ36->interim36hrs08=$request->Interim36hrs08;
                    //interviewed and checked by
                    $IQ36->Interim36hrsInterviewedby=$request->Interim36hrsInterviewedby;
                    $IQ36->Interim36hrsCheckedby=$request->Interim36hrsCheckedby;
                }
            }

            $IQ36->Absent=$request->Absent;
            $IQ36->NApplicable=$request->NApplicable;
            $IQ36->save();
            return true;
        }else{
            return false;
        }
    }

}
