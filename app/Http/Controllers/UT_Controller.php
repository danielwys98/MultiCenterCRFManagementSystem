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
        //dd($request);
        $ut = new Patient_UrineTest;

        $UPreg_lab=$request->UPreg_Laboratory;
        $UDrug_lab=$request->UDrug_Laboratory;

        $ut->patient_id=$id;

        // Urine Pregnancy
        $ut->UPreg_male=$request->UPreg_male;

        $ut->UPreg_dateTaken=$request->UPreg_dateTaken;
        $ut->UPreg_TestTime=$request->UPreg_TestTime;
        $ut->UPreg_ReadTime=$request->UPreg_ReadTime;


        if($UPreg_lab==NULL){
            $ut->UPreg_Laboratory=$request->UPreg_Laboratory_Text;
        }else{
            //$ut->UPreg_Laboratory=$request->UPreg_Laboratory;
            $ut->UPreg_Laboratory=$UPreg_lab;
        }
        $ut->UPreg_hCG=$request->UPreg_hCG;
        //TODO: add comment
        $ut->UPreg_Transcribedby=$request->UPreg_Transcribedby;
        

        // Urine Drug
        $ut->UDrug_dateTaken=$request->UDrug_dateTaken;
        $ut->UDrug_TestTime=$request->UDrug_TestTime;
        $ut->UDrug_ReadTime=$request->UDrug_ReadTime;


        if($UDrug_lab==NULL)
            $ut->UDrug_Laboratory=$request->UDrug_Laboratory_Text;
        else
            $ut->UDrug_Laboratory=$UDrug_lab;

        $ut->UDrug_Methamphetamine=$request->UDrug_Methamphetamine;
        //TODO: add comment

        $ut->UDrug_Morphine=$request->UDrug_Morphine;
        //TODO: add comment

        $ut->UDrug_Marijuana=$request->UDrug_Marijuana;
        //TODO: add comment
        $ut->UDrug_Transcribedby=$request->UDrug_Transcribedby;

        $ut->save();

        return redirect(route('details.create',$id));
    }

    public function updateUT(Request $request,$id)
    {
        dd($request);
        /*DB::table('patient_urine_tests')
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

        return redirect(route('details.create',$id));*/
    }
}
