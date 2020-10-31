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
        $this->middleware('checkAdmin');
    }
    public function storePE(Request $request,$id)
    {
        $pe = new Patient_PhysicalExamination;

        $custom = [
            'dateTaken.required' => 'Please enter the date taken',
            'GeneralAppearance.required' => 'Please state the General Appearance abnormalities of the subject',
            'GeneralAppearance_txt.required_if' => 'If General Appearance field is abnormal, please give pertinent details',
            'Skin.required' => 'Please state the Skin abnormalities of the subject',
            'Skin_txt.required_if' => 'If Skin field is abnormal, please give pertinent details',
            'Head_Neck.required' => 'Please state the Head Neck abnormalities of the subject',
            'Head_Neck_txt.required_if' => 'If Head Neck field is abnormal, please give pertinent details',
            'Eyes.required' => 'Please state the Eyes abnormalities of the subject',
            'Eyes_txt.required_if' => 'If Eyes field is abnormal, please give pertinent details',
            'Ears_Nose_Throat.required' => 'Please state the Ears Nose Throat abnormalities of the subject',
            'Ears_Nose_Throat_txt.reqrequiredrequired_if_ifuired' => 'If Ears Nose Throat field is abnormal, please give pertinent details',
            'Mouth.required' => 'Please state the Mouth abnormalities of the subject',
            'Mouth_txt.required_if' => 'If Mouth field is abnormal, please give pertinent details',
            'Chest_Lungs.required' => 'Please state the Chest Lungs abnormalities of the subject',
            'Chest_Lungs_txt.required_if' => 'If Chest Lungs field is abnormal, please give pertinent details',
            'Heart.required' => 'Please state the Heart abnormalities of the subject',
            'Heart_txt.required_if' => 'If Heart field is abnormal, please give pertinent details',
            'Abdomen.required' => 'Please state the Abdomen abnormalities of the subject',
            'Abdomen_txt.required_if' => 'If Abdomen field is abnormal, please give pertinent details',
            'Back_Spine.required' => 'Please state the Back Spine abnormalities of the subject',
            'Back_Spine_txt.required_if' => 'If Back Spine field is abnormal, please give pertinent details',
            'Musculoskeletal.required' => 'Please state the Musculoskeletal abnormalities of the subject',
            'Musculoskeletal_txt.required_if' => 'If Musculoskeletal field is abnormal, please give pertinent details',
            'Neurological.required' => 'Please state the Neurological abnormalities of the subject',
            'Neurological_txt.required_if' => 'If Neurological field is abnormal, please give pertinent details',
            'Extremities.required' => 'Please state the Extremities abnormalities of the subject',
            'Extremities_txt.required_if' => 'If Extremities field is abnormal, please give pertinent details',
            'Lymph_Nodes.required' => 'Please state the Lymph Nodes abnormalities of the subject',
            'Lymph_Nodes_txt.required_if' => 'If Lymph Nodes field is abnormal, please give pertinent details',
            'Other.required' => 'Please state the Other abnormalities of the subject',
            'Other_txt.required_if' => 'If Other field is abnormal, please give pertinent details',
            'Cubital_Fossa_Veins.required' => 'Please select the condition of subject Cubital Fossa Veins',
            'Comments.required' => 'Please select whether the subject is physically healthy or otherwise in the comments section',
            'Comments_Physically_Healthy.required_if' => 'If the subject is physically healthy, please state any additional info',
            'Comments_Otherwise.required_if' => 'If the subject is otherwise, please state any additional info',
        ];

        $validatedData=$this->validate($request,[
            'dateTaken' => 'required',
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
        ],$custom);

        $data =$request->except('_token','dateTaken','timeTaken');

        $pe->patient_id=$id;
        $pe->dateTaken=$request->dateTaken;

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
                $commentsSavePH=$key."_txt";
                $pe->$key=$data[$key];
                $pe->$commentsSavePH=$data[$Comments_Physically_Healthy];
            }else if($value=="Otherwise")
            {
                $Comments_Otherwise=$key."_Otherwise";
                $commentsSaveO=$key."_txt";
                $pe->$key=$data[$key];
                $pe->$commentsSaveO="Otherwise: ".$data[$Comments_Otherwise];
            }
        }

        $pe->save();

        return redirect(route('preScreeningForms.create',$id))->with('success','You have added the Physical Examination detail for the subject!');
    }
    public function updatePE(Request $request,$id)
    {
        $custom = [
            'dateTaken.required' => 'Please enter the date taken',
            'generalappearance.required' => 'Please state the General Appearance abnormalities of the subject',
            'generalappearance_txt.required_if' => 'If General Appearance field is abnormal, please give pertinent details',
            'skin.required' => 'Please state the Skin abnormalities of the subject',
            'skin_txt.required_if' => 'If Skin field is abnormal, please give pertinent details',
            'head_neck.required' => 'Please state the Head Neck abnormalities of the subject',
            'head_neck_txt.required_if' => 'If Head Neck field is abnormal, please give pertinent details',
            'eyes.required' => 'Please state the Eyes abnormalities of the subject',
            'eyes_txt.required_if' => 'If Eyes field is abnormal, please give pertinent details',
            'ears_nose_throat.required' => 'Please state the Ears Nose Throat abnormalities of the subject',
            'ears_nose_throat_txt.reqrequiredrequired_if_ifuired' => 'If Ears Nose Throat field is abnormal, please give pertinent details',
            'mouth.required' => 'Please state the Mouth abnormalities of the subject',
            'mouth_txt.required_if' => 'If Mouth field is abnormal, please give pertinent details',
            'chest_lungs.required' => 'Please state the Chest Lungs abnormalities of the subject',
            'chest_lungs_txt.required_if' => 'If Chest Lungs field is abnormal, please give pertinent details',
            'heart.required' => 'Please state the Heart abnormalities of the subject',
            'heart_txt.required_if' => 'If Heart field is abnormal, please give pertinent details',
            'abdomen.required' => 'Please state the Abdomen abnormalities of the subject',
            'abdomen_txt.required_if' => 'If Abdomen field is abnormal, please give pertinent details',
            'back_spine.required' => 'Please state the Back Spine abnormalities of the subject',
            'back_spine_txt.required_if' => 'If Back Spine field is abnormal, please give pertinent details',
            'musculoskeletal.required' => 'Please state the Musculoskeletal abnormalities of the subject',
            'musculoskeletal_txt.required_if' => 'If Musculoskeletal field is abnormal, please give pertinent details',
            'neurological.required' => 'Please state the Neurological abnormalities of the subject',
            'neurological_txt.required_if' => 'If Neurological field is abnormal, please give pertinent details',
            'extremities.required' => 'Please state the Extremities abnormalities of the subject',
            'extremities_txt.required_if' => 'If Extremities field is abnormal, please give pertinent details',
            'lymph_nodes.required' => 'Please state the Lymph Nodes abnormalities of the subject',
            'lymph_nodes_txt.required_if' => 'If Lymph Nodes field is abnormal, please give pertinent details',
            'other.required' => 'Please state the Other abnormalities of the subject',
            'other_txt.required_if' => 'If Other field is abnormal, please give pertinent details',
            'Cubital_Fossa_Veins.required' => 'Please select the condition of subject Cubital Fossa Veins',
            'comments.required' => 'Please select whether the subject is physically healthy or otherwise in the comments section',
            'comments_Physically_Healthy.required_if' => 'If the subject is physically healthy, please state any additional info',
            'comments_Otherwise.required_if' => 'If the subject is otherwise, please state any additional info',
        ];

        $validatedData=$this->validate($request,[
            'dateTaken' => 'required',
            'generalappearance'  => 'required',
            'generalappearance_txt' => 'required_if:generalappearance,==,Abnormal',
            'skin'  => 'required',
            'skin_txt' => 'required_if:skin,==,Abnormal',
            'head_neck'  => 'required',
            'head_neck_txt' => 'required_if:head_neck,==,Abnormal',
            'eyes'  => 'required',
            'eyes_txt' => 'required_if:eyes,==,Abnormal',
            'ears_nose_throat'  => 'required',
            'ears_nose_throat_txt' => 'required_if:ears_nose_throat,==,Abnormal',
            'mouth'  => 'required',
            'mouth_txt' => 'required_if:mouth,==,Abnormal',
            'chest_lungs'  => 'required',
            'chest_lungs_txt' => 'required_if:chest_lungs,==,Abnormal',
            'heart'  => 'required',
            'heart_txt' => 'required_if:heart,==,Abnormal',
            'abdomen'  => 'required',
            'abdomen_txt' => 'required_if:abdomen,==,Abnormal',
            'back_spine'  => 'required',
            'back_spine_txt' => 'required_if:back_spine,==,Abnormal',
            'musculoskeletal'  => 'required',
            'musculoskeletal_txt' => 'required_if:musculoskeletal,==,Abnormal',
            'neurological'  => 'required',
            'neurological_txt' => 'required_if:neurological,==,Abnormal',
            'extremities'  => 'required',
            'extremities_txt' => 'required_if:extremities,==,Abnormal',
            'lymph_nodes'  => 'required',
            'lymph_nodes_txt' => 'required_if:lymph_nodes,==,Abnormal',
            'other'  => 'required',
            'other_txt' => 'required_if:other,==,Abnormal',

            'Cubital_Fossa_Veins' => 'required',
            'comments' => 'required',
            'comments_Physically_Healthy' => 'required_if:comments,==,Physically Healthy',
            'comments_Otherwise' => 'required_if:comments,==,Otherwise',
        ],$custom);

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
                    $key=>$data[$key],
                    $key."_txt" => $data[$Comments_Physically_Healthy]
                ]);
            }else if($value=="Otherwise")
            {
                $Comments_Otherwise=$key."_Otherwise";
                DB::table('patient_physical_examinations')
                ->where('patient_id', $id)
                ->update([
                    $key=>$data[$key],
                    $key."_txt" => $data[$Comments_Otherwise]
                ]);
            }
        }

        return redirect(route('preScreeningForms.edit',$id))->with('success','You have updated the Physical Examination detail for the subject!');
    }
}
