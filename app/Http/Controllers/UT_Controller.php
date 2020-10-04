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
        /*dd($request);*/
        /*if($request->UPreg_male==true){

        }else{

        }*/
        $ut = new Patient_UrineTest;

        $UPreg_lab=$request->UPreg_Laboratory;
        $UDrug_lab=$request->UDrug_Laboratory;

        $ut->patient_id=$id;

        // Urine Pregnancy
        $ut->UPreg_male=$request->UPreg_male;
        $ut->UPreg_dateTaken=$request->UPreg_dateTaken;
        $ut->UPreg_TestTime=$request->UPreg_TestTime;
        $ut->UPreg_ReadTime=$request->UPreg_ReadTime;

        if($UPreg_lab=='Other'){
            $ut->UPreg_Laboratory=$request->UPreg_Laboratory_Text;
        }else{
            $ut->UPreg_Laboratory=$UPreg_lab;
        }
        $ut->UPreg_hCG=$request->UPreg_hCG;
        $ut->UPreg_hCG_Comment=$request->UPreg_hCG_Comment;
        $ut->UPreg_Transcribedby=$request->UPreg_Transcribedby;

        // Urine Drug
        $ut->UDrug_dateTaken=$request->UDrug_dateTaken;
        $ut->UDrug_TestTime=$request->UDrug_TestTime;
        $ut->UDrug_ReadTime=$request->UDrug_ReadTime;

        if($UDrug_lab=='Other')
            $ut->UDrug_Laboratory=$request->UDrug_Laboratory_Text;
        else
            $ut->UDrug_Laboratory=$UDrug_lab;

        $ut->UDrug_Methamphetamine=$request->UDrug_Methamphetamine;
        $ut->UDrug_Methamphetamine_Comment=$request->UDrug_Methamphetamine_Comment;

        $ut->UDrug_Morphine=$request->UDrug_Morphine;
        $ut->UDrug_Morphine_Comment=$request->UDrug_Morphine_Comment;

        $ut->UDrug_Marijuana=$request->UDrug_Marijuana;
        $ut->UDrug_Marijuana_Comment=$request->UDrug_Marijuana_Comment;
        $ut->UDrug_Transcribedby=$request->UDrug_Transcribedby;

        $ut->save();

        return redirect(route('details.create',$id));
    }

    public function updateUT(Request $request,$id)
    {
        //dd($request);
        DB::table('patient_urine_tests')
            ->where('patient_id',$id)
            ->update([
                'UPreg_male'=>$request->UPreg_male,

                'UPreg_dateTaken'=>$request->UPreg_dateTaken,
                'UPreg_TestTime'=>$request->UPreg_TestTime,
                'UPreg_ReadTime'=>$request->UPreg_ReadTime,

                'UPreg_hCG'=>$request->UPreg_hCG,
                'UPreg_hCG_Comment'=>$request->UPreg_hCG_Comment,
                'UPreg_Transcribedby'=>$request->UPreg_Transcribedby,

                'UDrug_dateTaken'=>$request->UDrug_dateTaken,
                'UDrug_TestTime'=>$request->UDrug_TestTime,
                'UDrug_ReadTime'=>$request->UDrug_ReadTime,
                'UDrug_Methamphetamine'=>$request->UDrug_Methamphetamine,
                'UDrug_Methamphetamine_Comment'=>$request->UDrug_Methamphetamine_Comment,
                'UDrug_Morphine'=>$request->UDrug_Morphine,
                'UDrug_Morphine_Comment'=>$request->UDrug_Morphine_Comment,
                'UDrug_Marijuana'=>$request->UDrug_Marijuana,
                'UDrug_Marijuana_Comment'=>$request->UDrug_Marijuana_Comment,
                'UDrug_Transcribedby'=>$request->UDrug_Transcribedby
            ]);

        //Check Urine Test Lab
        if($request->UPreg_Laboratory!='Sarawak General Hospital Heart Centre'){
            DB::table('patient_urine_tests')
                ->where('patient_id',$id)
                ->update([
                    'UPreg_Laboratory'=>$request->UPreg_Laboratory_Text
                ]);
        }else{
            DB::table('patient_urine_tests')
                ->where('patient_id',$id)
                ->update([
                    'UPreg_Laboratory'=>$request->UPreg_Laboratory
                ]);
        }

        //Check Drug Test Lab
        if($request->UDrug_Laboratory!='Sarawak General Hospital Heart Centre'){
            DB::table('patient_urine_tests')
                ->where('patient_id',$id)
                ->update([
                    'UDrug_Laboratory'=>$request->UDrug_Laboratory_Text
                ]);
        }else{
            DB::table('patient_urine_tests')
                ->where('patient_id',$id)
                ->update([
                    'UDrug_Laboratory'=>$request->UDrug_Laboratory
                ]);
        }

        return redirect(route('details.edit',$id));
    }
}
