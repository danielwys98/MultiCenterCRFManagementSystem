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

    public function storeLT(Request $request, $id)
    {
        $lt = new Patient_LaboratoryTest;

        $lt->patient_id = $id;

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

        $validatedData=$this->validate($request,[
            'Blood_Laboratory' => 'required',
            'dateBTaken' => 'required',
            'dateLMTaken' => 'required',
            'TimeLMTaken' => 'required',
            'dateUTaken' => 'required',
            'Urine_Laboratory' => 'required',
        ]);

        $lt->save();

        return redirect(route('details.create', $id))->with('Messages',"You have added the Blood and Urine test's detail for the subject!");
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
                'UrineRepeat_Laboratory' => $request->UrineRepeat_Laboratory
            ]);

        if ($request->Blood_Laboratory != 'B.P. Clinical Lab Sdn Bhd') {
            DB::table('patient_laboratory_tests')
                ->where('patient_id', $id)
                ->update([
                    'Blood_Laboratory' => $request->Blood_Laboratory_Text
                ]);
        } else {
            DB::table('patient_laboratory_tests')
                ->where('patient_id', $id)
                ->update([
                    'Blood_Laboratory' => $request->Blood_Laboratory
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
                    'BloodRepeat_Laboratory' => $request->BloodRepeat_Laboratory
                ]);
        }

        if($request->Urine_Laboratory!='B.P. Clinical Lab Sdn Bhd'){
            DB::table('patient_laboratory_tests')
                ->where('patient_id', $id)
                ->update([
                    'Urine_Laboratory' => $request->Urine_Laboratory_Text
                ]);
        }else{
            DB::table('patient_laboratory_tests')
                ->where('patient_id', $id)
                ->update([
                    'Urine_Laboratory' => $request->Urine_Laboratory
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
                    'UrineRepeat_Laboratory' => $request->UrineRepeat_Laboratory
                ]);
        }

        // $validatedData=$this->validate($request,[
        //     'Blood_Laboratory' => 'required',
        //     'dateBTaken' => 'required',
        //     'dateLMTaken' => 'required',
        //     'TimeLMTaken' => 'required',
        //     'dateUTaken' => 'required',
        //     'Urine_Laboratory' => 'required',
        // ]);

        return redirect(route('details.edit', $id))->with('Messages',"You have added the Blood and Urine test's detail for the subject!");
    }
}
