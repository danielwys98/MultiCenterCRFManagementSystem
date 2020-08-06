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

        $pe->patient_id=$id;
        $pe->dateTaken=$request->dateTaken;
        $pe->GeneralAppearance=$request->GeneralAppearance;
        $pe->Skin=$request->Skin;
        $pe->Head_Neck=$request->Head_Neck;
        $pe->Eyes=$request->Eyes;
        $pe->Ears_Nose_Throat=$request->Ears_Nose_Throat;
        $pe->Mouth=$request->Mouth;
        $pe->Chest_Lungs=$request->Chest_Lungs;
        $pe->Heart=$request->Heart;
        $pe->Abdomen=$request->Abdomen;
        $pe->Back_Spine=$request->Back_Spine;
        $pe->Musculoskeletal=$request->Musculoskeletal;
        $pe->Neurological=$request->Neurological;
        $pe->Extremities=$request->Extremities;
        $pe->Lymph_Nodes=$request->Lymph_Nodes;
        $pe->Other=$request->Other;
        $pe->Cubital_Fossa_Veins=$request->Cubital_Fossa_Veins;
        $pe->Comments=$request->Comments;
        $pe->Comments_Physically_Healthy=$request->Comments_Physically_Healthy;
        $pe->Comments_Otherwise=$request->Comments_Otherwise;

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
