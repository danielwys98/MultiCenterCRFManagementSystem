<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Patient_BodyAndVitalSigns;
use DB;

class BMVS_Controller extends Controller
{
    public function create($id)
    {
        $patient = Patient::find($id);
        return view('details.create',compact('patient'));
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
        $data =$patient->bodyandvitalsigns;
        return view('details.show',compact('data'))->with('patient',$patient);
    }

    public function edit($id)
    {
        $patient = Patient::find($id);
        $data =$patient->bodyandvitalsigns;
        $data2 =$patient->BreathAlcoholTestAndElectrocardiogram;
        return view('details.edit',compact('data','data2'))->with('patient',$patient);
    }

    public function update(Request $request,$id)
    {
       DB::table('patient_body_and_vital_signs')
                        ->where('patient_id',$id)
                        ->update([
                                'dateTaken'=>$request->dateTaken,
                                'timeTaken'=>$request->timeTaken,
                                'weight'=>$request->weight,
                                'height'=>$request->height,
                                'bmi'=>$request->bmi,
                                'temperature'=>$request->temperature,
                                'Supine_ReadingTime'=>$request->Supine_ReadingTime,
                                'Supine_BP'=>$request->Supine_BP,
                                'Supine_HR'=>$request->Supine_HR,
                                'Supine_RespiratoryRate'=>$request->Supine_RespiratoryRate,
                                'Sitting_ReadingTime'=>$request->Sitting_ReadingTime,
                                'Sitting_BP'=>$request->Sitting_BP,
                                'Sitting_HR'=>$request->Sitting_HR,
                                'Sitting_RespiratoryRate'=>$request->Sitting_RespiratoryRate,
                                'Standing_ReadingTime'=>$request->Standing_ReadingTime,
                                'Standing_BP'=>$request->Standing_BP,
                                'Standing_HR'=>$request->Standing_HR,
                                'Standing_RespiratoryRate'=>$request->Standing_RespiratoryRate,
                                'Initial'=>$request->Initial
                        ]);

        return redirect('preScreening/admin');

/*        $bmvs->patient_id =$patient_id;
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

      $bmvs->save();*/
    }
/*    public function delete($id)
    {
        DB::table('patient_body_and_vital_signs')->where('patient_id',$id)->delete();

        return redirect('preScreening/admin')->with('Messages',"You had deleted the patient's details!");
    }*/
}
