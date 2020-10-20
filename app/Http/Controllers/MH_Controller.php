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

        $custom = [
            'dateTaken.required' => 'Please input the date taken',
            'timeTaken.required' => 'Please input the time taken',
            'Allergy.required' => 'Please state the Allergy abnormalities of the subject',
            'Allergy_txt.required_if' => 'If Allergy field is abnormal, please give pertinent details',
            'EENT.required' => 'Please state the Eyes-Ears-Nose-Throat abnormalities of the subject',
            'EENT_txt.required_if' => 'If Eyes-Ears-Nose-Throat field is abnormal, please give pertinent details',
            'Respiratory.required' => 'Please state the Respiratory abnormalities of the subject',
            'Respiratory_txt.required_if' => 'If Respiratory field is abnormal, please give pertinent details',
            'Cardiovascular.required' => 'Please state the Cardiovascular abnormalities of the subject',
            'Cardiovascular_txt.required_if' => 'If Cardiovascular field is abnormal, please give pertinent details',
            'Gastrointestinal.required' => 'Please state the Gastrointestinal abnormalities of the subject',
            'Gastrointestinal_txt.required_if' => 'If Gastrointestinal field is abnormal, please give pertinent details',
            'Genitourinary.required' => 'Please state the Genitourinary abnormalities of the subject',
            'Genitourinary_txt.required_if' => 'If Genitourinary field is abnormal, please give pertinent details',
            'Neurological.required' => 'Please state the Neurological abnormalities of the subject',
            'Neurological_txt.required_if' => 'If Neurological field is abnormal, please give pertinent details',
            'HaematopoieticL.required' => 'Please state the Haematopoietic-Lymphatic abnormalities of the subject',
            'HaematopoieticL_txt.required_if' => 'If Haematopoietic-Lymphatic field is abnormal, please give pertinent details',
            'EndocrineM.required' => 'Please state the Endocrine-Metabolic abnormalities of the subject',
            'EndocrineM_txt.required_if' => 'If Endocrine-Metabolic field is abnormal, please give pertinent details',
            'Dermatological.required' => 'Please state the Dermatological abnormalities of the subject',
            'Dermatological_txt.required_if' => 'If Dermatological field is abnormal, please give pertinent details',
            'Musculoskeletal.required' => 'Please state the Musculoskeletal abnormalities of the subject',
            'Musculoskeletal_txt.required_if' => 'If Musculoskeletal field is abnormal, please give pertinent details',
            'Psychological.required' => 'Please state the Psychological abnormalities of the subject',
            'Psychological_txt.required_if' => 'If Psychological field is abnormal, please give pertinent details',
            'FamilyHistory.required' => 'Please state the Family History abnormalities of the subject',
            'FamilyHistory_txt.required_if' => 'If Family History field is abnormal, please give pertinent details',
            'SurgicalHistory.required' => 'Please state the Surgical History abnormalities of the subject',
            'SurgicalHistory_txt.required_if' => 'If Surgical History field is abnormal, please give pertinent details',
            'PrevHospitalization.required' => 'Please state the Previous Hospitalization abnormalities of the subject',
            'PrevHospitalization_txt.required_if' => 'If Previous Hospitalization field is abnormal, please give pertinent details',
            'Smoker.required' => 'Please state whether the subject are smoker',
            'RAI.required' => 'Please state whether the subject have regular alcohol intake',
            'RMS.required' => 'Please state whether the subject have regular medications or supplements',
            'RegularExercise.required' => 'Please state whether the subject have regular exercise',
            'BloodDonations.required' => 'Please state whether the subject have blood donations',
            'RegularPeriods.required' => 'Please state whether the subject have regular periods',
            'RegularPeriods_No_txt.required_if' => 'If the subject do not have regular periods, please describe the condition',
            'RegularPeriods_Yes_txt.required_if' => 'If the subject have regular periods, please state the last menstrual period',
            'ActiveSexAct.required' => 'Please state whether the subject have active sexual activities',
            'FertilityControl.required' => 'Please state whether the subject are in fertility control',
            'FertilityControl_No_txt.required_if' => 'If the subject do not have fertility control, please select whether counseling is given',
            'FertilityControl_Yes_txt.required_if' => 'If the subject have fertility control, please select which advice and counseling is given',
            'Breastfeeding.required' => 'Please state whether the subject are a breastfeeding female',
            'Conclusion.required' => 'Please select a conclusion for the the subject medical history',
        ];

        $validatedData=$this->validate($request,[
            'dateTaken' => 'required',
            'timeTaken' => 'required',
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
        ], $custom);

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

        $custom = [
            'dateTaken.required' => 'Please input the date',
            'timeTaken.required' => 'Please input the time',
            'NRIC.required' => 'NRIC field cannot be blank',
            'name.required' => 'Name field cannot be blank',
            'Gender.required' => 'Please choose between a gender',
            'Ethnicity.required' => 'Please state the ethnicity',
            'Ethnic_Text.required' => 'If Others has been selected on ethnicity, please state your ethnicity',
            'DoB.required' => 'Date of Birth field cannot be blank',
            'age.required' => 'Age field cannot be blank',
            'maritalstatus.required' => 'Please choose between a maritial status',
            'MRNno.required' => 'MRN Hopsital Registration Number is required',
        ];

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
        ], $custom);

            $mh->save();
       return redirect(route('details.create',$id))->with('Messages','You have added the Medical History detail for the subject!');
    }
    public function updateMH(Request $request,$id)
    {
       DB::table('patient_medical_histories')
            ->where('patient_id',$id)
            ->update([
            'dateTaken'=>$request->dateTaken,
            'timeTaken'=>$request->timeTaken,
        ]);
        $data =$request->except('_token','dateTaken','timeTaken');
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
                    'RegularPeriods'=>$data[$key],
                    $key=>$value.",".$data[$RP_Yes]
                ]);
            }else if($key == "RegularPeriods" and $value == "No")
            {
                $RP_No= $key."_No_txt";
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    'RegularPeriods'=>$data[$key],
                    $key=>$value.",".$data[$RP_No]
                ]);
            }else if($key == "RegularPeriods" and $value =="Not Applicable")
            {
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    'RegularPeriods'=>$data[$key]
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

        // $validatedData=$this->validate($request,[
        //     'Allergy'  => 'required',
        //     'Allergy_txt' => 'required_if:Allergy,==,Abnormal',
        //     'EENT'  => 'required',
        //     'EENT_txt' => 'required_if:EENT,==,Abnormal',
        //     'Respiratory'  => 'required',
        //     'Respiratory_txt' => 'required_if:Respiratory,==,Abnormal',
        //     'Cardiovascular'  => 'required',
        //     'Cardiovascular_txt' => 'required_if:Cardiovascular,==,Abnormal',
        //     'Gastrointestinal'  => 'required',
        //     'Gastrointestinal_txt' => 'required_if:Gastrointestinal,==,Abnormal',
        //     'Genitourinary'  => 'required',
        //     'Genitourinary_txt' => 'required_if:Genitourinary,==,Abnormal',
        //     'Neurological'  => 'required',
        //     'Neurological_txt' => 'required_if:Neurological,==,Abnormal',
        //     'HaematopoieticL'  => 'required',
        //     'HaematopoieticL_txt' => 'required_if:HaematopoieticL,==,Abnormal',
        //     'EndocrineM'  => 'required',
        //     'EndocrineM_txt' => 'required_if:EndocrineM,==,Abnormal',
        //     'Dermatological'  => 'required',
        //     'Dermatological_txt' => 'required_if:Dermatological,==,Abnormal',
        //     'Musculoskeletal'  => 'required',
        //     'Musculoskeletal_txt' => 'required_if:Musculoskeletal,==,Abnormal',
        //     'Psychological'  => 'required',
        //     'Psychological_txt' => 'required_if:Psychological,==,Abnormal',
        //     'FamilyHistory'  => 'required',
        //     'FamilyHistory_txt' => 'required_if:FamilyHistory,==,Abnormal',
        //     'SurgicalHistory'  => 'required',
        //     'SurgicalHistory_txt' => 'required_if:SurgicalHistory,==,Abnormal',
        //     'PrevHospitalization'  => 'required',
        //     'PrevHospitalization_txt' => 'required_if:PrevHospitalization,==,Abnormal',
        //     'Smoker'  => 'required',
        //     'RAI'  => 'required',
        //     'RMS'  => 'required',
        //     'RegularExercise'  => 'required',
        //     'BloodDonations'  => 'required',
        //     'RegularPeriods'  => 'required',
        //     'RegularPeriods_No_txt' => 'required_if:RegularPeriods,==,No',
        //     'RegularPeriods_Yes_txt' => 'required_if:RegularPeriods,==,Yes',
        //     'ActiveSexAct'  => 'required',
        //     'FertilityControl'  => 'required',
        //     'FertilityControl_No_txt' => 'required_if:FertilityControl,==,No',
        //     'FertilityControl_Yes_txt' => 'required_if:FertilityControl,==,Yes',
        //     'Breastfeeding'  => 'required',
        //     'Conclusion' => 'required',
        // ]);

        return redirect(route('details.edit',$id))->with('Messages','You have added the Medical History detail for the subject!');
    }
}
