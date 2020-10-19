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

        // dd($request);
        $ut->patient_id=$id;
        // Urine Pregnancy
        $ut->UPreg_male=$request->UPreg_male;

        // Urine Drug
        $ut->UDrug_dateTaken=$request->UDrug_dateTaken;
        $ut->UDrug_TestTime=$request->UDrug_TestTime;
        $ut->UDrug_ReadTime=$request->UDrug_ReadTime;
        $UDrug_lab=$request->UDrug_Laboratory;

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

        if($request->UPreg_male == 1){
            $validatedData=$this->validate($request,[
                'UDrug_Laboratory' => 'required',
                'UDrug_dateTaken' => 'required',
                'UDrug_TestTime' => 'required',
                'UDrug_ReadTime' => 'required',
                'UDrug_Methamphetamine' => 'required',
                'UDrug_Morphine' => 'required',
                'UDrug_Marijuana' => 'required',
                'UDrug_Transcribedby' => 'required',
            ]);
            $ut->UPreg_dateTaken=NULL;
            $ut->UPreg_TestTime=NULL;
            $ut->UPreg_ReadTime=NULL;
            $ut->UPreg_Laboratory=NULL;
            $ut->UPreg_hCG=NULL;
            $ut->UPreg_hCG_Comment=NULL;
            $ut->UPreg_Transcribedby=NULL;

        }else{
            $ut->UPreg_dateTaken=$request->UPreg_dateTaken;
            $ut->UPreg_TestTime=$request->UPreg_TestTime;
            $ut->UPreg_ReadTime=$request->UPreg_ReadTime;
            $UPreg_lab=$request->UPreg_Laboratory;

            if($UPreg_lab=='Other'){
                $ut->UPreg_Laboratory=$request->UPreg_Laboratory_Text;
            }else{
                $ut->UPreg_Laboratory=$UPreg_lab;
            }
            $ut->UPreg_hCG=$request->UPreg_hCG;
            $ut->UPreg_hCG_Comment=$request->UPreg_hCG_Comment;
            $ut->UPreg_Transcribedby=$request->UPreg_Transcribedby;

            $validatedData=$this->validate($request,[
                'UPreg_Laboratory' => 'required',
                'UDrug_Laboratory' => 'required',
                'UPreg_dateTaken' => 'required',
                'UPreg_TestTime' => 'required',
                'UPreg_ReadTime' => 'required',
                'UPreg_hCG' => 'required',
                'UPreg_Transcribedby' => 'required',
                'UDrug_dateTaken' => 'required',
                'UDrug_TestTime' => 'required',
                'UDrug_ReadTime' => 'required',
                'UDrug_Methamphetamine' => 'required',
                'UDrug_Morphine' => 'required',
                'UDrug_Marijuana' => 'required',
                'UDrug_Transcribedby' => 'required',
            ]);
        }

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

        $UPreg_male=$request->UPreg_male;

        //Check and Store Drug Test Lab
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
        if($UPreg_male == 1){
            DB::table('patient_urine_tests')
                ->where('patient_id',$id)
                ->update([
                    'UPreg_dateTaken'=>NULL,
                    'UPreg_TestTime'=>NULL,
                    'UPreg_ReadTime'=>NULL,
                    'UPreg_Laboratory'=>NULL,
                    'UPreg_hCG'=>NULL,
                    'UPreg_hCG_Comment'=>NULL,
                    'UPreg_Transcribedby'=>NULL]);
            $validatedData=$this->validate($request,[
                'UDrug_Laboratory' => 'required',
                'UDrug_dateTaken' => 'required',
                'UDrug_TestTime' => 'required',
                'UDrug_ReadTime' => 'required',
                'UDrug_Methamphetamine' => 'required',
                'UDrug_Morphine' => 'required',
                'UDrug_Marijuana' => 'required',
                'UDrug_Transcribedby' => 'required',
            ]);
        }else{
            DB::table('patient_urine_tests')
            ->where('patient_id',$id)
            ->update([
                'UPreg_dateTaken'=>$request->UPreg_dateTaken,
                'UPreg_TestTime'=>$request->UPreg_TestTime,
                'UPreg_ReadTime'=>$request->UPreg_ReadTime,
                'UPreg_hCG'=>$request->UPreg_hCG,
                'UPreg_hCG_Comment'=>$request->UPreg_hCG_Comment,
                'UPreg_Transcribedby'=>$request->UPreg_Transcribedby,
            ]);
            //Check and Store Urine Test Lab
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

            $validatedData=$this->validate($request,[
                'UPreg_Laboratory' => 'required',
                'UDrug_Laboratory' => 'required',
                'UPreg_dateTaken' => 'required',
                'UPreg_TestTime' => 'required',
                'UPreg_ReadTime' => 'required',
                'UPreg_hCG' => 'required',
                'UPreg_Transcribedby' => 'required',
                'UDrug_dateTaken' => 'required',
                'UDrug_TestTime' => 'required',
                'UDrug_ReadTime' => 'required',
                'UDrug_Methamphetamine' => 'required',
                'UDrug_Morphine' => 'required',
                'UDrug_Marijuana' => 'required',
                'UDrug_Transcribedby' => 'required',
            ]);
        }
        return redirect(route('details.edit',$id));
    }
}
