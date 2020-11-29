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
        return redirect(route('studySpecific.index'))->with('success', 'You have successfully added '.$request->name.' into the system!');
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
        $studyname = $study->study_name;
        $study->delete();

        return redirect(route('studySpecific.index'))->with('success', 'You removed the '.$studyname.' from the system!');
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
}
