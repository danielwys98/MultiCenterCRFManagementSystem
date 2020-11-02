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
use App\SP2_Admission;
use App\SP3_Admission;
use App\SP4_Admission;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
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
        //assign patient id from request
        $PID = $request->patient_id;
        //indicate which study period users saving
        $study_period = $request->studyPeriod;



        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id',$PID)
                                        ->where('study_id',$study_id)
                                        ->first();
        //binding SPs' id first
            $this->bindingSP($findPSS,$PID,$study_id);

        //PSS found and SP1_ID is bind
        if($study_period == 1)
        {
            $this->initaliseForms($findPSS,$PID,$study_id);
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
                    return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 1 details for Admission!');
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
            $this->initaliseFormsSP2($findPSS,$PID,$study_id);
            $this->storeSP2($findPSS,$request);
            return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 2 details for Admission!');

        }elseif($study_period == 3)
        {
            $this->initaliseFormsSP3($findPSS,$PID,$study_id);
            $this->storeSP3($findPSS,$request);
            return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 3 details for Admission!');
        }elseif($study_period==4)
        {
            $this->initaliseFormsSP4($findPSS,$PID,$study_id);
            $this->storeSP4($findPSS,$request);
            return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period 4 details for Admission!');
        }else
        {
            alert()->error('Error!','You did not select the study period!');
            return redirect(route('studySpecific.input',$study_id));
        }

    }

    public function edit(Request $request,$study_id)
    {
        $PID = $request->patient_id;
        $patient = Patient::where('id',$PID)->first();
       $findPSS = PatientStudySpecific::with('StudyPeriod1')
                                       ->where('patient_id',$PID)
                                       ->where('study_id',$study_id)
                                        ->first();
       if($findPSS !=NULL)
       {
           $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
           $admission = SP1_Admission::where('SP1_Admission_ID',$findSP1->SP1_Admission)->first();
           //do like pre-screening, call all the model here and bring back to the edit forms.
           //$BAT = SP1_BAT::where('bla');

           return view('SubjectStudySpecific',compact('admission','study_id','patient'));
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

    public function bindingSP($pss,$id,$study_id)
    {
        //assign $id(subject's id) into $PID
        $PID = $id;
        $study = studySpecific::find($study_id);

        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::where('patient_id',$PID)
            ->where('study_id',$study_id)
            ->get();

        //find the amount of period of this study
        $studyPeriodCount = $study->studyPeriod_Count;
        $period = 0;
        $studyPeriod[0]='---';
        //put periods into an array to compare.
        for($i = 0; $i < $studyPeriodCount; $i++)
        {
            $period++;
            $studyPeriod[] =$period;
        }

        //check which study period the user is indicating and how many study period there are
            foreach($studyPeriod as $sp)
            {
                if($sp == 1)
                {
                    if($pss->SP1_ID == NULL)
                    {
                        $SP1 = new StudyPeriod1;
                        $SP1->save();

                        //Bind SP1's ID into PSS
                        $pss->SP1_ID = $SP1->SP1_ID;
                        $pss->save();
                        return true;
                    }
                }elseif($sp==2)
                {
                    if($pss->SP2_ID == NULL)
                    {
                        $SP2 = new StudyPeriod2;
                        $SP2->save();

                        //Bind SP2's ID into PSS
                        $pss->SP2_ID = $SP2->SP2_ID;
                        $pss->save();
                        return true;
                    }
                }elseif ($sp==3)
                {
                    if($pss->SP3_ID == NULL)
                    {
                        $SP3 = new StudyPeriod3;
                        $SP3->save();

                        //Bind SP2's ID into PSS
                        $pss->SP3_ID = $SP3->SP3_ID;
                        $pss->save();
                        return true;
                    }
                }elseif ($sp==4) {
                    if($pss->SP4_ID == NULL)
                    {
                        $SP4 = new StudyPeriod4;
                        $SP4->save();

                        //Bind SP2's ID into PSS
                        $pss->SP4_ID = $SP4->SP4_ID;
                        $pss->save();
                        return true;
                    }
                }
            }
    }

    public function initaliseForms($pss,$id, $study_id)
    {

        //locate the PSS's SP1 ID
        $SP1 = StudyPeriod1::where('SP1_ID',$pss->SP1_ID)->first();

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
            return true;

    }

    public function initaliseFormsSP2 ($pss,$id,$study_id)
    {

        $SP2 = StudyPeriod2::where('SP2_ID',$pss->SP2_ID)->first();


            //Initialise SP1_Admission
            $Admission = new SP2_Admission;
            $Admission->save();

            /*//Initialise SP1_BMVS
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
            $IQ48->save();*/

            //bind SP1's form into SP1
            $SP2->SP2_Admission=$Admission->SP2_Admission_ID;
            /*$SP1->SP1_BMVS = $BMVS->SP1_BMVS_ID;
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
            $SP1->SP1_IQ48 = $IQ48->SP1_IQ48_ID;*/

            $SP2->save();

            //if all thing is saved and return true.
            return true;
    }

    public function initaliseFormsSP3 ($pss,$id,$study_id)
    {

        $SP3 = StudyPeriod3::where('SP3_ID',$pss->SP3_ID)->first();


        //Initialise SP1_Admission
        $Admission = new SP3_Admission;
        $Admission->save();

        /*//Initialise SP1_BMVS
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
        $IQ48->save();*/

        //bind SP1's form into SP1
        $SP3->SP3_Admission=$Admission->SP3_Admission_ID;
        /*$SP1->SP1_BMVS = $BMVS->SP1_BMVS_ID;
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
        $SP1->SP1_IQ48 = $IQ48->SP1_IQ48_ID;*/

        $SP3->save();

        //if all thing is saved and return true.
        return true;
    }

    public function initaliseFormsSP4 ($pss,$id,$study_id)
    {

        $SP4 = StudyPeriod4::where('SP4_ID',$pss->SP4_ID)->first();


        //Initialise SP4_Admission
        $Admission = new SP4_Admission;
        $Admission->save();

        /*//Initialise SP1_BMVS
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
        $IQ48->save();*/

        //bind SP1's form into SP1
        $SP4->SP4_Admission=$Admission->SP4_Admission_ID;
        /*$SP1->SP1_BMVS = $BMVS->SP1_BMVS_ID;
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
        $SP1->SP1_IQ48 = $IQ48->SP1_IQ48_ID;*/

        $SP4->save();

        //if all thing is saved and return true.
        return true;
    }


    public function storeSP2($PSS,$request)
    {
        if($PSS !=NULL && $PSS->SP2_ID != NULL){
            //find admission table and update it
            $findSP2 = StudyPeriod2::where('SP2_ID',$PSS->SP2_ID)->first();
            $findSP2_Admission = SP2_Admission::where('SP2_Admission_ID',$findSP2->SP2_Admission)->first();
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


            if($findSP2_Admission->AdmissionDateTaken == NULL) {
                //admission date and time
                $findSP2_Admission->AdmissionDateTaken = $request->AdmissionDateTaken;
                $findSP2_Admission->AdmissionTimeTaken = $request->AdmissionTimeTaken;
                //consent date and time
                $findSP2_Admission->ConsentDateTaken = $request->ConsentDateTaken;
                $findSP2_Admission->ConsentTimeTaken = $request->ConsentTimeTaken;

                $findSP2_Admission->save();
                return true;
          }
        }
    }


    public function storeSP3($PSS,$request)
    {
        if($PSS !=NULL && $PSS->SP3_ID != NULL){
            //find admission table and update it
            $findSP3 = StudyPeriod3::where('SP3_ID',$PSS->SP3_ID)->first();
            $findSP3_Admission = SP3_Admission::where('SP3_Admission_ID',$findSP3->SP3_Admission)->first();
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


            if($findSP3_Admission->AdmissionDateTaken == NULL) {
                //admission date and time
                $findSP3_Admission->AdmissionDateTaken = $request->AdmissionDateTaken;
                $findSP3_Admission->AdmissionTimeTaken = $request->AdmissionTimeTaken;
                //consent date and time
                $findSP3_Admission->ConsentDateTaken = $request->ConsentDateTaken;
                $findSP3_Admission->ConsentTimeTaken = $request->ConsentTimeTaken;

                $findSP3_Admission->save();
                return true;
            }
        }
    }

    public function storeSP4($PSS,$request)
    {
        if($PSS !=NULL && $PSS->SP4_ID != NULL){
            //find admission table and update it
            $findSP4 = StudyPeriod4::where('SP4_ID',$PSS->SP4_ID)->first();
            $findSP4_Admission = SP4_Admission::where('SP4_Admission_ID',$findSP4->SP4_Admission)->first();
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


            if($findSP4_Admission->AdmissionDateTaken == NULL) {
                //admission date and time
                $findSP4_Admission->AdmissionDateTaken = $request->AdmissionDateTaken;
                $findSP4_Admission->AdmissionTimeTaken = $request->AdmissionTimeTaken;
                //consent date and time
                $findSP4_Admission->ConsentDateTaken = $request->ConsentDateTaken;
                $findSP4_Admission->ConsentTimeTaken = $request->ConsentTimeTaken;

                $findSP4_Admission->save();
                return true;
            }else
            {
                return false;
            }
        }
    }
}
