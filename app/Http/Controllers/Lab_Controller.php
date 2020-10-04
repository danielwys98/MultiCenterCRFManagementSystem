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

        $BloodLab=$request->Blood_Laboratory;
        $BloodLabRepeat=$request->BloodRepeat_Laboratory;

        $UrineLab=$request->Urine_Laboratory;
        $UrineLabRepeat=$request->UrineRepeat_Laboratory;

        // Urine Pregnancy
        $ut->dateBTaken=$request->dateBTaken;

        $ut->dateLMTaken=$request->dateLMTaken;
        $ut->TimeLMTaken=$request->TimeLMTaken;
        $ut->describemeal=$request->describemeal;

        if($BloodLab=='Other'){
            $ut->Blood_Laboratory=$request->Blood_Laboratory_Text;
        }else
            $ut->Blood_Laboratory=$request->Blood_Laboratory;


        $ut->Blood_NAtest=$request->Blood_NAtest;
        $ut->Blood_RepeatTest=$request->Blood_RepeatTest;
        $ut->Repeat_dateBCollected=$request->Repeat_dateBCollected;
        if($BloodLabRepeat=='Other')
            $ut->BloodRepeat_Laboratory=$request->BloodRepeat_Laboratory_Text;
        else
            $ut->BloodRepeat_Laboratory=$request->BloodRepeat_Laboratory;


        $ut->dateUTaken=$request->dateUTaken;

        if($UrineLab=='Other')
            $ut->Urine_Laboratory=$request->Urine_Laboratory_Text;
        else
            $ut->Urine_Laboratory=$request->Urine_Laboratory;

        $ut->Urine_NAtest=$request->Urine_NAtest;
        $ut->Urine_RepeatTest=$request->Urine_RepeatTest;
        $ut->Repeat_dateUCollected=$request->Repeat_dateUCollected;

        if($UrineLabRepeat=='Other')
            $ut->UrineRepeat_Laboratory=$request->UrineRepeat_Laboratory_txt;
        else
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

                'Blood_NAtest' => $request->Blood_NAtest,
                'Blood_RepeatTest' => $request->Blood_RepeatTest,
                'Repeat_dateBCollected' => $request->Repeat_dateBCollected,
                'BloodRepeat_Laboratory' => $request->BloodRepeat_Laboratory,

                'dateUTaken' => $request->dateUTaken,
                'Urine_Laboratory' => $request->Urine_Laboratory,

                'Urine_NAtest' => $request->Urine_NAtest,
                'Urine_RepeatTest' => $request->Urine_RepeatTest,
                'Repeat_dateUCollected' => $request->Repeat_dateUCollected,
                'UrineRepeat_Laboratory' => $request->UrineRepeat_Laboratory
            ]);

        if($request->Blood_Laboratory=='Other'){
            DB::table('patient_laboratory_tests')
                ->when('patiet_id',$id)
                ->update([
                    'Blood_Laboratory' => $request->Blood_Laboratory_Text
                ]);
        }else{
            DB::table('patient_laboratory_tests')
                ->when('patiet_id',$id)
                ->update([
                    'Blood_Laboratory' => $request->Blood_Laboratory
                ]);
        }

        return redirect(route('details.create', $id));
    }
}
