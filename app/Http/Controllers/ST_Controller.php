<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Patient_Serology_Test;
use DB;

class ST_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkAdmin');
    }
    public function storeST(Request $request,$id)
    {
        $st = new Patient_Serology_Test;

        $custom = [
            'dateCTaken.required' => 'Please enter the date of consent taken',
            'dateBCollected.required' => 'Please enter the date of blood taken',
            'laboratory.required' => 'Please select which laboratory does the serology test conducted',
            'laboratory_txt.required_if' => 'If other laboratory were selected, please state the name of the laboratory where serology test conducted',
        ];

        $validatedData=$this->validate($request,[
            'dateCTaken' => 'required',
            'dateBCollected' => 'required',
            'laboratory' => 'required',
            'laboratory_txt' => 'required_if:laboratory,==,Other',
        ],$custom);

        $st->patient_id=$id;
        $st->dateCTaken=$request->dateCTaken;
        $st->dateBCollected=$request->dateBCollected;

        if($request->Laboratory=='Other'){
            $st->Laboratory=$request->laboratory_txt;
        }else{
            $st->Laboratory=$request->laboratory;
        }

        $st->save();
        return redirect(route('preScreeningForms.create',$id))->with('success','You have added the Serology Test detail for the subject!');
    }
    public function updateST(Request $request,$id)
    {
       DB::table('patient_serology_tests')
            ->where('patient_id',$id)
            ->update([
            'dateCTaken'=>$request->dateCTaken,
            'dateBCollected'=>$request->dateBCollected,
        ]);

       if($request->Laboratory=='Other'){
           DB::table('patient_serology_tests')
               ->where('patient_id',$id)
               ->update([
                   'Laboratory'=>$request->laboratory_txt
               ]);
       }else{
           DB::table('patient_serology_tests')
               ->where('patient_id',$id)
               ->update([
                   'Laboratory'=>$request->laboratory
               ]);
       }

        return redirect(route('preScreeningForms.edit',$id))->with('success','You have updated the Serology Test detail for the subject!');
    }
}
