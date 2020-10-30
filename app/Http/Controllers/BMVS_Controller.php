<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Patient_BodyAndVitalSigns;
use App\studySpecific;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class BMVS_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create($id)
    {
        $patient = Patient::find($id);
        $studies = studySpecific::all()->pluck('study_name','study_id');
        return view('preScreeningForms.create',compact('patient'))->with('studies',$studies);
    }
    public function store(Request $request,$id)
    {

        $bmvs = new Patient_BodyAndVitalSigns;

        $custom = [
            'dateTaken.required' => 'Please enter the date taken',
            'timeTaken.required' => 'Please enter the time taken',
            'weight.required' => 'Please enter the weight',
            'height.required' => 'Please enter the height',
            'temperature.required' => 'Please enter the temperature',
            'Supine_ReadingTime.required' => 'Please enter the Supine Reading Time',
            'Supine_BP.required' => 'Please enter the Supine Blood Pressure',
            'Supine_HR.required' => 'Please enter the Supine Heart Rate',
            'Supine_RespiratoryRate.required' => 'Please enter the Supine Respiratory Rate',
            'Sitting_ReadingTime.required' => 'Please enter the Sitting Reading Time',
            'Sitting_BP.required' => 'Please enter the Sitting Blood Pressure',
            'Sitting_HR.required' => 'Please enter the Sitting Heart Rate',
            'Sitting_RespiratoryRate.required' => 'Please enter the Sitting Respiratory Rate',
            'Standing_ReadingTime.required' => 'Please enter the Standing Reading Time',
            'Standing_BP.required' => 'Please enter the Standing Blood Pressure',
            'Standing_HR.required' => 'Please enter the Standing Heart Rate',
            'Standing_RespiratoryRate.required' => 'Please enter the Standing Respiratory Rate',
            'Initial.required' => 'Initial of the physician’s is required',
        ];

        $validatedData=$this->validate($request,[
            'dateTaken' => 'required',
            'timeTaken' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'temperature' => 'required',
            'Supine_ReadingTime' => 'required',
            'Supine_BP' => 'required',
            'Supine_HR' => 'required',
            'Supine_RespiratoryRate' => 'required',
            'Sitting_ReadingTime' => 'required',
            'Sitting_BP' => 'required',
            'Sitting_HR' => 'required',
            'Sitting_RespiratoryRate' => 'required',
            'Standing_ReadingTime' => 'required',
            'Standing_BP' => 'required',
            'Standing_HR' => 'required',
            'Standing_RespiratoryRate' => 'required',
            'Initial' => 'required',
        ], $custom);

        $bmvs->patient_id=$id;
        $bmvs->dateTaken=$request->dateTaken;
        $bmvs->timeTaken=$request->timeTaken;

        $bmvs->weight=$request->weight;
        $bmvs->height=$request->height;

        if($request->height>0 && $request->weight>0) {

            $bmvs->bmi = $this->calculateBMI($request->height,$request->weight);
        }else{
            $bmvs->bmi=0;
        }
        $bmvs->temperature=$request->temperature;
        $bmvs->Supine_ReadingTime=$request->Supine_ReadingTime;
        $bmvs->Supine_BP=$request->Supine_BP;
        $bmvs->Supine_HR=$request->Supine_HR;
        $bmvs->Supine_RespiratoryRate=$request->Supine_RespiratoryRate;
        $bmvs->Sitting_ReadingTime=$request->Sitting_ReadingTime;
        $bmvs->Sitting_BP=$request->Sitting_BP;
        $bmvs->Sitting_HR=$request->Sitting_HR;
        $bmvs->Sitting_RespiratoryRate=$request->Sitting_RespiratoryRate;
        $bmvs->Standing_ReadingTime=$request->Standing_ReadingTime;
        $bmvs->Standing_BP=$request->Standing_BP;
        $bmvs->Standing_HR=$request->Standing_HR;
        $bmvs->Standing_RespiratoryRate=$request->Standing_RespiratoryRate;
        $bmvs->Initial=$request->Initial;

        $bmvs->save();

        return redirect(route('preScreeningForms.create',$id))->with('success','You have added the body measurement and vital signs detail for the subject!');
    }

    public function show($id)
    {
        $patient = Patient::find($id);
        $BodyAndVitals =$patient->bodyandvitalsigns;
        return view('preScreeningForms.show',compact('BodyAndVitals'))->with('patient',$patient);
    }

    public function edit($id)
    {

        /*$patients = Patient::with('bodyandvitalsigns')->get();
        foreach ($patients as $patient) {
            //echo $patient->name;
        }*/
        /*,'BreathAlcoholTestAndElectrocardiogram','MedicalHistory','PhysicalExam','UrineTest','LabTest','SerologyTest','InclusionExclusion','Conclu'*/

        //This can be used for future reference --> this get all patients that has BMVS form already and store their id into an array
        /*$findBMVS=Patient_BodyAndVitalSigns::with('patient')->get();
        foreach ($findBMVS as $findBMV) {
            echo $findBMV->patient_id;
            $BID[]=$findBMV->patient_id;
        }*/


        $patient = Patient::find($id);

        $studies = studySpecific::all()->pluck('study_name','study_id');
        $BodyAndVitals =$patient->bodyandvitalsigns;
        $BATER =$patient->BreathAlcoholTestAndElectrocardiogram;
        $Medical=$patient->MedicalHistory;
        $Physical=$patient->PhysicalExam;
        $UrineTest=$patient->UrineTest;
        $LabTest=$patient->LabTest;
        $Serology=$patient->SerologyTest;
        $InclusionExclusion=$patient->InclusionExclusion;
        $Conclu=$patient->Conclu;

        $Not_Complete=false;

        $arrFormsName = array('Body Measurements and Vital Signs',
            'Breath Alcohol Test and Electrocardiogram',
            'Medical History',
            'Physical Examination',
            'Urine Test',
            'Laboratory Test',
            'Serology Test',
            'Inclusion and Exclusion Criteria',
            'Conclusion');
        $arrForms= array($BodyAndVitals,
            $BATER,
            $Medical,
            $Physical,
            $UrineTest,
            $LabTest,
            $Serology,
            $InclusionExclusion,
            $Conclu);
        $newArr=array_combine($arrFormsName,$arrForms);

        foreach($newArr as $key=>$value)
        {
            if($value == NULL){
                $errors[]=$key;
                $Not_Complete=true;
            }else{
                $Not_Complete=false;
            }
        }
        if($Not_Complete){
            return redirect(route('preScreening.admin', $id))->withErrors($errors);
        }else{
            return view('preScreeningForms.edit', compact(
                'BodyAndVitals',
                'BATER',
                'Medical',
                'Physical',
                'UrineTest',
                'LabTest',
                'Serology',
                'InclusionExclusion',
                'Conclu',
                'studies'
            ))->with('patient', $patient);
        }
        //This is to do checking for ensure all forms are available to allow users to enter edit page
        /*if($BodyAndVitals!=NULL && $BATER!=NULL && $Medical!=NULL &&){
            echo "This works";
        }else{
            echo"This does not work";
        }*/
    }

    public function update(Request $request,$id)
    {
        //Calculation of the BMI
        if($request->height>0 && $request->weight>0) {
            $bmi = $this->calculateBMI($request->height,$request->weight);
        }else{
            $bmi=0;
        }
       DB::table('patient_body_and_vital_signs')
                        ->where('patient_id',$id)
                        ->update([
                                'dateTaken'=>$request->dateTaken,
                                'timeTaken'=>$request->timeTaken,
                                'weight'=>$request->weight,
                                'height'=>$request->height,
                                'bmi'=>$bmi,
                                'temperature'=>$request->temperature,
                                'Supine_ReadingTime'=>$request->Supine_ReadingTime,
                                'Supine_BP'=>$request->Supine_BP,
                                'Supine_HR'=>$request->Supine_HR,
                                'Supine_RespiratoryRate'=>$request->Supine_RespiratoryRate,
                                'Sitting_ReadingTime'=>$request->Sitting_ReadingTime,
                                'Sitting_BP'=>$request->Sitting_BP,
                                'Sitting_HR'=>$request->Sitting_HR,
                                'Sitting_RespiratoryRate'=>$request->Sitting_RespiratoryRate,
                                'Standing_ReadingTime'=>$request->Standing_ReadingTime,
                                'Standing_BP'=>$request->Standing_BP,
                                'Standing_HR'=>$request->Standing_HR,
                                'Standing_RespiratoryRate'=>$request->Standing_RespiratoryRate,
                                'Initial'=>$request->Initial
                        ]);

        return redirect(route('preScreeningForms.edit',$id))->with('success','You have updated the body measurement and vital signs detail for the subject!');
    }

    public function testing($id)
    {
        $patient=Patient::find($id);

        return false;
    }

    public function calculateBMI($height,$weight){
        $m_height=$height/100;
        $actual_height=$m_height*$m_height;
        $bmi=$weight/$actual_height;
        $final_bmi=number_format($bmi,1);
        return $final_bmi;
    }
}
