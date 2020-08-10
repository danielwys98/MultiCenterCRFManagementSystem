<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Patient_UrineTest;
use Illuminate\Http\Request;
use DB;

class UT_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function storeUT(Request $request,$id)
    {
        $ut = new Patient_UrineTest;

        $ut->patient_id=$id;

        // Urine Pregnancy
        $ut->UPreg_male=$request->UPreg_male;

        $ut->UPreg_dateTaken=$request->UPreg_dateTaken;
        $ut->UPreg_TestTime=$request->UPreg_TestTime;
        $ut->UPreg_ReadTime=$request->UPreg_ReadTime;

        $ut->UPreg_Laboratory=$request->UPreg_Laboratory;
        $ut->UPreg_hCG=$request->UPreg_hCG;
        $ut->UPreg_Transcribedby=$request->UPreg_Transcribedby;

        // Urine Drug
        $ut->UDrug_dateTaken=$request->UDrug_dateTaken;
        $ut->UDrug_TestTime=$request->UDrug_TestTime;
        $ut->UDrug_ReadTime=$request->UDrug_ReadTime;
        $ut->UDrug_Laboratory=$request->UDrug_Laboratory;
        $ut->UDrug_Methamphetamine=$request->UDrug_Methamphetamine;
        $ut->UDrug_Morphine=$request->UDrug_Morphine;
        $ut->UDrug_Marijuana=$request->UDrug_Marijuana;
        $ut->UDrug_Transcribedby=$request->UDrug_Transcribedby;

        $ut->save();

        return redirect(route('details.create',$id));
    }

    public function updateUT(Request $request,$id)
    {
        DB::table('patient_physical_examinations')
            ->where('patient_id',$id)
            ->update([
                'UPreg_male'=>$request->UPreg_male,

                'UPreg_dateTaken'=>$request->UPreg_dateTaken,
                'UPreg_TestTime'=>$request->UPreg_TestTime,
                'UPreg_ReadTime'=>$request->UPreg_ReadTime,

                'UPreg_Laboratory'=>$request->UPreg_Laboratory,
                'UPreg_hCG'=>$request->UPreg_hCG,
                'UPreg_Transcribedby'=>$request->UPreg_Transcribedby,

                'UDrug_dateTaken'=>$request->UDrug_dateTaken,
                'UDrug_TestTime'=>$request->UDrug_TestTime,
                'UDrug_ReadTime'=>$request->UDrug_ReadTime,
                'UDrug_Laboratory'=>$request->UDrug_Laboratory,
                'UDrug_Methamphetamine'=>$request->UDrug_Methamphetamine,
                'UDrug_Morphine'=>$request->UDrug_Morphine,
                'UDrug_Marijuana'=>$request->UDrug_Marijuana,
                'UDrug_Transcribedby'=>$request->UDrug_Transcribedby
            ]);

        return redirect(route('details.create',$id));
    }
}
