<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_Admission;
use App\SP1_BAT;
use App\StudyPeriod1;
use Illuminate\Http\Request;

class SP1_BAT_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request, $study_id)
    {
        $PID = $request->patient_id;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id', $PID)
            ->where('study_id', $study_id)
            ->first();

        if ($findPSS != NULL) {
            //find SP1_ID to access the SP1_Admission
            //find admission table and update it
            $findSP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
            $findSP1_BAT = SP1_BAT::where('SP1_BAT_ID', $findSP1->SP1_BATER)->first();
            //custom messages load for validation
            $custom = [
                'dateTaken.required' => 'Please enter the date taken for breath alcohol test',
                'timeTaken.required' => 'Please enter the time taken for breath alcohol test',
                'Laboratory.required' => 'Please select which laboratory does the test conducted',
                'Laboratory_text.required_if' => 'If other laboratory were selected, please state the name of the laboratory',
                'breathalcohol.required' => 'Please enter the BAC%(Breath Alcohol Content)',
                'breathalcoholResult.required' => 'Please select a result for BAC%(Breath Alcohol Content)',
                'Usertranscribed.required' => 'Please state the user transcribed',
            ];
            //validation for required fields
            $validatedData = $this->validate($request, [
                'dateTaken' => 'required',
                'timeTaken' => 'required',
                'Laboratory' => 'required',
                'Laboratory_text' => 'required_if:Laboratory,==,Others',
                'breathalcohol' => 'required',
                'breathalcoholResult' => 'required',
                'Usertranscribed' => 'required',
            ], $custom);

            //date and time
            $findSP1_BAT->dateTaken = $request->dateTaken;
            $findSP1_BAT->timeTaken = $request->timeTaken;
            //laboratory
            if ($request->Laboratory == 'Others') {//if lab is others, save text
                $findSP1_BAT->laboratory = $request->Laboratory_text;
            } else {//if lab is selected
                $findSP1_BAT->laboratory = $request->Laboratory;
            }
            //breath alcohol record and user transcribed
            $findSP1_BAT->breathalcohol = $request->breathalcohol;
            $findSP1_BAT->breathalcoholResult = $request->breathalcoholResult;
            $findSP1_BAT->Usertranscribed = $request->Usertranscribed;

            $findSP1_BAT->save();

            return redirect(route('studySpecific.input', $study_id))->with('success', 'You have successfully save the study period details for Breath Alcohol Test!');
        } else {
            alert()->error('Error!', 'This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input', $study_id));
        }

    }

    public function update(Request $request, $patient_id, $study_id)
    {
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id', $patient_id)
            ->where('study_id', $study_id)
            ->first();
        if ($findPSS != NULL) {
            $findSP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
            $BAT = SP1_BAT::where('SP1_BAT_ID', $findSP1->SP1_BATER)->first();
        }
        //date and time
        $BAT->dateTaken = $request->dateTaken;
        $BAT->timeTaken = $request->timeTaken;
        //laboratory
        if ($request->Laboratory == 'Others') {
            //if lab is others, save text
            $BAT->laboratory = $request->Laboratory_text;
        } else {//if lab is selected
            $BAT->laboratory = $request->Laboratory;
        }
        //breath alcohol record and user transcribed
        $BAT->breathalcohol = $request->breathalcohol;
        $BAT->breathalcoholResult = $request->breathalcoholResult;
        $BAT->Usertranscribed = $request->Usertranscribed;

        $BAT->save();
        return redirect(route('studySpecific.admin'))->with('success', 'You updated the subject study period details for Breath Alcohol Test!');
    }

}
