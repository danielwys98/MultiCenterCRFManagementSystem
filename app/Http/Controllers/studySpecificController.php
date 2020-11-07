<?php

namespace App\Http\Controllers;

use App\SP1_AQuestionnaire;
use App\SP1_BAT;
use App\SP1_BMVS;
use App\SP1_Discharge;
use App\SP1_DQuestionnaire;
use App\SP1_IQ36;
use App\SP1_IQ48;
use App\SP1_IQ72;
use App\SP1_IQ96;
use App\SP1_PDynamicAnalysis;
use App\SP1_PDynamicSampling;
use App\SP1_PKineticSampling;
use App\SP1_UrineTest;
use App\SP1_VitalSigns;
use App\SP2_Admission;
use App\SP2_AQuestionnaire;
use App\SP2_BAT;
use App\SP2_BMVS;
use App\SP2_Discharge;
use App\SP2_DQuestionnaire;
use App\SP2_IQ36;
use App\SP2_IQ48;
use App\SP2_IQ72;
use App\SP2_IQ96;
use App\SP2_PDynamicAnalysis;
use App\SP2_PDynamicSampling;
use App\SP2_PKineticSampling;
use App\SP2_UrineTest;
use App\SP2_VitalSigns;
use App\SP3_Admission;
use App\SP3_AQuestionnaire;
use App\SP3_BAT;
use App\SP3_BMVS;
use App\SP3_Discharge;
use App\SP3_DQuestionnaire;
use App\SP3_IQ36;
use App\SP3_IQ48;
use App\SP3_IQ72;
use App\SP3_IQ96;
use App\SP3_PDynamicAnalysis;
use App\SP3_PDynamicSampling;
use App\SP3_PKineticSampling;
use App\SP3_UrineTest;
use App\SP3_VitalSigns;
use App\SP4_Admission;
use App\SP4_AQuestionnaire;
use App\SP4_BAT;
use App\SP4_BMVS;
use App\SP4_Discharge;
use App\SP4_DQuestionnaire;
use App\SP4_IQ36;
use App\SP4_IQ48;
use App\SP4_IQ72;
use App\SP4_IQ96;
use App\SP4_PDynamicAnalysis;
use App\SP4_PDynamicSampling;
use App\SP4_PKineticSampling;
use App\SP4_UrineTest;
use App\SP4_VitalSigns;
use App\StudyPeriod2;
use App\StudyPeriod3;
use App\StudyPeriod4;
use Illuminate\Support\Facades\Schema;
use PDF;
use Illuminate\Http\Request;
use App\Patient;
use App\studySpecific;
use App\Patient_Conclusion_Signature;
use App\PatientStudySpecific;
use App\StudyPeriod1;
use App\SP1_Admission;
use DB;
use Psr\Log\NullLogger;

class studySpecificController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkAdmin', ['except' => 'studies']);
    }

    //This return to the study-specific database page
    public function index()
    {
        $studies = studySpecific::all();
        return view('studySpecific.index', compact('studies'));
    }

    //This return to the studySpecific forms
    public function studies($study_id)
    {

        $study = studySpecific::find($study_id);
        $findPSS = PatientStudySpecific::where('study_id',$study_id)->get();
        //find the amount of period of this study
        $studyPeriodLimit = $study->studyPeriod_Count;
        $period = 0;
        $studyPeriod[0] = '---';

        for ($i = 0; $i < $studyPeriodLimit; $i++) {
            $period++;
            $studyPeriod[] = $period;
        }

        $findPSS = PatientStudySpecific::with(['Patient'])->where('study_id', $study_id)->get();

        if (count($findPSS) > 0) {
            foreach ($findPSS as $p) {
                $PatientList[] = $p->patient_id;
            }
            $oriPatientName = Patient::whereIn('id', $PatientList)->get()->pluck('name', 'id');
            //increasing 0 until count of Subjects in the study
            $subject_count = 1;
            foreach ($oriPatientName as $id => $name) {
                /*echo $id.'='.$name.'<br/>';*/
                $PatientID[] = $id;
                $PatientName[] = str_replace($name, $subject_count++, $name);
                $newName = array_combine($PatientID, $PatientName);
            }
            return view('studySpecific', compact('oriPatientName', 'newName', 'study', 'studyPeriod'));
        } else {
            alert()->error('Error!', 'No subject enrolled into this study!');
            return back();
        }

    }

    public function search(Request $request){

        if($request->search_study!=NULL){
            $studies=studySpecific::where('study_name',"LIKE","%".$request->search_study."%")->get();
            return view('studySpecific.index',compact('studies'));
        }else{
            $studies=studySpecific::all();
            return view('studySpecific.index',compact('studies'));
        }
    }


    //return to create a study's page
    public function create()
    {
        return view('studySpecific.create');
    }


    //store studies' details
    public function store(Request $request)
    {
        $custom = [
            'study_name.required' => 'Please enter the name of the study',
            'startDate.required' => 'Please select the start date for the study',
            'endDate.required' => 'Please select the end date for the study',
            'patient_Count.required' => 'Please enter the amount of subject can be enroll in the study',
            'studyPeriod_Count.required' => 'Please enter amount of study period needed to be done in this study',
            'MRNno.required' => 'Please enter the MRN number',
        ];
        //validation for required fields
        $validatedData = $this->validate($request, [
            'study_name' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'patient_Count' => 'required',
            'studyPeriod_Count' => 'required|numeric|min:1|max:4',
            'MRNno' => 'required',
        ], $custom);

        $study = new studySpecific();
        $study->study_name = $request->study_name;
        $study->startDate = $request->startDate;
        $study->endDate = $request->endDate;
        $study->patient_Count = $request->patient_Count;
        $study->studyPeriod_Count = $request->studyPeriod_Count;
        $study->MRNno = $request->MRNno;
        $study->protocolNO = $request->protocolNO;
        $study->save();
        return redirect(route('studySpecific.index'))->with('success', 'You have successfully added the study into the system!');
    }


    //Show specific studies details
    public function edit($study_id)
    {
        //find the details of the studies.
        $study = studySpecific::find($study_id);
        //find the amount of period of this study
        $studyPeriodLimit = $study->studyPeriod_Count;
        $period = 0;
        $studyPeriod[0] = '---';

        for ($i = 0; $i < $studyPeriodLimit; $i++) {
            $period++;
            $studyPeriod[] = $period;
        }

        //check if the studies is found
        if ($study != NULL) {
            //find the subject who enrolled into this studies
            $findPatient = PatientStudySpecific::with(['Patient'])->where('study_id', $study_id)->get();

            if (count($findPatient) > 0) {
                foreach ($findPatient as $p) {
                    $PatientList[] = $p->patient_id;
                }
                $oriPatientName = Patient::whereIn('id', $PatientList)->get()->pluck('name', 'id');
            } else {
                $oriPatientName = NULL;
            }
            return view('studySpecific.edit', compact('study', 'oriPatientName', 'studyPeriod'));

        } else {
            alert()->error('Error!', 'Study is not found in the database!');
            //return back to previous route.
            return back();
        }

    }


    //Edit the specific studies details and store it
    public function update(Request $request, $id)
    {

        $validatedData = $this->validate($request, [
            'studyPeriod_Count' => 'required|numeric|min:1|max:4',
        ]);

        $study = studySpecific::find($id);
        $data = $request->except('_token', '_method');
        foreach ($data as $key => $value) {
            if ($value != NULL) {
                DB::table('study_specifics')
                    ->where('study_id', $id)
                    ->update([
                        $key => $data[$key]
                    ]);
            }
        }
        return redirect(route('studySpecific.edit', $study->study_id))->with('success', 'You updated the study details!');
    }


    //delete specific studies
    public function destroy($id)
    {
        $study = studySpecific::find($id);

        $study->delete();

        return redirect(route('studySpecific.index'))->with('ErrorMessages', 'You removed the study from the system!');
    }

    public function PSSRemove(Request $request,$study_id)
    {
        $PID = $request->patient_id;
        $findPSS = PatientStudySpecific::where('patient_id',$PID)
                                        ->where('study_id',$study_id)
                                        ->first();
        if($findPSS->SP1_ID == NULL)
        {
            $findPSS->study_id=0;
            $findPSS->patient_id=$PID;
            $findPSS->save();
            return redirect(route('studySpecific.index'))->with('success', 'You have successfully remove the subject from the study!');
        }else
        {
            $findPSS->SP1_ID = NULL;
            $findPSS->SP2_ID = NULL;
            $findPSS->SP3_ID = NULL;
            $findPSS->SP4_ID = NULL;
            $findPSS->study_id=0;
            $findPSS->patient_id=$PID;
            $findPSS->save();
            return redirect(route('studySpecific.index'))->with('success', 'You have successfully remove the subject from the study!');
        }

    }

    //Will be delete. just for testing purpose.
    public function testing()
    {
        return view('studySpecific.FollowUpQuestionnaire');
    }

    public function testPDF($PID,$study_id,$study_period)
    {
        $patient = Patient::where('id', $PID)->first();
        $study = studySpecific::where('study_id', $study_id)->first();
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id', $PID)
            ->where('study_id', $study_id)
            ->first();

        if($study_period==1)
        {
            $findSP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
            if ($findPSS != NULL) {
                if($findSP1 !=NULL)
                {
                $Admission = SP1_Admission::where('SP1_Admission_ID', $findSP1->SP1_Admission)->first();
                $BMVS = SP1_BMVS::where('SP1_BMVS_ID', $findSP1->SP1_BMVS)->first();
                $BAT = SP1_BAT::where('SP1_BAT_ID', $findSP1->SP1_BATER)->first();
                $AQuestionnaire = SP1_AQuestionnaire::where('SP1_AQuestionnaire_ID', $findSP1->SP1_AQuestionnaire)->first();
                $UrineTest = SP1_UrineTest::where('SP1_UrineTest_ID', $findSP1->SP1_UrineTest)->first();
                $PKinetic = SP1_PKineticSampling::where('SP1_PKineticSampling_ID', $findSP1->SP1_PKineticSampling)->first();
                $PDynamic = SP1_PDynamicSampling::where('SP1_PDynamicSampling_ID', $findSP1->SP1_PDynamicSampling)->first();
                $PDAnalysis = SP1_PDynamicAnalysis::where('SP1_PDynamicAnalysis_ID', $findSP1->SP1_PDynamicAnalysis)->first();
                $VitalSign = SP1_VitalSigns::where('SP1_VitalSign_ID', $findSP1->SP1_VitalSign)->first();
                $Discharge = SP1_Discharge::where('SP1_Discharge_ID', $findSP1->SP1_Discharge)->first();
                $DQuestionnaire = SP1_DQuestionnaire::where('SP1_DQuestionnaire_ID', $findSP1->SP1_DQuestionnaire)->first();
                $IQ36 = SP1_IQ36::where('SP1_IQ36_ID', $findSP1->SP1_IQ36)->first();
                $IQ48 = SP1_IQ48::where('SP1_IQ48_ID', $findSP1->SP1_IQ48)->first();
                $IQ72 = SP1_IQ72::where('SP1_IQ72_ID', $findSP1->SP1_IQ72)->first();
                $IQ96 = SP1_IQ96::where('SP1_IQ96_ID', $findSP1->SP1_IQ96)->first();


                $pdf = PDF::loadView('test', compact('Admission',
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
                    'IQ72',
                    'IQ96',
                    'study',
                    'patient'))
                    ->setPaper('A4', 'landscape');

                return $pdf->download($patient->name.$study->study_name.'study period1.pdf');
            }else
                {
                    alert()->error('Error!','The admission form is not created for the subject!');
                    return redirect(route('studySpecific.admin',$study_id));
                }
            }
        }elseif ($study_period==2)
        {
            $findSP2 = StudyPeriod2::where('SP2_ID', $findPSS->SP2_ID)->first();
            if ($findPSS != NULL) {
                if($findSP2 !=NULL)
                {
                $Admission = SP2_Admission::where('SP2_Admission_ID', $findSP2->SP2_Admission)->first();
                $BMVS = SP2_BMVS::where('SP2_BMVS_ID', $findSP2->SP2_BMVS)->first();
                $BAT = SP2_BAT::where('SP2_BAT_ID', $findSP2->SP2_BATER)->first();
                $AQuestionnaire = SP2_AQuestionnaire::where('SP2_AQuestionnaire_ID', $findSP2->SP2_AQuestionnaire)->first();
                $UrineTest = SP2_UrineTest::where('SP2_UrineTest_ID', $findSP2->SP2_UrineTest)->first();
                $PKinetic = SP2_PKineticSampling::where('SP2_PKineticSampling_ID', $findSP2->SP2_PKineticSampling)->first();
                $PDynamic = SP2_PDynamicSampling::where('SP2_PDynamicSampling_ID', $findSP2->SP2_PDynamicSampling)->first();
                $PDAnalysis = SP2_PDynamicAnalysis::where('SP2_PDynamicAnalysis_ID', $findSP2->SP2_PDynamicAnalysis)->first();
                $VitalSign = SP2_VitalSigns::where('SP2_VitalSign_ID', $findSP2->SP2_VitalSign)->first();
                $Discharge = SP2_Discharge::where('SP2_Discharge_ID', $findSP2->SP2_Discharge)->first();
                $DQuestionnaire = SP2_DQuestionnaire::where('SP2_DQuestionnaire_ID', $findSP2->SP2_DQuestionnaire)->first();
                $IQ36 = SP2_IQ36::where('SP2_IQ36_ID', $findSP2->SP2_IQ36)->first();
                $IQ48 = SP2_IQ48::where('SP2_IQ48_ID', $findSP2->SP2_IQ48)->first();
                $IQ72 = SP2_IQ72::where('SP2_IQ72_ID', $findSP2->SP2_IQ72)->first();
                $IQ96 = SP2_IQ96::where('SP2_IQ96_ID', $findSP2->SP2_IQ96)->first();


                $pdf = PDF::loadView('test', compact('Admission',
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
                    'IQ72',
                    'IQ96',
                    'study',
                    'patient'))
                    ->setPaper('A4', 'landscape');

                    return $pdf->download($patient->name.$study->study_name.'study period2.pdf');
                }else
                {
                    alert()->error('Error!','The admission form is not created for the subject!');
                    return redirect(route('studySpecific.admin',$study_id));
                }
        }
      }elseif ($study_period == 3) {
            $findSP3 = StudyPeriod3::where('SP3_ID', $findPSS->SP3_ID)->first();
            if ($findPSS != NULL) {
                if($findSP3 !=NULL)
                {
                $Admission = SP3_Admission::where('SP3_Admission_ID', $findSP3->SP3_Admission)->first();
                $BMVS = SP3_BMVS::where('SP3_BMVS_ID', $findSP3->SP3_BMVS)->first();
                $BAT = SP3_BAT::where('SP3_BAT_ID', $findSP3->SP3_BATER)->first();
                $AQuestionnaire = SP3_AQuestionnaire::where('SP3_AQuestionnaire_ID', $findSP3->SP3_AQuestionnaire)->first();
                $UrineTest = SP3_UrineTest::where('SP3_UrineTest_ID', $findSP3->SP3_UrineTest)->first();
                $PKinetic = SP3_PKineticSampling::where('SP3_PKineticSampling_ID', $findSP3->SP3_PKineticSampling)->first();
                $PDynamic = SP3_PDynamicSampling::where('SP3_PDynamicSampling_ID', $findSP3->SP3_PDynamicSampling)->first();
                $PDAnalysis = SP3_PDynamicAnalysis::where('SP3_PDynamicAnalysis_ID', $findSP3->SP3_PDynamicAnalysis)->first();
                $VitalSign = SP3_VitalSigns::where('SP3_VitalSign_ID', $findSP3->SP3_VitalSign)->first();
                $Discharge = SP3_Discharge::where('SP3_Discharge_ID', $findSP3->SP3_Discharge)->first();
                $DQuestionnaire = SP3_DQuestionnaire::where('SP3_DQuestionnaire_ID', $findSP3->SP3_DQuestionnaire)->first();
                $IQ36 = SP3_IQ36::where('SP3_IQ36_ID', $findSP3->SP3_IQ36)->first();
                $IQ48 = SP3_IQ48::where('SP3_IQ48_ID', $findSP3->SP3_IQ48)->first();
                $IQ72 = SP3_IQ72::where('SP3_IQ72_ID', $findSP3->SP3_IQ72)->first();
                $IQ96 = SP3_IQ96::where('SP3_IQ96_ID', $findSP3->SP3_IQ96)->first();


                $pdf = PDF::loadView('test', compact('Admission',
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
                    'IQ72',
                    'IQ96',
                    'study',
                    'patient'))
                    ->setPaper('A4', 'landscape');

                    return $pdf->download($patient->name.$study->study_name.'study period3.pdf');
                }else
                {
                    alert()->error('Error!','The admission form is not created for the subject!');
                    return redirect(route('studySpecific.admin',$study_id));
                }
            }
        }elseif($study_period==4) {
            $findSP4 = StudyPeriod4::where('SP4_ID', $findPSS->SP4_ID)->first();
            if ($findPSS != NULL) {
                if($findSP4 != NULL)
                {
                $Admission = SP4_Admission::where('SP4_Admission_ID', $findSP4->SP4_Admission)->first();
                $BMVS = SP4_BMVS::where('SP4_BMVS_ID', $findSP4->SP4_BMVS)->first();
                $BAT = SP4_BAT::where('SP4_BAT_ID', $findSP4->SP4_BATER)->first();
                $AQuestionnaire = SP4_AQuestionnaire::where('SP4_AQuestionnaire_ID', $findSP4->SP4_AQuestionnaire)->first();
                $UrineTest = SP4_UrineTest::where('SP4_UrineTest_ID', $findSP4->SP4_UrineTest)->first();
                $PKinetic = SP4_PKineticSampling::where('SP4_PKineticSampling_ID', $findSP4->SP4_PKineticSampling)->first();
                $PDynamic = SP4_PDynamicSampling::where('SP4_PDynamicSampling_ID', $findSP4->SP4_PDynamicSampling)->first();
                $PDAnalysis = SP4_PDynamicAnalysis::where('SP4_PDynamicAnalysis_ID', $findSP4->SP4_PDynamicAnalysis)->first();
                $VitalSign = SP4_VitalSigns::where('SP4_VitalSign_ID', $findSP4->SP4_VitalSign)->first();
                $Discharge = SP4_Discharge::where('SP4_Discharge_ID', $findSP4->SP4_Discharge)->first();
                $DQuestionnaire = SP4_DQuestionnaire::where('SP4_DQuestionnaire_ID', $findSP4->SP4_DQuestionnaire)->first();
                $IQ36 = SP4_IQ36::where('SP4_IQ36_ID', $findSP4->SP4_IQ36)->first();
                $IQ48 = SP4_IQ48::where('SP4_IQ48_ID', $findSP4->SP4_IQ48)->first();
                $IQ72 = SP4_IQ72::where('SP4_IQ72_ID', $findSP4->SP4_IQ72)->first();
                $IQ96 = SP4_IQ96::where('SP4_IQ96_ID', $findSP4->SP4_IQ96)->first();


                $pdf = PDF::loadView('test', compact('Admission',
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
                    'IQ72',
                    'IQ96',
                    'study',
                    'patient'))
                    ->setPaper('A4', 'landscape');

                    return $pdf->download($patient->name.$study->study_name.'study period4.pdf');
            }else
            {
                alert()->error('Error!','The admission form is not created for the subject!');
                return redirect(route('studySpecific.admin',$study_id));

            }
          } else {
                alert()->error('Error!', 'Subject is not found in the study!');
                return redirect(route('studySpecific.admin', $study_id));
            }
        }
    }

    public function testPDFPreScreening($PID)
    {
        $patient = Patient::where('id', $PID)->first();
        //$study = studySpecific::where('study_id', $study_id)->first();
        $BodyAndVitals = $patient->bodyandvitalsigns;
        $BATER = $patient->BreathAlcoholTestAndElectrocardiogram;
        $Medical = $patient->MedicalHistory;
        $Physical = $patient->PhysicalExam;
        $UrineTest = $patient->UrineTest;
        $LabTest = $patient->LabTest;
        $Serology = $patient->SerologyTest;
        $InclusionExclusion = $patient->InclusionExclusion;
        $Conclu = $patient->Conclu;


        $pdf = PDF::loadView('TestPreScreeningReport', compact('BodyAndVitals',
            'BATER',
            'Medical',
            'Physical',
            'UrineTest',
            'LabTest',
            'Serology',
            'InclusionExclusion',
            'Conclu',
            'patient'))->setpaper('A4','portrait');
        //PDF::loadView('bladefilename',compact('variable')) something like return view.
        /*$pdf = PDF::loadView('test', compact('Admission'))->setPaper('A4','landscape');*/

        //if want view in google use $filename->stream
        //if want test download use $file->download('filename')
        return $pdf->stream('preScreeningTest.pdf');


    }

}
