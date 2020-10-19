<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Patient_MedicalHistory;
use DB;
use function GuzzleHttp\Psr7\copy_to_string;

class MH_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function storeMH(Request $request,$id)
    {
     $mh = new Patient_MedicalHistory();
        $data =$request->except('_token','dateTaken','timeTaken');

        $mh->patient_id = $id;
        $mh->dateTaken=$request->dateTaken;
        $mh->timeTaken=$request->timeTaken;

        // dd($request);
        //some key does not have the text box, therefore, those keys needed be checked individually.
        foreach($data as $key=>$value)
        {
            if($value =="Abnormal")
            {
                $abnormal_txt= $key."_txt";
                 $mh->$key=$data[$abnormal_txt];
            }else if($value == "Normal")
            {
                $normal_txt = $key;
               $mh->$key=$data[$normal_txt];
            }else if($key == "RegularPeriods" and $value == "Yes")
            {
                $RP_Yes = $key."_Yes_txt";
                $mh->$key=$value.",".$data[$RP_Yes];
            }else if($key == "RegularPeriods" and $value == "No")
            {
                $RP_No= $key."_No_txt";
                $mh->$key=$value.",".$data[$RP_No];
            }else if($key == "RegularPeriods" and $value =="Not Applicable")
            {
                $mh->$key=$data[$key];
            }else if($key =="FertilityControl" and $value =="Yes")
            {
                $FC_Yes = $key."_Yes_txt";
                if(array_key_exists($FC_Yes, $data)){
                    $mh->$key=$value.",".$data[$FC_Yes];
                }else{
                    $mh->$key="Yes";
                }
            }else if($key =="FertilityControl" and $value=="No")
            {
                $FC_No = $key."_No_txt";
                if(array_key_exists($FC_No, $data)){
                    $mh->$key=$value.",".$data[$FC_No];
                }else{
                    $mh->$key="No";
                }
            }else if($key =="FertilityControl" and $value == "Not Applicable")
            {
                $mh->$key=$data[$key];
            }
            else if($key == "ActiveSexAct")
            {
                $mh->$key=$data[$key];
            }
            else if($key == "Breastfeeding")
            {
                $mh->$key=$data[$key];
            }else if($key == "Conclusion")
            {
                $mh->$key=$data[$key];
            }
            else if($value == "Yes")
            {
                $yes_txt = $key."_txt";
                if(array_key_exists($yes_txt, $data)){
                    $mh->$key=$value.",".$data[$yes_txt];
                }else{
                    $mh->$key=$data;
                }
            }else if($value == "No")
            {
                $no_txt = $key;
                $mh->$key=$data[$no_txt];
            }
        }

        $validatedData=$this->validate($request,[
            'Allergy'  => 'required',
            'Allergy_txt' => 'required_if:Allergy,==,Abnormal',
            'EENT'  => 'required',
            'EENT_txt' => 'required_if:EENT,==,Abnormal',
            'Respiratory'  => 'required',
            'Respiratory_txt' => 'required_if:Respiratory,==,Abnormal',
            'Cardiovascular'  => 'required',
            'Cardiovascular_txt' => 'required_if:Cardiovascular,==,Abnormal',
            'Gastrointestinal'  => 'required',
            'Gastrointestinal_txt' => 'required_if:Gastrointestinal,==,Abnormal',
            'Genitourinary'  => 'required',
            'Genitourinary_txt' => 'required_if:Genitourinary,==,Abnormal',
            'Neurological'  => 'required',
            'Neurological_txt' => 'required_if:Neurological,==,Abnormal',
            'HaematopoieticL'  => 'required',
            'HaematopoieticL_txt' => 'required_if:HaematopoieticL,==,Abnormal',
            'EndocrineM'  => 'required',
            'EndocrineM_txt' => 'required_if:EndocrineM,==,Abnormal',
            'Dermatological'  => 'required',
            'Dermatological_txt' => 'required_if:Dermatological,==,Abnormal',
            'Musculoskeletal'  => 'required',
            'Musculoskeletal_txt' => 'required_if:Musculoskeletal,==,Abnormal',
            'Psychological'  => 'required',
            'Psychological_txt' => 'required_if:Psychological,==,Abnormal',
            'FamilyHistory'  => 'required',
            'FamilyHistory_txt' => 'required_if:FamilyHistory,==,Abnormal',
            'SurgicalHistory'  => 'required',
            'SurgicalHistory_txt' => 'required_if:SurgicalHistory,==,Abnormal',
            'PrevHospitalization'  => 'required',
            'PrevHospitalization_txt' => 'required_if:PrevHospitalization,==,Abnormal',
            'Smoker'  => 'required',
            'RAI'  => 'required',
            'RMS'  => 'required',
            'RegularExercise'  => 'required',
            'BloodDonations'  => 'required',
            'RegularPeriods'  => 'required',
            'RegularPeriods_No_txt' => 'required_if:RegularPeriods,==,No',
            'RegularPeriods_Yes_txt' => 'required_if:RegularPeriods,==,Yes',
            'ActiveSexAct'  => 'required',
            'FertilityControl'  => 'required',
            'FertilityControl_No_txt' => 'required_if:FertilityControl,==,No',
            'FertilityControl_Yes_txt' => 'required_if:FertilityControl,==,Yes',
            'Breastfeeding'  => 'required',
            'Conclusion' => 'required',
        ]);

            $mh->save();
       return redirect(route('details.create',$id));
    }
    public function updateMH(Request $request,$id)
    {
       DB::table('patient_medical_histories')
            ->where('patient_id',$id)
            ->update([
            'dateTaken'=>$request->dateTaken,
            'timeTaken'=>$request->timeTaken,
        ]);

        foreach($data as $key=>$value)
        {
            if($value =="Abnormal")
            {
                $abnormal_txt= $key."_txt";
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$abnormal_txt]
                ]);
            }else if($value == "Normal")
            {
                $normal_txt = $key;
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$normal_txt]
                ]);               
            }else if($key == "RegularPeriods" and $value == "Yes")
            {
                $RP_Yes = $key."_Yes_txt";
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    'RegularPeriods_YesNo'=>$data[$key],
                    $key=>$value.",".$data[$RP_Yes]
                ]);
            }else if($key == "RegularPeriods" and $value == "No")
            {
                $RP_No= $key."_No_txt";
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    'RegularPeriods_YesNo'=>$data[$key],
                    $key=>$value.",".$data[$RP_No]
                ]);
            }else if($key == "RegularPeriods" and $value =="Not Applicable")
            {
                $mh->$key=$data[$key];
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    'RegularPeriods_YesNo'=>$data[$key]
                ]); 
            }else if($key =="FertilityControl" and $value =="Yes")
            {
                $FC_Yes = "FertilityControl_Yes_txt";
                if(array_key_exists($FC_Yes, $data)){
                    $mh->$key=$value.",".$data[$FC_Yes];
                    DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$FC_Yes]
                ]);
                }else{
                    DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>"Yes"
                ]);
                }
            }else if($key =="FertilityControl" and $value=="No")
            {
                $FC_No = "FertilityControl_No_txt";
                if(array_key_exists($FC_No, $data)){
                    $mh->$key=$value.",".$data[$FC_No];
                    DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$FC_No]
                ]);
                }else{
                    DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>"No"
                ]);
                }
            }else if($key =="FertilityControl" and $value == "Not Applicable")
            {
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$key]
                ]);
            }
            else if($key == "ActiveSexAct")
            {
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$key]
                ]);
            }
            else if($key == "Breastfeeding")
            {
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$key]
                ]);
            }else if($key == "Conclusion")
            {
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$key]
                ]);
            }
            else if($value == "Yes")
            {
                $yes_txt = $key."_txt";
                if(array_key_exists($yes_txt, $data)){
                    DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$value.",".$data[$yes_txt]
                ]);
                }else{
                    DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data
                ]);
                }
            }else if($value == "No")
            {
                $no_txt = $key;
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$no_txt]
                ]);
            }
        }

        $validatedData=$this->validate($request,[
            'Allergy'  => 'required',
            'Allergy_txt' => 'required_if:Allergy,==,Abnormal',
            'EENT'  => 'required',
            'EENT_txt' => 'required_if:EENT,==,Abnormal',
            'Respiratory'  => 'required',
            'Respiratory_txt' => 'required_if:Respiratory,==,Abnormal',
            'Cardiovascular'  => 'required',
            'Cardiovascular_txt' => 'required_if:Cardiovascular,==,Abnormal',
            'Gastrointestinal'  => 'required',
            'Gastrointestinal_txt' => 'required_if:Gastrointestinal,==,Abnormal',
            'Genitourinary'  => 'required',
            'Genitourinary_txt' => 'required_if:Genitourinary,==,Abnormal',
            'Neurological'  => 'required',
            'Neurological_txt' => 'required_if:Neurological,==,Abnormal',
            'HaematopoieticL'  => 'required',
            'HaematopoieticL_txt' => 'required_if:HaematopoieticL,==,Abnormal',
            'EndocrineM'  => 'required',
            'EndocrineM_txt' => 'required_if:EndocrineM,==,Abnormal',
            'Dermatological'  => 'required',
            'Dermatological_txt' => 'required_if:Dermatological,==,Abnormal',
            'Musculoskeletal'  => 'required',
            'Musculoskeletal_txt' => 'required_if:Musculoskeletal,==,Abnormal',
            'Psychological'  => 'required',
            'Psychological_txt' => 'required_if:Psychological,==,Abnormal',
            'FamilyHistory'  => 'required',
            'FamilyHistory_txt' => 'required_if:FamilyHistory,==,Abnormal',
            'SurgicalHistory'  => 'required',
            'SurgicalHistory_txt' => 'required_if:SurgicalHistory,==,Abnormal',
            'PrevHospitalization'  => 'required',
            'PrevHospitalization_txt' => 'required_if:PrevHospitalization,==,Abnormal',
            'Smoker'  => 'required',
            'RAI'  => 'required',
            'RMS'  => 'required',
            'RegularExercise'  => 'required',
            'BloodDonations'  => 'required',
            'RegularPeriods'  => 'required',
            'RegularPeriods_No_txt' => 'required_if:RegularPeriods,==,No',
            'RegularPeriods_Yes_txt' => 'required_if:RegularPeriods,==,Yes',
            'ActiveSexAct'  => 'required',
            'FertilityControl'  => 'required',
            'FertilityControl_No_txt' => 'required_if:FertilityControl,==,No',
            'FertilityControl_Yes_txt' => 'required_if:FertilityControl,==,Yes',
            'Breastfeeding'  => 'required',
            'Conclusion' => 'required',
        ]);

        return redirect(route('details.edit',$id));
    }
}
