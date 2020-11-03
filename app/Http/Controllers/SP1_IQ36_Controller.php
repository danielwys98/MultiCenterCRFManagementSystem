<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientStudySpecific;
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use App\SP1_IQ36;
use App\SP2_IQ36;
use App\SP3_IQ36;
use App\SP4_IQ36;
use DB;

class SP1_IQ36_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request,$study_id)
    {
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
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            if($this->storeSP2($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            if($this->storeSP3($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            if($this->storeSP4($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 4 details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.input',$study_id));
        }
    }

    public function update(Request $request, $patient_id, $study_id)
    {
        $study_period = $request->studyPeriod;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id',$patient_id)
                                        ->where('study_id',$study_id)
                                        ->first();
        //check study period and save
        if($study_period == '---'){
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }elseif($study_period == 1){
            if($this->updateSP1($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully update the study period 1 details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            if($this->updateSP2($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully update the study period 2 details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            if($this->updateSP3($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully update the study period 3 details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            if($this->updateSP4($findPSS,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully update the study period 4 details for Interim Questionnaire(36 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }else{
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.input',$study_id));
        }
    }

    //store SP1_IQ36
    public function storeSP1($PSS,$request){
        if($PSS !=NULL && $PSS->SP1_ID != NULL){
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$PSS->SP1_ID)->first();
            $IQ36 = SP1_IQ36::where('SP1_IQ36_ID', $findSP1->SP1_IQ36)->first();

            if($IQ36->dateTaken == NULL){
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

                $IQ36->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP2_IQ36
    public function storeSP2($PSS,$request){
        if($PSS !=NULL && $PSS->SP2_ID != NULL){
            //find admission table and update it
            $findSP2 = StudyPeriod2::where('SP2_ID',$PSS->SP2_ID)->first();
            $IQ36 = SP2_IQ36::where('SP2_IQ36_ID', $findSP2->SP2_IQ36)->first();

            if($IQ36->dateTaken == NULL){
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

                $IQ36->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP3_IQ36
    public function storeSP3($PSS,$request){
        if($PSS !=NULL && $PSS->SP3_ID != NULL){
            //find admission table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID',$PSS->SP3_ID)->first();
            $IQ36 = SP3_IQ36::where('SP3_IQ36_ID', $findSP3->SP3_IQ36)->first();

            if($IQ36->dateTaken == NULL){
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

                $IQ36->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //store SP4_IQ36
    public function storeSP4($PSS,$request){
        if($PSS !=NULL && $PSS->SP4_ID != NULL){
            //find admission table and update it
            $findSP4 = StudyPeriod1::where('SP4_ID',$PSS->SP4_ID)->first();
            $IQ36 = SP4_IQ36::where('SP4_IQ36_ID', $findSP4->S4_IQ36)->first();

            if($IQ36->dateTaken == NULL){
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

                $IQ36->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }
    
    //update SP1_IQ36
    public function updateSP1($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$PSS->SP1_ID)->first();
            $IQ36 = SP1_IQ36::where('SP1_IQ36_ID', $findSP1->SP1_IQ36)->first();

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

            $IQ36->save();
            return true;
        }else{
            return false;
        }
    }

    //update SP2_IQ36
    public function updateSP2($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP2 = StudyPeriod2::where('SP2_ID',$PSS->SP2_ID)->first();
            $IQ36 = SP2_IQ36::where('SP2_IQ36_ID', $findSP2->SP2_IQ36)->first();

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

            $IQ36->save();
            return true;
        }else{
            return false;
        }
    }

    //update SP3_IQ36
    public function updateSP3($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID',$PSS->SP3_ID)->first();
            $IQ36 = SP3_IQ36::where('SP3_IQ36_ID', $findSP3->SP3_IQ36)->first();

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

            $IQ36->save();
            return true;
        }else{
            return false;
        }
    }

    //update SP4_IQ36
    public function updateSP4($PSS,$request){
        if($PSS !=NULL){
            //find admission table and update it
            $findSP4 = StudyPeriod4::where('SP4_ID',$PSS->SP4_ID)->first();
            $IQ36 = SP4_IQ36::where('SP4_IQ36_ID', $findSP4->SP4_IQ36)->first();

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

            $IQ36->save();
            return true;
        }else{
            return false;
        }
    }
    
}
