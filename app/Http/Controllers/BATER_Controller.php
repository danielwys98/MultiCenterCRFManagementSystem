<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Patient_BreathAlcoholTestAndElectrocardiogram;
use DB;

class BATER_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function storeBATER(Request $request,$id)
    {
        $bater = new Patient_BreathAlcoholTestAndElectrocardiogram;

        $custom = [
            'dateTaken.required' => 'Please enter the date taken for breath alcohol test',
            'timeTaken.required' => 'Please enter the time taken for breath alcohol test',
            'breathalcohol.required' => 'Please enter the BAC%(Breath Alcohol Content)',
            'breathalcoholResult.required' => 'Please select a result for BAC%(Breath Alcohol Content)',
            'Usertranscribed.required' => 'Please state the user transcribed',
            'Laboratory.required' => 'Please select which laboratory does the test conducted',
            'Laboratory_text.required_if' => 'If other laboratory were selected, please state the name of the laboratory',
            'ECGdateTaken.required' => 'Please enter the time taken for electrodiagram recording',
            'Conclusion.required' => 'Please select a conclusion for the electrodiagram recording',
        ];

        $validatedData=$this->validate($request,[
            'dateTaken' => 'required',
            'timeTaken' => 'required',
            'breathalcohol' => 'required',
            'breathalcoholResult' => 'required',
            'Usertranscribed' => 'required',
            'Laboratory' => 'required',
            'Laboratory_text' => 'required_if:Laboratory,==,Others',
            'ECGdateTaken' => 'required',
            'Conclusion' => 'required',
        ], $custom);

        $lab = $request->Laboratory;
        if($lab == 'Others')
        {
            $bater->laboratory = $request->Laboratory_text;
        }else{
            $bater->laboratory = $request->Laboratory;
        }
        $bater->patient_id=$id;
        $bater->dateTaken=$request->dateTaken;
        $bater->timeTaken=$request->timeTaken;
        $bater->breathalcohol=$request->breathalcohol;
        $bater->breathalcoholResult=$request->breathalcoholResult;
        $bater->Usertranscribed=$request->Usertranscribed;
        $bater->ECGdateTaken=$request->ECGdateTaken;
        $bater->conclusion=$request->Conclusion;

        $bater->save();

        return redirect(route('preScreeningForms.create',$id))->with('Messages','You have added the Breath Alcohol Test and Electrocardiogram detail for the subject!');
    }
    public function updateBATER(Request $request,$id)
    {
        $lab=$request->Laboratory;

        DB::table('patient_breath_alcohol_test_and_electrocardiograms')
            ->where('patient_id',$id)
            ->update([
            'dateTaken'=>$request->dateTaken,
            'timeTaken'=>$request->timeTaken,
            'breathalcohol'=>$request->breathalcohol,
            'breathalcoholResult'=>$request->breathalcoholResult,
            'Usertranscribed'=>$request->Usertranscribed,
            'ECGdateTaken'=>$request->ECGdateTaken,
            'conclusion'=>$request->conclusion
        ]);

           if($lab=='Others')
            {
                DB::table('patient_breath_alcohol_test_and_electrocardiograms')
                    ->where('patient_id',$id)
                    ->update([
                        'laboratory'=>$request->Laboratory_text
                    ]);

            }else{
                DB::table('patient_breath_alcohol_test_and_electrocardiograms')
                    ->where('patient_id',$id)
                    ->update([
                        'laboratory'=>$request->Laboratory
                    ]);
            }

        return redirect(route('preScreeningForms.edit',$id))->with('Messages','You have updated the Breath Alcohol Test and Electrocardiogram detail for the subject!');
    }
}
