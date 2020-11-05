<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_IQ48;
use App\SP2_IQ48;
use App\SP3_IQ48;
use App\SP4_IQ48;
use App\StudyPeriod1;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use Illuminate\Http\Request;

class SP_IQ48_Controller extends Controller
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
            $IQ48 = SP1_IQ48::where('SP1_IQ48_ID', $SP1->SP1_IQ48)->first();
            if($this->storeSP($findPSS,$PSS,$IQ48,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Interim Questionnaire(48 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $IQ48 = SP2_IQ48::where('SP2_IQ48_ID', $SP2->SP2_IQ48)->first();
            if($this->storeSP($findPSS,$PSS,$IQ48,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Interim Questionnaire(48 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $IQ48 = SP3_IQ48::where('SP3_IQ48_ID', $SP3->SP3_IQ48)->first();
            if($this->storeSP($findPSS,$PSS,$IQ48,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Interim Questionnaire(48 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $IQ48 = SP4_IQ48::where('SP4_IQ48_ID', $SP4->SP4_IQ48)->first();
            if($this->storeSP($findPSS,$PSS,$IQ48,$request)){
                return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 4 details for Interim Questionnaire(48 hours Post Dose Visit)!');
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
            $IQ48 = SP1_IQ48::where('SP1_IQ48_ID', $SP1->SP1_IQ48)->first();
            if($this->updateSP($findPSS,$PSS,$IQ48,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 1 details for Interim Questionnaire(48 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 2){
            //SP2 query
            $SP2 = StudyPeriod2::where('SP2_ID',$findPSS->SP2_ID)->first();
            $PSS = $findPSS->SP2_ID;
            $IQ48 = SP2_IQ48::where('SP2_IQ48_ID', $SP2->SP2_IQ48)->first();
            if($this->updateSP($findPSS,$PSS,$IQ48,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 2 details for Interim Questionnaire(48 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 3){
            //SP3 query
            $SP3 = StudyPeriod3::where('SP3_ID',$findPSS->SP3_ID)->first();
            $PSS = $findPSS->SP3_ID;
            $IQ48 = SP3_IQ48::where('SP3_IQ48_ID', $SP3->SP3_IQ48)->first();
            if($this->updateSP($findPSS,$PSS,$IQ48,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 3 details for Interim Questionnaire(48 hours Post Dose Visit)!');
            }else{
                alert()->error('Error!','You have already key the data for this subject!');
                return redirect(route('studySpecific.edit',$study_id));
            }
        }elseif($study_period == 4){
            //SP4 query
            $SP4 = StudyPeriod4::where('SP4_ID',$findPSS->SP4_ID)->first();
            $PSS = $findPSS->SP4_ID;
            $IQ48 = SP4_IQ48::where('SP4_IQ48_ID', $SP4->SP4_IQ48)->first();
            if($this->updateSP($findPSS,$PSS,$IQ48,$request)){
                return redirect(route('studySpecific.admin',$study_id))->with('success','You have successfully update the study period 4 details for Interim Questionnaire(48 hours Post Dose Visit)!');
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
    public function storeSP($findPSS,$PSS,$IQ48,$request){
        //custom messages load for validation
        $custom = [
            'dateTaken.required' => 'Please enter the date taken for Interim Questionnaire(48hrs pose dose vist)',
            'timeTaken.required' => 'Please enter the time taken for Interim Questionnaire(48hrs pose dose vist)',
            'Interim48hrs01.required' => 'Please choose a selection for number 1 in Interim Questionnaire(48hrs pose dose vist)',
            'Interim48hrs02.required' => 'Please choose a selection for number 2 in Interim Questionnaire(48hrs pose dose vist)',
            'Interim48hrs03.required' => 'Please choose a selection for number 3 in Interim Questionnaire(48hrs pose dose vist)',
            'Interim48hrs03txt.required_if' => 'Please specify amount and time taken for number 3 in Interim Questionnaire(48hrs pose dose vist)',
            'Interim48hrs04.required' => 'Please choose a selection for number 4 in Interim Questionnaire(48hrs pose dose vist)',
            'Interim48hrs04txt.required_if' => 'Please specify amount and time taken for number 4 in Interim Questionnaire(48hrs pose dose vist)',
            'Interim48hrs05.required' => 'Please choose a selection for number 5 in Interim Questionnaire(48hrs pose dose vist)',
            'Interim48hrs05txt.required_if' => 'Please provide details for number 5 in Interim Questionnaire(48hrs pose dose vist)',
            'Interim48hrs06.required' => 'Please choose a selection for number 6 in Interim Questionnaire(48hrs pose dose vist)',
            'Interim48hrs06txt.required_if' => 'Please provide details for number 6 in Interim Questionnaire(48hrs pose dose vist)',
            'Interim48hrs07.required' => 'Please choose a selection for number 7 in Interim Questionnaire(48hrs pose dose vist)',
            'Interim48hrs07txt.required_if' => 'Please provide details for number 7 in Interim Questionnaire(48hrs pose dose vist)',
            'Interim48hrs08.required' => 'Please choose a selection for number 8 in Interim Questionnaire(48hrs pose dose vist)',
            'Interim48hrsInterviewedby.required' => 'Please state interviewed by who for Interim Questionnaire(48hrs pose dose vist)',
            'Interim48hrsCheckedby.required' => 'Please state checked by who for Interim Questionnaire(48hrs pose dose vist)',
           ];
           //validation for required fields
           $validatedData=$this->validate($request,[
            'dateTaken' => 'required',
            'timeTaken' => 'required',
            'Interim48hrs01' => 'required',
            'Interim48hrs02' => 'required',
            'Interim48hrs03' => 'required',
            'Interim48hrs03txt' => 'required_if:Interim48hrs03,==,Yes',
            'Interim48hrs04' => 'required',
            'Interim48hrs04txt' => 'required_if:Interim48hrs04,==,Yes',
            'Interim48hrs05' => 'required',
            'Interim48hrs05txt' => 'required_if:Interim48hrs05,==,Yes',
            'Interim48hrs06' => 'required',
            'Interim48hrs06txt' => 'required_if:Interim48hrs06,==,Yes',
            'Interim48hrs07' => 'required',
            'Interim48hrs07txt' => 'required_if:Interim48hrs07,==,Yes',
            'Interim48hrs08' => 'required',
            'Interim48hrsInterviewedby' => 'required',
            'Interim48hrsCheckedby' => 'required',
        ],$custom);

        if($findPSS !=NULL && $PSS!= NULL){
            if($IQ48->dateTaken == NULL){

                $IQ48->NApplicable=$request->NApplicable;
                if($request->NApplicable == 1){
                    $IQ48->dateTaken=NULL;
                    $IQ48->timeTaken=NULL;
                    $IQ48->interim48hrs01=NULL;
                    $IQ48->interim48hrs02=NULL;
                    $IQ48->interim48hrs03=NULL;
                    $IQ48->interim48hrs04=NULL;
                    $IQ48->interim48hrs05=NULL;
                    $IQ48->interim48hrs06=NULL;
                    $IQ48->interim48hrs07=NULL;
                    $IQ48->Interim48hrsInterviewedby=NULL;
                    $IQ48->Interim48hrsCheckedby=NULL;
                }else{
                    //date and time for interim questionnaire
                    $IQ48->dateTaken=$request->dateTaken;
                    $IQ48->timeTaken=$request->timeTaken;
                    //interim questionnaire
                    $IQ48->interim48hrs01=$request->Interim48hrs01;
                    $IQ48->interim48hrs02=$request->Interim48hrs02;
                    $iq03 = $request->Interim48hrs03;
                    if ($iq03 == 'No') {
                        $IQ48->interim48hrs03=$request->Interim48hrs03;
                    } else{
                        $IQ48->interim48hrs03=$request->Interim48hrs03txt;
                    }
                    $iq04 = $request->Interim48hrs04;
                    if ($iq04 == 'No') {
                        $IQ48->interim48hrs04=$request->Interim48hrs04;
                    } else{
                        $IQ48->interim48hrs04=$request->Interim48hrs04txt;
                    }
                    $iq05 = $request->Interim48hrs05;
                    if ($iq05 == 'No') {
                        $IQ48->interim48hrs05=$request->Interim48hrs05;
                    } else{
                        $IQ48->interim48hrs05=$request->Interim48hrs05txt;
                    }
                    $iq06 = $request->Interim48hrs06;
                    if ($iq06 == 'No') {
                        $IQ48->interim48hrs06=$request->Interim48hrs06;
                    } else{
                        $IQ48->interim48hrs06=$request->Interim48hrs06txt;
                    }
                    $iq07 = $request->Interim48hrs07;
                    if ($iq07 == 'No') {
                        $IQ48->interim48hrs07=$request->Interim48hrs07;
                    } else{
                        $IQ48->interim48hrs07=$request->Interim48hrs07txt;
                    }
                    $IQ48->interim48hrs08=$request->Interim48hrs08;
                    //interviewed and checked by
                    $IQ48->Interim48hrsInterviewedby=$request->Interim48hrsInterviewedby;
                    $IQ48->Interim48hrsCheckedby=$request->Interim48hrsCheckedby;
                }
                
                $IQ48->save();
                return true;
            }else{
                return false;
            }
        }else
        return false;
    }

    //update
    public function updateSP($findPSS,$PSS,$IQ48,$request){
        if($findPSS !=NULL){
            $IQ48->NApplicable=$request->NApplicable;
            if($request->NApplicable == 1){
                $IQ48->dateTaken=NULL;
                $IQ48->timeTaken=NULL;
                $IQ48->interim48hrs01=NULL;
                $IQ48->interim48hrs02=NULL;
                $IQ48->interim48hrs03=NULL;
                $IQ48->interim48hrs04=NULL;
                $IQ48->interim48hrs05=NULL;
                $IQ48->interim48hrs06=NULL;
                $IQ48->interim48hrs07=NULL;
                $IQ48->Interim48hrsInterviewedby=NULL;
                $IQ48->Interim48hrsCheckedby=NULL;
            }else{
                //date and time for interim questionnaire
                $IQ48->dateTaken=$request->dateTaken;
                $IQ48->timeTaken=$request->timeTaken;
                //interim questionnaire
                $IQ48->interim48hrs01=$request->Interim48hrs01;
                $IQ48->interim48hrs02=$request->Interim48hrs02;
                $iq03 = $request->Interim48hrs03;
                if ($iq03 == 'No') {
                    $IQ48->interim48hrs03=$request->Interim48hrs03;
                } else{
                    $IQ48->interim48hrs03=$request->Interim48hrs03txt;
                }
                $iq04 = $request->Interim48hrs04;
                if ($iq04 == 'No') {
                    $IQ48->interim48hrs04=$request->Interim48hrs04;
                } else{
                    $IQ48->interim48hrs04=$request->Interim48hrs04txt;
                }
                $iq05 = $request->Interim48hrs05;
                if ($iq05 == 'No') {
                    $IQ48->interim48hrs05=$request->Interim48hrs05;
                } else{
                    $IQ48->interim48hrs05=$request->Interim48hrs05txt;
                }
                $iq06 = $request->Interim48hrs06;
                if ($iq06 == 'No') {
                    $IQ48->interim48hrs06=$request->Interim48hrs06;
                } else{
                    $IQ48->interim48hrs06=$request->Interim48hrs06txt;
                }
                $iq07 = $request->Interim48hrs07;
                if ($iq07 == 'No') {
                    $IQ48->interim48hrs07=$request->Interim48hrs07;
                } else{
                    $IQ48->interim48hrs07=$request->Interim48hrs07txt;
                }
                $IQ48->interim48hrs08=$request->Interim48hrs08;
                //interviewed and checked by
                $IQ48->Interim48hrsInterviewedby=$request->Interim48hrsInterviewedby;
                $IQ48->Interim48hrsCheckedby=$request->Interim48hrsCheckedby;
            }

            $IQ48->save();
            return true;
        }else{
            return false;
        }
    }
    
}
