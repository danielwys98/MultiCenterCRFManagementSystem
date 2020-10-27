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
    }
    public function storeST(Request $request,$id)
    {
        $st = new Patient_Serology_Test;

        $custom = [
            'dateCTaken.required' => 'Please enter the date of consent taken',
            'dateBCollected.required' => 'Please enter the date of blood taken',
            'Laboratory.required' => 'Please select which laboratory does the serology test conducted',
            'Laboratory_txt.required_if' => 'If other laboratory were selected, please state the name of the laboratory where serology test conducted',
        ];

        $validatedData=$this->validate($request,[
            'dateCTaken' => 'required',
            'dateBCollected' => 'required',
            'Laboratory' => 'required',
            'Laboratory_txt' => 'required_if:Laboratory,==,Others',
        ],$custom);

        $st->patient_id=$id;
        $st->dateCTaken=$request->dateCTaken;
        $st->dateBCollected=$request->dateBCollected;

        if($request->Laboratory=='Other'){
            $st->Laboratory=$request->Laboratory_txt;
        }else{
            $st->Laboratory=$request->Laboratory;
        }

        $validatedData=$this->validate($request,[
            'dateBCollected' => 'required',
            'Laboratory' => 'required',
        ]);

        $st->save();
        return redirect(route('details.create',$id))->with('Messages','You have added the Serology Test detail for the subject!');
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

        return redirect(route('details.edit',$id))->with('Messages','You have updated the Serology Test detail for the subject!');
    }
}
