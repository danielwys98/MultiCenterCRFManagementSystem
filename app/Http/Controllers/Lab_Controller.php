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
    }

    public function storeLT(Request $request,$id)
    {
        $ut = new Patient_LaboratoryTest;

        $ut->patient_id=$id;

        // Urine Pregnancy
        $ut->dateBTaken=$request->dateBTaken;

        $ut->dateLMTaken=$request->dateLMTaken;
        $ut->TimeLMTaken=$request->TimeLMTaken;
        $ut->describemeal=$request->describemeal;
        $ut->Blood_Laboratory=$request->Blood_Laboratory;


        $ut->Blood_NAtest=$request->Blood_NAtest;
        $ut->Blood_RepeatTest=$request->Blood_RepeatTest;
        $ut->Repeat_dateBCollected=$request->Repeat_dateBCollected;
        $ut->BloodRepeat_Laboratory=$request->BloodRepeat_Laboratory;


        $ut->dateUTaken=$request->dateUTaken;
        $ut->Urine_Laboratory=$request->Urine_Laboratory;
        $ut->Urine_NAtest=$request->Urine_NAtest;
        $ut->Urine_RepeatTest=$request->Urine_RepeatTest;
        $ut->Repeat_dateUCollected=$request->Repeat_dateUCollected;
        $ut->UrineRepeat_Laboratory=$request->UrineRepeat_Laboratory;
        $ut->save();

        return redirect(route('details.create',$id));
    }

    public function updateLT(Request $request,$id)
    {
        DB::table('patient_laboratory_tests')
            ->where('patient_id', $id)
            ->update([
                'dateBTaken' => $request->dateBTaken,

                'dateLMTaken' => $request->dateLMTaken,
                'TimeLMTaken' => $request->TimeLMTaken,
                'describemeal' => $request->describemeal,
                'Blood_Laboratory' => $request->Blood_Laboratory,

                'Blood_NAtest' => $request->Blood_NAtest,
                'Blood_RepeatTest' => $request->Blood_RepeatTest,
                'Repeat_dateBCollected' => $request->Repeat_dateBCollected,
                'BloodRepeat_Laboratory' => $request->BloodRepeat_Laboratory,

                'dateUTaken' => $request->dateUTaken,
                'Urine_Lab' => $request->Urine_Lab,

                'Urine_NAtest' => $request->Urine_NAtest,
                'Urine_RepeatTest' => $request->Urine_RepeatTest,
                'Repeat_dateUCollected' => $request->Repeat_dateUCollected,
                'UrineRepeat_Laboratory' => $request->UrineRepeat_Laboratory
            ]);

        return redirect(route('details.create', $id));
    }
}
