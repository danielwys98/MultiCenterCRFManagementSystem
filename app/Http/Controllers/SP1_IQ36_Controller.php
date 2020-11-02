<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientStudySpecific;
use App\StudyPeriod1;
use App\SP1_IQ36;
use DB;

class SP1_IQ36_Controller extends Controller
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
            //find SP1_ID to access the SP1_IQ36
            //find table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $findSP1_IQ36 = SP1_IQ36::where('SP1_IQ36_ID',$findSP1->SP1_IQ36)->first();
           //SAVE SP1_IQ36 stuffs
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

           //date and time for interim questionnaire
            $findSP1_IQ36->dateTaken=$request->dateTaken;
            $findSP1_IQ36->timeTaken=$request->timeTaken;

            //interim questionnaire
            $findSP1_IQ36->interim36hrs01=$request->Interim36hrs01;
            $findSP1_IQ36->interim36hrs02=$request->Interim36hrs02;
            $iq03 = $request->Interim36hrs03;
            if ($iq03 == 'No') {
                $findSP1_IQ36->interim36hrs03=$request->Interim36hrs03;
            } else{
                $findSP1_IQ36->interim36hrs03=$request->Interim36hrs03txt;
            }
            $iq04 = $request->Interim36hrs04;
            if ($iq04 == 'No') {
                $findSP1_IQ36->interim36hrs04=$request->Interim36hrs04;
            } else{
                $findSP1_IQ36->interim36hrs04=$request->Interim36hrs04txt;
            }
            $iq05 = $request->Interim36hrs05;
            if ($iq05 == 'No') {
                $findSP1_IQ36->interim36hrs05=$request->Interim36hrs05;
            } else{
                $findSP1_IQ36->interim36hrs05=$request->Interim36hrs05txt;
            }
            $iq06 = $request->Interim36hrs06;
            if ($iq06 == 'No') {
                $findSP1_IQ36->interim36hrs06=$request->Interim36hrs06;
            } else{
                $findSP1_IQ36->interim36hrs06=$request->Interim36hrs06txt;
            }
            $iq07 = $request->Interim36hrs07;
            if ($iq07 == 'No') {
                $findSP1_IQ36->interim36hrs07=$request->Interim36hrs07;
            } else{
                $findSP1_IQ36->interim36hrs07=$request->Interim36hrs07txt;
            }
            $findSP1_IQ36->interim36hrs08=$request->Interim36hrs08;

            //interviewed and checked by
            $findSP1_IQ36->Interim36hrsInterviewedby=$request->Interim36hrsInterviewedby;
            $findSP1_IQ36->Interim36hrsCheckedby=$request->Interim36hrsCheckedby;

            $findSP1_IQ36->save();
            return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Interim Questionnaire(36 hours Post Dose Visit)!');
        }else{
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }
    }

}
