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

        $st->patient_id=$id;
        $st->dateCTaken=$request->dateCTaken;
        $st->dateBCollected=$request->dateBCollected;

        if($request->Laboratory=='Other'){
            $st->Laboratory=$request->Laboratory.": ".$request->Laboratory_txt;
        }else{
            $st->Laboratory=$request->Laboratory;
        }

        $validatedData=$this->validate($request,[
            'dateBCollected' => 'required',
            'Laboratory' => 'required',
        ]);

        $st->save();
        return redirect(route('details.create',$id));
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
                   'Laboratory'=>$request->Laboratory_txt
               ]);
       }else{
           DB::table('patient_serology_tests')
               ->where('patient_id',$id)
               ->update([
                   'Laboratory'=>$request->Laboratory
               ]);
       }
       $validatedData=$this->validate($request,[
        'dateBCollected' => 'required',
        'Laboratory' => 'required',
        ]);
        return redirect(route('details.edit',$id));
    }
}
