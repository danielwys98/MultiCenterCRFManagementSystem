<?php

namespace App\Http\Controllers;

use App\Patient;
use App\SP1_AQuestionnaire;
use App\SP1_BAT;
use App\SP1_BMVS;
use App\SP1_Discharge;
use App\SP1_DQuestionnaire;
use App\SP1_IQ36;
use App\SP1_IQ48;
use App\SP1_PDynamicAnalysis;
use App\SP1_PDynamicSampling;
use App\SP1_PKineticSampling;
use App\SP1_UrineTest;
use App\SP1_VitalSigns;
use App\studySpecific;
use Illuminate\Http\Request;
use App\PatientStudySpecific;
use App\StudyPeriod1;
use App\SP1_Admission;
use DB;
use Alert;

class SP1_Admission_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request,$study_id)
    {
        $PID = $request->patient_id;
        $study_period = $request->studyPeriod;
        //find Patient Study Specific table
        $findPSS =PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id',$PID)
            ->where('study_id',$study_id)
            ->first();

        if($findPSS->SP1_ID == NULL)
        {
            $SP1 = new StudyPeriod1;
            $SP1->save();

            //Bind SP1's ID into PSS
            $findPSS->SP1_ID = $SP1->SP1_ID;
            $findPSS->save();

            $this->initaliseForms($PID,$study_id);
        }
        //PSS found and SP1_ID is bind
        if($study_period == 1)
        {
            if($findPSS !=NULL && $findPSS->SP1_ID != NULL){
                //find SP1_ID to access the SP1_Admission
                //find admission table and update it
                $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
                $findSP1_Admission = SP1_Admission::where('SP1_Admission_ID',$findSP1->SP1_Admission)->first();
                //custom messages load for validation
                $custom = [
                    'AdmissionDateTaken.required' => 'Please enter the admission date taken',
                    'AdmissionTimeTaken.required' => 'Please enter the admission time taken',
                    'ConsentDateTaken.required' => 'Please enter the consent date taken',
                    'ConsentTimeTaken.required' => 'Please enter the consent time taken',
                ];

                //validation for required fields
                $validatedData=$this->validate($request,[
                    'AdmissionDateTaken' => 'required',
                    'AdmissionTimeTaken' => 'required',
                    'ConsentDateTaken' => 'required',
                    'ConsentTimeTaken' => 'required',
                ],$custom);


                if($findSP1_Admission->AdmissionDateTaken == NULL){
                    //admission date and time
                    $findSP1_Admission->AdmissionDateTaken = $request->AdmissionDateTaken;
                    $findSP1_Admission->AdmissionTimeTaken = $request->AdmissionTimeTaken;
                    //consent date and time
                    $findSP1_Admission->ConsentDateTaken = $request->ConsentDateTaken;
                    $findSP1_Admission->ConsentTimeTaken = $request->ConsentTimeTaken;

                    $findSP1_Admission->save();
                    return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Admission!');
                }else
                {
                    alert()->error('Error!','You have already insert the data for this subject!');
                    return redirect(route('studySpecific.input',$study_id));
                }


            }else{
                alert()->error('Error!','This subject is not enrolled into any study!');
                return redirect(route('studySpecific.input',$study_id));
            }
        }elseif($study_period == 2)
        {
            echo "hello world!";
        }else
        {
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.input',$study_id));
        }

    }

    public function edit(Request $request,$study_id)
    {
        $PID = $request->patient_id;
        $patient = Patient::where('id', $PID)->first();
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id', $PID)
            ->where('study_id', $study_id)
            ->first();
        if ($findPSS != NULL) {
            $findSP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
            $Admission = SP1_Admission::where('SP1_Admission_ID', $findSP1->SP1_Admission)->first();
            $BMVS = SP1_BMVS::where('SP1_BMVS_ID', $findSP1->SP1_BMVS)->first();
            $BAT = SP1_BAT::where('SP1_BAT_ID', $findSP1->SP1_BAT)->first();
            $AQuestionnaire = SP1_AQuestionnaire::where('SP1_AQuestionnaire_ID', $findSP1->SP1_AQuestionnaire)->first();
            $UrineTest = SP1_UrineTest::where('SP1_UrineTest_ID', $findSP1->SP1_Urine)->first();
            $PKinetic = SP1_PKineticSampling::where('SP1_PKineticSampling_ID', $findSP1->SP1_PKineticSampling)->first();
            $PDynamic = SP1_PDynamicSampling::where('SP1_PDynamicSampling_ID', $findSP1->SP1_PDynamicSampling)->first();
            $PDAnalysis = SP1_PDynamicAnalysis::where('SP1_PDynamicAnalysis_ID', $findSP1->SP1_PDynamiAnalysis)->first();
            $VitalSign = SP1_VitalSigns::where('SP1_VitalSign_ID', $findSP1->SP1_VitalSign)->first();
            $Discharge = SP1_Discharge::where('SP1_Discharge_ID', $findSP1->SP1_Discharge)->first();
            $DQuestionnaire = SP1_DQuestionnaire::where('SP1_DQuestionnaire_ID', $findSP1->SP1_DQuestionnaire)->first();
            $IQ36 = SP1_IQ36::where('SP1_IQ36_ID', $findSP1->SP1_IQ36)->first();
            $IQ48 = SP1_IQ48::where('SP1_IQ48_ID', $findSP1->SP1_IQ48)->first();
            return view('SubjectStudySpecific', compact('Admission',
                'BMVS',
                'BAT',
                'AQuestionnaire',
                'UrineTest',
                'PKinetic',
                'PDynamic',
                'PDAnalysis',
                'VitalSign',
                'Discharge',
                'DQuestionnaire',
                'IQ36',
                'IQ48',
                'study_id',
                'patient'));
        }
    }

    public function update(Request $request,$patient_id,$study_id)
    {
        $flag=false;
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
                                        ->where('patient_id',$patient_id)
                                        ->where('study_id',$study_id)
                                        ->first();
        if($findPSS !=NULL)
        {
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $admission = SP1_Admission::where('SP1_Admission_ID',$findSP1->SP1_Admission)->first();
        }
        $data = $request->except('_token','_method');
        foreach($data as $key=>$value)
        {
            if($value != NULL)
            {
                $admission[$key]=$value;
                $flag=true;
            }
        }
        if($flag)
        {
            $admission->save();
          return redirect(route('studySpecific.admin'))->with('success','You updated the subject study period details!');
        }


    }

    public function initaliseForms($id, $study_id)
    {
        //find patient's PSS
        $findPSS = PatientStudySpecific::where('patient_id',$id)
                                        ->where('study_id',$study_id)
                                        ->first();
        $SP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();


        //get study's subject count number
        $findStudy = studySpecific::where('study_id',$study_id)->first();
        $subjectLimit = $findStudy->patient_Count;

        //find how many subject in the study
        $findPSSCount = PatientStudySpecific::where('study_id',$study_id)->get();


        if(count($findPSSCount) < $subjectLimit){

            //Initialise SP1_Admission
            $Admission = new SP1_Admission;
            $Admission->save();

            //Initialise SP1_BMVS
            $BMVS = new SP1_BMVS;
            $BMVS->save();

            //Initialise SP1_BAT
            $BAT=new SP1_BAT;
            $BAT->save();

            //Initialise SP1_AQuestionnaire
            $AQuestionnaire=new SP1_AQuestionnaire;
            $AQuestionnaire->save();

            //Initialise SP1_UrineTest
            $UrineTest = new SP1_UrineTest;
            $UrineTest->save();

            //Initialise SP1_PKineticSampling
            $PKineticSampling = new SP1_PKineticSampling;
            $PKineticSampling->save();

            //Initialise SP1_PDynamicSampling
            $PDynamicSampling = new SP1_PDynamicSampling();
            $PDynamicSampling->save();

            //Initialise SP1_PDynamicAnalysis
            $PDynamicAnalysis=new SP1_PDynamicAnalysis;
            $PDynamicAnalysis->save();

            //Initialise SP1_VitalSign
            $VitalSign=new SP1_VitalSigns;
            $VitalSign->save();

            //Initialise SP1_Discharge
            $Discharge=new SP1_Discharge;
            $Discharge->save();

            //Initialise SP1_DQuestionnaire
            $DQuestionnaire=new SP1_DQuestionnaire;
            $DQuestionnaire->save();

            //Initialise SP1_IQ36
            $IQ36 = new SP1_IQ36;
            $IQ36->save();

            //Initialise SP1_IQ48
            $IQ48 = new SP1_IQ48;
            $IQ48->save();



            //bind SP1's form into SP1
            $SP1->SP1_Admission=$Admission->SP1_Admission_ID;
            $SP1->SP1_BMVS = $BMVS->SP1_BMVS_ID;
            $SP1->SP1_BATER = $BAT->SP1_BAT_ID;
            $SP1->SP1_AQuestionnaire=$AQuestionnaire->SP1_AQuestionnaire_ID;
            $SP1->SP1_UrineTest = $UrineTest->SP1_UrineTest_ID;
            $SP1->SP1_PKineticSampling = $PKineticSampling->SP1_PKineticSampling_ID;
            $SP1->SP1_PDynamicAnalysis=$PDynamicAnalysis->SP1_PDynamicAnalysis_ID;
            $SP1->SP1_Discharge=$Discharge->SP1_Discharge_ID;
            $SP1->Sp1_DQuestionnaire=$DQuestionnaire->SP1_DQuestionnaire_ID;
            $SP1->SP1_PDynamicSampling=$PDynamicSampling->SP1_PDynamicSampling_ID;
            $SP1->SP1_VitalSign=$VitalSign->SP1_VitalSign_ID;
            $SP1->SP1_IQ36 = $IQ36->SP1_IQ36_ID;
            $SP1->SP1_IQ48 = $IQ48->SP1_IQ48_ID;

            $SP1->save();

            //if all thing is saved and return true.
            return true;
        }else
        {
            //if reach limited it will return false
            return false;
        }

    }
}
