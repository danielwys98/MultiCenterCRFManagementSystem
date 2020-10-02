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

        $data =$request->except('_token');

        foreach($data as $id=>$value)
        {
            if($value =="Abnormal")
            {
                $abnormal_txt= $id."_txt";
                $mh->$abnormal_txt=$data->$abnormal_txt;
            }else if($value == "Normal")
            {
                $normal_txt = $id;
                $mh->$normal_txt=$data->$normal_txt;
            }
        }
        $mh->save();
       /* $this->checkMH($request);*/
     /*   dd(checkMH($checkdata));*/


/*        $mh = new Patient_MedicalHistory;

        $mh->patient_id=$id;
        $mh->dateTaken=$request->dateTaken;
        $mh->timeTaken=$request->timeTaken;
        $mh->Allergy=$request->Allergy;
        $mh->EENT=$request->EENT;
        $mh->Respiratory=$request->Respiratory;
        $mh->Cardiovascular=$request->Cardiovascular;
        $mh->Gastrointestinal=$request->Gastrointestinal;
        $mh->Genitourinary=$request->Genitourinary;
        $mh->Neurological=$request->Neurological;
        $mh->HaematopoieticL=$request->HaematopoieticL;
        $mh->EndocrineM=$request->EndocrineM;
        $mh->Dermatological=$request->Dermatological;
        $mh->Musculoskeletal=$request->Musculoskeletal;
        $mh->Psychological=$request->Psychological;
        $mh->FamilyHistory=$request->FamilyHistory;
        $mh->SurgicalHistory=$request->SurgicalHistory;
        $mh->PrevHospitalization=$request->PrevHospitalization;
        $mh->Smoker=$request->Smoker;
        $mh->Smoker_txt=$request->Smoker_txt;
        $mh->RAI=$request->RAI;
        $mh->RAI_txt=$request->RAI_txt;
        $mh->RMS=$request->RMS;
        $mh->RMS_txt=$request->RMS_txt;
        $mh->RegularExercise=$request->RegularExercise;
        $mh->RegularExercise_txt=$request->RegularExercise_txt;
        $mh->BloodDonations=$request->BloodDonations;
        $mh->BloodDonations_txt=$request->BloodDonations_txt;
        $mh->RegularPeriods=$request->RegularPeriods;
        $mh->RegularPeriods_txt=$request->RegularPeriods_txt;
        $mh->ActiveSexAct=$request->ActiveSexAct;
        $mh->FertilityControl=$request->FertilityControl;
        $mh->FertilityControlcounseling=$request->FertilityControlCounseling;
        $mh->Breastfeeding=$request->Breastfeeding;
        $mh->Conclusion=$request->Conclusion;

        $mh->save();*/

     /*   return redirect(route('details.create',$id));*/
    }
    public function updateMH(Request $request,$id)
    {
       DB::table('patient_medical_histories')
            ->where('patient_id',$id)
            ->update([
            'dateTaken'=>$request->dateTaken,
            'timeTaken'=>$request->timeTaken,
            'Allergy'=>$request->Allergy,
            'EENT'=>$request->EENT,
            'Respiratory'=>$request->Respiratory,
            'Cardiovascular'=>$request->Cardiovascular,
            'Gastrointestinal'=>$request->Gastrointestinal,
            'Genitourinary'=>$request->Genitourinary,
            'Neurological'=>$request->Neurological,
            'HaematopoieticL'=>$request->HaematopoieticL,
            'EndocrineM'=>$request->EndocrineM,
            'Dermatological'=>$request->Dermatological,
            'Musculoskeletal'=>$request->Musculoskeletal,
            'Psychological'=>$request->Psychological,
            'FamilyHistory'=>$request->FamilyHistory,
            'SurgicalHistory'=>$request->SurgicalHistory,
            'PrevHospitalization'=>$request->PrevHospitalization,
            'Smoker'=>$request->Smoker,
            'Smoker_txt'=>$request->Smoker_txt,
            'RAI'=>$request->RAI,
            'RAI_txt'=>$request->RAI_txt,
            'RMS'=>$request->RMS_txt,
            'RegularExercise'=>$request->RegularExercise,
            'RegularExercise_txt'=>$request->RegularExercise_txt,
            'BloodDonations'=>$request->BloodDonations,
            'BloodDonations_txt'=>$request->BloodDonations_txt,
            'RegularPeriods'=>$request->RegularPeriods,
            'RegularPeriods_txt'=>$request->RegularPeriods_txt,
            'ActiveSexAct'=>$request->ActiveSexAct,
            'FertilityControl'=>$request->FertilityControl,
            'FertilityControlcounseling'=>$request->FertilityControlcounseling,
            'Breastfeeding'=>$request->Breastfeeding,
            'conclusion'=>$request->Conclusion
        ]);

        return redirect(route('details.edit',$id));
    }
    public function checkMH($data)
    {
       /* $test=array($data->all());*/
        $test = $data ->except('_token');
        foreach($test as $id => $value)
        {
            /*echo "key=".$id."value=".$value.'</br>';*/
            if($value=="Abnormal")
            {
                echo "key=".$id.'</br>';
            }else if($value=="Normal"){
                echo $id."="."normal".'</br>';
            }
        }

    }
}
