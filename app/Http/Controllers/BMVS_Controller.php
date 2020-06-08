<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Patient_BodyAndVitalSigns;

class BMVS_Controller extends Controller
{
    public function create($id)
    {
        $patient = Patient::find($id);
        return view('Patients_Details.create',compact('patient'));
    }
    public function store(Request $request,$id)
    {

      $bmvs = new Patient_BodyAndVitalSigns;

        $bmvs->patient_id=$id;
        $bmvs->dateTaken=$request->dateTaken;
        $bmvs->timeTaken=$request->timeTaken;
        $bmvs->weight=$request->weight;
        $bmvs->height=$request->height;
        $bmvs->bmi=$request->bmi;
        $bmvs->temperature=$request->temperature;
        $bmvs->Supine_ReadingTime=$request->Supine_ReadingTime;
        $bmvs->Supine_BP=$request->Supine_BP;
        $bmvs->Supine_HR=$request->Supine_HR;
        $bmvs->Supine_RespiratoryRate=$request->Supine_RespiratoryRate;
        $bmvs->Sitting_ReadingTime=$request->Sitting_ReadingTime;
        $bmvs->Sitting_BP=$request->Sitting_BP;
        $bmvs->Sitting_HR=$request->Sitting_HR;
        $bmvs->Sitting_RespiratoryRate=$request->Sitting_RespiratoryRate;
        $bmvs->Standing_ReadingTime=$request->Standing_ReadingTime;
        $bmvs->Standing_BP=$request->Standing_BP;
        $bmvs->Standing_HR=$request->Standing_HR;
        $bmvs->Standing_RespiratoryRate=$request->Standing_RespiratoryRate;
        $bmvs->Initial=$request->Initial;

        $bmvs->save();

        return redirect('preScreening/admin');
    }

    public function show($id)
    {
        $patient = Patient::find($id);
        return view('Patients_Details.show',compact('patient'));
    }
}
