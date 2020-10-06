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
        $cs = new Patient_Serology_Test;

        $cs->patient_id=$id;
        $cs->dateCTaken=$request->dateCTaken;
        $cs->dateBCollected=$request->dateBCollected;

        if($request->Laboratory=='Other')
            $cs->Laboratory=$request->Laboratory_txt;
        else
            $cs->Laboratory=$request->Laboratory;

        $cs->save();

        $validatedData=$this->validate($request,[
            'dateBCollected' => 'required',
            'physicianSign' => 'required',
            'Laboratory' => 'required',
        ]);
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
        'physicianSign' => 'required',
        'Laboratory' => 'required',
        ]);
        return redirect(route('details.edit',$id));
    }
}
