<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientStudySpecific;
use App\StudyPeriod1;
use App\SP1_IQ48;
use DB;

class SP1_IQ48_Controller extends Controller
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
            //find SP1_ID to access the SP1_IQ48
            //find table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $findSP1_IQ48 = SP1_IQ48::where('SP1_IQ48_ID',$findSP1->SP1_IQ48)->first();
           //SAVE SP1_IQ48 stuffs
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

           //date and time for interim questionnaire
            $findSP1_IQ48->dateTaken=$request->dateTaken;
            $findSP1_IQ48->timeTaken=$request->timeTaken;

            //interim questionnaire
            $findSP1_IQ48->interim48hrs01=$request->Interim48hrs01;
            $findSP1_IQ48->interim48hrs02=$request->Interim48hrs02;
            $iq03 = $request->Interim48hrs03;
            if ($iq03 == 'Yes') {
                $findSP1_IQ48->interim48hrs03=$request->Interim48hrs03;
            } else{
                $findSP1_IQ48->interim48hrs03=$request->Interim48hrs03txt;
            }
            $iq04 = $request->Interim48hrs04;
            if ($iq04 == 'Yes') {
                $findSP1_IQ48->interim48hrs04=$request->Interim48hrs04;
            } else{
                $findSP1_IQ48->interim48hrs04=$request->Interim48hrs04txt;
            }
            $iq05 = $request->Interim48hrs05;
            if ($iq05 == 'Yes') {
                $findSP1_IQ48->interim48hrs05=$request->Interim48hrs05;
            } else{
                $findSP1_IQ48->interim48hrs05=$request->Interim48hrs05txt;
            }
            $iq06 = $request->Interim48hrs06;
            if ($iq06 == 'Yes') {
                $findSP1_IQ48->interim48hrs06=$request->Interim48hrs06;
            } else{
                $findSP1_IQ48->interim48hrs06=$request->Interim48hrs06txt;
            }
            $iq07 = $request->Interim48hrs07;
            if ($iq07 == 'Yes') {
                $findSP1_IQ48->interim48hrs07=$request->Interim48hrs07;
            } else{
                $findSP1_IQ48->interim48hrs07=$request->Interim48hrs07txt;
            }
            $findSP1_IQ48->interim48hrs08=$request->Interim48hrs08;

            //interviewed and checked by
            $findSP1_IQ48->Interim48hrsInterviewedby=$request->Interim48hrsInterviewedby;
            $findSP1_IQ48->Interim48hrsCheckedby=$request->Interim48hrsCheckedby;

            $findSP1_IQ48->save();
            return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Interim Questionnaire(48 hours Post Dose Visit)!');
        }else{
            alert()->error('Error!','This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input',$study_id));
        }
    }

}
