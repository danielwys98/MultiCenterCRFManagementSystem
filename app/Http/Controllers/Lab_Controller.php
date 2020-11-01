<?php

namespace App\Http\Controllers;

use App\Patient_LaboratoryTest;
use DB;
use Illuminate\Http\Request;

class Lab_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkAdmin');
    }

    public function storeLT(Request $request, $id)
    {
        $lt = new Patient_LaboratoryTest;
        $lt->patient_id = $id;

        $custom = [
            'dateBTaken.required' => 'Please enter the date taken of Blood(Haematology and Chemistry)',
            'dateLMTaken.required' => 'Please enter the date taken of last meal taken',
            'TimeLMTaken.required' => 'Please enter the time of last meal taken',
            'Blood_Laboratory.required' => 'Please select which laboratory does the Blood(Haematology and Chemistry) test conducted',
            'Blood_Laboratory_Text.required_if' => 'If other laboratory were selected, please state the name of the laboratory where Blood(Haematology and Chemistry) test conducted',
            'dateUTaken.required' => 'Please enter the date taken for Urine(Microbiology) test',
            'Urine_Laboratory.required' => 'Please select which laboratory does the Urine(Microbiology) test conducted',
            'urine_laboratory_Text.required_if' => 'If other laboratory were selected, please state the name of the laboratory where Urine(Microbiology) test conducted',
        ];

        $validatedData=$this->validate($request,[
            'dateBTaken' => 'required',
            'dateLMTaken' => 'required',
            'TimeLMTaken' => 'required',
            'Blood_Laboratory' => 'required',
            'Blood_Laboratory_Text' => 'required_if:Blood_Laboratory,==,Other',
            'dateUTaken' => 'required',
            'Urine_Laboratory' => 'required',
            'Urine_Laboratory_Text' => 'required_if:Urine_Laboratory,==,Other',
        ],$custom);

        $BloodLab = $request->Blood_Laboratory;
        $BloodLabRepeat = $request->BloodRepeat_Laboratory;

        $UrineLab = $request->Urine_Laboratory;
        $UrineLabRepeat = $request->UrineRepeat_Laboratory;

        $lt->dateBTaken = $request->dateBTaken;

        $lt->dateLMTaken = $request->dateLMTaken;
        $lt->TimeLMTaken = $request->TimeLMTaken;
        $lt->describemeal = $request->describemeal;

        if ($BloodLab == 'Other') {
            $lt->Blood_Laboratory = $request->Blood_Laboratory_Text;
        } else
            $lt->Blood_Laboratory = $request->Blood_Laboratory;

        //Check if Repeat Blood Test id Required
        $lt->Blood_NAtest = $request->Blood_NAtest;
        if ($request->Blood_NAtest == true) {
            $lt->Blood_RepeatTest = NULL;
            $lt->Repeat_dateBCollected = NULL;
            $lt->BloodRepeat_Laboratory = NULL;
            $bloodvalidation = "";
        } else {
            $lt->Blood_RepeatTest = $request->Blood_RepeatTest;
            $lt->Repeat_dateBCollected = $request->Repeat_dateBCollected;
            if ($BloodLabRepeat == 'Other'){
                $lt->BloodRepeat_Laboratory = $request->BloodRepeat_Laboratory_Text;
            }
            else{
                $lt->BloodRepeat_Laboratory = $request->BloodRepeat_Laboratory;
            }
        }

        $lt->dateUTaken = $request->dateUTaken;

        if ($UrineLab == 'Other')
            $lt->Urine_Laboratory = $request->Urine_Laboratory_Text;
        else
            $lt->Urine_Laboratory = $request->Urine_Laboratory;

        //Check if Repeat Urine Test is Required
        $lt->Urine_NAtest = $request->Urine_NAtest;
        if ($request->Urine_NAtest == true) {
            $lt->Urine_RepeatTest = NULL;
            $lt->Repeat_dateUCollected = NULL;
            $lt->UrineRepeat_Laboratory = NULL;
            $urinevalidation = "";
        } else {
            $lt->Urine_RepeatTest = $request->Urine_RepeatTest;
            $lt->Repeat_dateUCollected = $request->Repeat_dateUCollected;
            if ($UrineLabRepeat == 'Other'){
                $lt->UrineRepeat_Laboratory = $request->UrineRepeat_Laboratory_txt;
            }else{
                $lt->UrineRepeat_Laboratory = $request->UrineRepeat_Laboratory;
            }
        }

        $lt->save();

        return redirect(route('preScreeningForms.create', $id))->with('success',"You have added the Blood and Urine test's detail for the subject!");
    }

    public function updateLT(Request $request, $id)
    {
        DB::table('patient_laboratory_tests')
            ->where('patient_id', $id)
            ->update([
                'dateBTaken' => $request->dateBTaken,

                'dateLMTaken' => $request->dateLMTaken,
                'TimeLMTaken' => $request->TimeLMTaken,
                'describemeal' => $request->describemeal,

                'dateUTaken' => $request->dateUTaken,

                'Urine_NAtest' => $request->Urine_NAtest,
                'Urine_RepeatTest' => $request->Urine_RepeatTest,
                'Repeat_dateUCollected' => $request->Repeat_dateUCollected,
                'UrineRepeat_Laboratory' => $request->urinerepeat_laboratory
            ]);

        if ($request->blood_laboratory != 'B.P. Clinical Lab Sdn Bhd') {
            DB::table('patient_laboratory_tests')
                ->where('patient_id', $id)
                ->update([
                    'Blood_Laboratory' => $request->blood_laboratory_Text
                ]);
        } else {
            DB::table('patient_laboratory_tests')
                ->where('patient_id', $id)
                ->update([
                    'Blood_Laboratory' => $request->blood_laboratory
                ]);
        }

        //To check if repeat blood test is needed
        if($request->Blood_NAtest==true){
            DB::table('patient_laboratory_tests')
                ->where('patient_id',$id)
                ->update([
                'Blood_RepeatTest' => NULL,
                'Repeat_dateBCollected' => NULL,
                'BloodRepeat_Laboratory' => NULL
            ]);
        }else{
            DB::table('patient_laboratory_tests')
                ->where('patient_id', $id)
                ->update([
                    'Blood_RepeatTest' => $request->Blood_RepeatTest,
                    'Repeat_dateBCollected' => $request->Repeat_dateBCollected,
                    'BloodRepeat_Laboratory' => $request->bloodrepeat_laboratory
                ]);
        }

        if($request->urine_laboratory!='B.P. Clinical Lab Sdn Bhd'){
            DB::table('patient_laboratory_tests')
                ->where('patient_id', $id)
                ->update([
                    'Urine_Laboratory' => $request->urine_laboratory_Text
                ]);
        }else{
            DB::table('patient_laboratory_tests')
                ->where('patient_id', $id)
                ->update([
                    'Urine_Laboratory' => $request->urine_laboratory
                ]);
        }

        //Check if repeat urine test is needed
        if( $request->Urine_NAtest==true){
            DB::table('patient_laboratory_tests')
                ->where('patient_id',$id)
                ->update([
                    'Urine_RepeatTest' => NULL,
                    'Repeat_dateUCollected' => NULL,
                    'UrineRepeat_Laboratory' => NULL
                ]);
        }else{
            DB::table('patient_laboratory_tests')
                ->where('patient_id', $id)
                ->update([
                    'Urine_RepeatTest' => $request->Urine_RepeatTest,
                    'Repeat_dateUCollected' => $request->Repeat_dateUCollected,
                    'UrineRepeat_Laboratory' => $request->urinerepeat_laboratory
                ]);
        }

        return redirect(route('preScreeningForms.edit', $id))->with('success',"You have updated the Blood and Urine test's detail for the subject!");
    }
}
