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
      /*dd($request);*/
     $mh = new Patient_MedicalHistory();
        $data =$request->except('_token','dateTaken','timeTaken');

        $mh->patient_id = $id;
        $mh->dateTaken=$request->dateTaken;
        $mh->timeTaken=$request->timeTaken;

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
                $mh->$key=$data[$RP_Yes];

            }else if($key == "RegularPeriods" and $value == "No")
            {
                $RP_No= $key."_No_txt";
                $mh->$key=$data[$RP_No];
            }else if($key == "RegularPeriods" and $value =="Not Applicable")
            {
                $mh->$key=$data[$key];
            }else if($key =="FertilityControl" and $value =="Yes")
            {
                $FC_Yes ="FertilityControl_Yes_txt";
                $mh->$key=$data[$FC_Yes];
            }else if($key =="FertilityControl" and $value=="No")
            {
                $FC_No="FertilityControl_No_txt";
                $mh->$key=$data[$FC_No];
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
                $yes_txt= $key."_txt";
                $mh->$key=$data[$yes_txt];
            }else if($value == "No")
            {
                $no_txt = $key;
                $mh->$key=$data[$no_txt];
            }
        }

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

}
