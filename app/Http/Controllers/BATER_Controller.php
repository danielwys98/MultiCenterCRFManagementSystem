<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Patient_BreathAlcoholTestAndElectrocardiogram;
use DB;

class BATER_Controller extends Controller
{
    public function storeBATER(Request $request,$id)
    {
        $bater = new Patient_BreathAlcoholTestAndElectrocardiogram;

        $bater->patient_id=$id;
        $bater->dateTaken=$request->dateTaken;
        $bater->timeTaken=$request->timeTaken;
        $bater->laboratory=$request->Laboratory;
        $bater->breathalcohol=$request->breathalcohol;
        $bater->breathalcoholResult=$request->breathalcoholResult;
        $bater->Usertranscribed=$request->Usertranscribed;
        $bater->ECGdateTaken=$request->ECGdateTaken;
        $bater->conclusion=$request->Conclusion;

        $bater->save();

        return redirect(route('details.create',$id));
    }
    public function updateBATER(Request $request,$id)
    {
       DB::table('patient_breath_alcohol_test_and_electrocardiograms')
            ->where('patient_id',$id)
            ->update([
            'dateTaken'=>$request->dateTaken,
            'timeTaken'=>$request->timeTaken,
            'laboratory'=>$request->Laboratory,
            'breathalcohol'=>$request->breathalcohol,
            'breathalcoholResult'=>$request->breathalcoholResult,
            'Usertranscribed'=>$request->Usertranscribed,
            'ECGdateTaken'=>$request->ECGdateTaken,
            'conclusion'=>$request->Conclusion
        ]);

        return redirect(route('details.create',$id));
    }
}
