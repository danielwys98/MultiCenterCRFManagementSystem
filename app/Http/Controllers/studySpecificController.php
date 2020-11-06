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

    public function search(Request $request)
    {
        /*    if($request->search_patient==NULL){
                $patients = Patient::all();
                return view('preScreening.admin',compact('patients'));
            }else{
                $patients=Patient::where('name',"LIKE","%".$request->search_patient."%")->get();
                return view('preScreening.admin',compact('patients'));
            }*/
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
            return back();
        }

    }


    //Edit the specific studies details and store it
    public function update(Request $request, $id)
    {
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


    //Will be delete. just for testing purpose.
    public function testing()
    {
        //assuming the study_id is 4
        $study_id = 4;

        //get study's study period count
        $study = studySpecific::where('study_id', $study_id)->first();
        $studyPeriodLimit = $study->studyPeriod_Count;

        $period = 0;
        /*  $studyPeriod = array();
          array_unshift($studyPeriod,"");*/
        $studyPeriod[0] = '---';

        for ($i = 0; $i < $studyPeriodLimit; $i++) {
            $period++;
            $studyPeriod[] = $period;
        }
        return view('test', compact('study', 'studyPeriod'));
    }

    public function testPDF()
    {
        $PID = 1;
        $study_id = 1;
        $patient = Patient::where('id', $PID)->first();
        $study = studySpecific::where('study_id', $study_id)->first();
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id', $PID)
            ->where('study_id', $study_id)
            ->first();
        if ($findPSS != NULL) {
            $findSP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
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

            return $pdf->stream('test.pdf');
        }
    }

    public function testPDFPreScreening()
    {
        $PID = 1;
        $study_id = 1;
        $patient = Patient::where('id', $PID)->first();
        $study = studySpecific::where('study_id', $study_id)->first();
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
            'study',
            'patient'))->setpaper('A4','portrait');
        //PDF::loadView('bladefilename',compact('variable')) something like return view.
        /*$pdf = PDF::loadView('test', compact('Admission'))->setPaper('A4','landscape');*/

        //if want view in google use $filename->stream
        //if want test download use $file->download('filename')
        return $pdf->stream('preScreeningTest.pdf');


    }

}
