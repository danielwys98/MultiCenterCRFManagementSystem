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

        // dd($request);
        foreach($data as $key=>$value)
        {
            if($value=="Abnormal")
            {
                $abnormal_txt=$key."_txt";
                $pe->$key=$data[$abnormal_txt];
            }else if($value=="Normal")
            {
                $normal_txt=$key;
                $pe->$key=$data[$normal_txt];
            }else if($key =="Cubital_Fossa_Veins")
            {
                $pe->$key=$data[$key];
            }else if($value=="Physically Healthy")
            {
                $Comments_Physically_Healthy=$key."_Physically_Healthy";
                $pe->$key="Physically Healthy: ".$data[$Comments_Physically_Healthy];
            }else if($value=="Otherwise")
            {
                $Comments_Otherwise=$key."_Otherwise";
                $pe->$key="Otherwise: ".$data[$Comments_Otherwise];
            }
        }

        $validatedData=$this->validate($request,[
            'GeneralAppearance'  => 'required',
            'GeneralAppearance_txt' => 'required_if:GeneralAppearance,==,Abnormal',
            'Skin'  => 'required',
            'Skin_txt' => 'required_if:Skin,==,Abnormal',
            'Head_Neck'  => 'required',
            'Head_Neck_txt' => 'required_if:Head_Neck,==,Abnormal',
            'Eyes'  => 'required',
            'Eyes_txt' => 'required_if:Eyes,==,Abnormal',
            'Ears_Nose_Throat'  => 'required',
            'Ears_Nose_Throat_txt' => 'required_if:Ears_Nose_Throat,==,Abnormal',
            'Mouth'  => 'required',
            'Mouth_txt' => 'required_if:Mouth,==,Abnormal',
            'Chest_Lungs'  => 'required',
            'Chest_Lungs_txt' => 'required_if:Chest_Lungs,==,Abnormal',
            'Heart'  => 'required',
            'Heart_txt' => 'required_if:Heart,==,Abnormal',
            'Abdomen'  => 'required',
            'Abdomen_txt' => 'required_if:Abdomen,==,Abnormal',
            'Back_Spine'  => 'required',
            'Back_Spine_txt' => 'required_if:Back_Spine,==,Abnormal',
            'Musculoskeletal'  => 'required',
            'Musculoskeletal_txt' => 'required_if:Musculoskeletal,==,Abnormal',
            'Neurological'  => 'required',
            'Neurological_txt' => 'required_if:Neurological,==,Abnormal',
            'Extremities'  => 'required',
            'Extremities_txt' => 'required_if:Extremities,==,Abnormal',
            'Lymph_Nodes'  => 'required',
            'Lymph_Nodes_txt' => 'required_if:Lymph_Nodes,==,Abnormal',
            'Other'  => 'required',
            'Other_txt' => 'required_if:Other,==,Abnormal',

            'Cubital_Fossa_Veins' => 'required',
            'Comments' => 'required',
            'Comments_Physically_Healthy' => 'required_if:Comments,==,Physically Healthy',
            'Comments_Otherwise' => 'required_if:Comments,==,Otherwise',
        ]);

         $pe->save();

        return redirect(route('details.create',$id))->with('Messages','You have added the Physical Examination detail for the subject!');
    }
    public function updatePE(Request $request,$id)
    {
       DB::table('patient_physical_examinations')
            ->where('patient_id',$id)
            ->update([
            'dateTaken'=>$request->dateTaken,
        ]);

        $data = $request->except('_token','dateTaken','timeTaken');
        foreach($data as $key=>$value)
        {
            if($value=="Abnormal")
            {
                $abnormal_txt=$key."_txt";
                DB::table('patient_physical_examinations')
                ->where('patient_id', $id)
                ->update([
                    $key => $data[$abnormal_txt]
                ]);
            }else if($value=="Normal")
            {
                $normal_txt=$key;
                DB::table('patient_physical_examinations')
                ->where('patient_id', $id)
                ->update([
                    $key => $data[$normal_txt]
                ]);
            }else if($key =="Cubital_Fossa_Veins")
            {
                DB::table('patient_physical_examinations')
                ->where('patient_id', $id)
                ->update([
                    $key => $data[$key]
                ]);
            }else if($value=="Physically Healthy")
            {
                $Comments_Physically_Healthy=$key."_Physically_Healthy";
                DB::table('patient_physical_examinations')
                ->where('patient_id', $id)
                ->update([
                    $key => "Physically Healthy: ".$data[$Comments_Physically_Healthy]
                ]);
            }else if($value=="Otherwise")
            {
                $Comments_Otherwise=$key."_Otherwise";
                DB::table('patient_physical_examinations')
                ->where('patient_id', $id)
                ->update([
                    $key => "Otherwise: ".$data[$Comments_Otherwise]
                ]);
            }
        }

        // $validatedData=$this->validate($request,[
        //     'GeneralAppearance'  => 'required',
        //     'GeneralAppearance_txt' => 'required_if:GeneralAppearance,==,Abnormal',
        //     'Skin'  => 'required',
        //     'Skin_txt' => 'required_if:Skin,==,Abnormal',
        //     'Head_Neck'  => 'required',
        //     'Head_Neck_txt' => 'required_if:Head_Neck,==,Abnormal',
        //     'Eyes'  => 'required',
        //     'Eyes_txt' => 'required_if:Eyes,==,Abnormal',
        //     'Ears_Nose_Throat'  => 'required',
        //     'Ears_Nose_Throat_txt' => 'required_if:Ears_Nose_Throat,==,Abnormal',
        //     'Mouth'  => 'required',
        //     'Mouth_txt' => 'required_if:Mouth,==,Abnormal',
        //     'Chest_Lungs'  => 'required',
        //     'Chest_Lungs_txt' => 'required_if:Chest_Lungs,==,Abnormal',
        //     'Heart'  => 'required',
        //     'Heart_txt' => 'required_if:Heart,==,Abnormal',
        //     'Abdomen'  => 'required',
        //     'Abdomen_txt' => 'required_if:Abdomen,==,Abnormal',
        //     'Back_Spine'  => 'required',
        //     'Back_Spine_txt' => 'required_if:Back_Spine,==,Abnormal',
        //     'Musculoskeletal'  => 'required',
        //     'Musculoskeletal_txt' => 'required_if:Musculoskeletal,==,Abnormal',
        //     'Neurological'  => 'required',
        //     'Neurological_txt' => 'required_if:Neurological,==,Abnormal',
        //     'Extremities'  => 'required',
        //     'Extremities_txt' => 'required_if:Extremities,==,Abnormal',
        //     'Lymph_Nodes'  => 'required',
        //     'Lymph_Nodes_txt' => 'required_if:Lymph_Nodes,==,Abnormal',
        //     'Other'  => 'required',
        //     'Other_txt' => 'required_if:Other,==,Abnormal',

        //     'Cubital_Fossa_Veins' => 'required',
        //     'Comments' => 'required',
        //     'Comments_Physically_Healthy' => 'required_if:Comments,==,Physically Healthy',
        //     'Comments_Otherwise' => 'required_if:Comments,==,Otherwise',
        // ]);

        return redirect(route('details.edit',$id))->with('Messages','You have added the Physical Examination detail for the subject!');
    }
}
