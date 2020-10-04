<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Patient_PhysicalExamination;
use DB;

class PE_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function storePE(Request $request,$id)
    {
        $pe = new Patient_PhysicalExamination;

        $data =$request->except('_token','dateTaken','timeTaken');

        $pe->patient_id=$id;
        $pe->dateTaken=$request->dateTaken;

        foreach($data as $key=>$value)
        {
            if($value=="Abnormal")
            {
                $abnormal_txt=$key."_txt";
             /*   echo $key."=".$data[$abnormal_txt].'</br>';*/
                $pe->$key=$data[$abnormal_txt];
            }else if($value=="Normal")
            {
                $normal_txt=$key;
                /*echo $key."=".$data[$normal_txt].'</br>';*/
                $pe->$key=$data[$normal_txt];
            }else if($key =="Cubital_Fossa_Veins")
            {
                /*echo $key."=".$data[$key].'</br>';*/
                $pe->$key=$data[$key];
            }else if($key== "Comments_Physically_Healthy" and $value ==!NULL)
            {
              /*  echo $key."=".$data[$key].'</br>';*/
                $pe->$key=$data[$key];
            }else if($key == "Comments_Otherwise" and $value==!NULL)
            {
              /*  echo $key."=".$data[$key].'</br>';*/
                $pe->$key=$data[$key];
            }
        }

         $pe->save();

        return redirect(route('details.create',$id));
    }
    public function updatePE(Request $request,$id)
    {
       DB::table('patient_physical_examinations')
            ->where('patient_id',$id)
            ->update([
            'dateTaken'=>$request->dateTaken,
            'GeneralAppearance'=>$request->GeneralAppearance,
            'Skin'=>$request->Skin,
            'Head_Neck'=>$request->Head_Neck,
            'Eyes'=>$request->Eyes,
            'Ears_Nose_Throat'=>$request->Ears_Nose_Throat,
            'Mouth'=>$request->Mouth,
            'Chest_Lungs'=>$request->Chest_Lungs,
            'Heart'=>$request->Heart,
            'Abdomen'=>$request->Abdomen,
            'Back_Spine'=>$request->Back_Spine,
            'Musculoskeletal'=>$request->Musculoskeletal,
            'Neurological'=>$request->Neurological,
            'Extremities'=>$request->Extremities,
            'Lymph_Nodes'=>$request->Lymph_Nodes,
            'Other'=>$request->Other,
            'Cubital_Fossa_Veins'=>$request->Cubital_Fossa_Veins,
            'Comments'=>$request->Comments,
            'Comments_Physically_Healthy'=>$request->Comments_Physically_Healthy,
            'Comments_Otherwise'=>$request->Comments_Otherwise
        ]);

        return redirect(route('details.create',$id));
    }
}
