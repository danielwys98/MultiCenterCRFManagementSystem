<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\studySpecific;
use Gate;
use App\PatientStudySpecific;
use App\StudyPeriod1;
use App\SP1_Admission;
use RealRashid\SweetAlert\Facades\Alert;

class preScreeningController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkAdmin');
    }

    public function index()
    {
        $patients = Patient::paginate(10);

        return view('preScreening.admin',compact('patients'));

    }

    public function search(Request $request){
        if($request->search_patient==NULL){
            $patients = Patient::all();
            return view('preScreening.admin',compact('patients'));
        }else{
            $patients=Patient::where('name',"LIKE","%".$request->search_patient."%")->get();
            return view('preScreening.admin',compact('patients'));
        }
    }

    public function create()
    {

        return view('preScreening.create');
    }

    public function store(Request $request)
    {
        $exist=false;
        //custom messages load for validation
        $custom = [
            'dateTaken.required' => 'Please input the date taken.',
            'timeTaken.required' => 'Please input the time taken.',
            'NRIC.required' => 'NRIC field cannot be blank.',
            'NRIC.regex' => 'Please only enter the NRIC correctly without dashes and check the digit.',
            'name.required' => 'Name field cannot be blank.',
            'Gender.required' => 'Please choose between a gender.',
            'Ethnicity.required' => 'Please state the ethnicity.',
            'Ethnic_Text.required' => 'If Others has been selected on ethnicity, please state your ethnicity.',
            'DoB.required' => 'Date of Birth field cannot be blank.',
            'age.required' => 'Age field cannot be blank.',
            'maritalstatus.required' => 'Please choose between a maritial status.',
            'MRNno.required' => 'MRN Hopsital Registration Number is required.',
        ];
        //validation for required fields
        $validatedData=$this->validate($request,[
            'dateTaken'  => 'required',
            'timeTaken' => 'required',
            'NRIC'  => 'required|regex:"\d{6}\d{2}\d{4}"',
            'name' => 'required',
            'Gender'  => 'required',
            'Ethnicity' => 'required',
            'Ethnic_Text' => 'required_if:Ethnicity,==,Others',
            'DoB'  => 'required',
            'age'  => 'required',
            'maritalstatus'  => 'required',
            'MRNno'  => 'required',
        ], $custom);
        //if validatedData, then check if the subject newly added is existed in the system.
        if($validatedData)
        {
            $getPatients = Patient::all();
            foreach($getPatients as $p)
            {
                if($p->NRIC == $request->NRIC)
                {
                    $exist=true;
                    break;
                }else
                {

                    $exist=false;
                }
            }
        }else
        {
            alert()->error('Error!');
        }
       //if not exist, then create new
        if($exist == false)
        {
            $patient = new Patient;
            $patient->dateTaken=$request->dateTaken;
            $patient->timeTaken=$request->timeTaken;
            $patient->NRIC=$request->NRIC;
            $patient->name=$request->name;
            $patient->Gender=$request->Gender;
            if($request->Ethnicity=='Others'){
                $patient->Ethnicity=$request->Ethnicity.$request->Ethnic_Text;
            }else
                $patient->Ethnicity=$request->Ethnicity;

            $patient->DoB=$request->DoB;
            $patient->age=$request->age;
            $patient->maritalstatus=$request->maritalstatus;
            $patient->MRNno=$request->MRNno;

            $patient->save();
            return redirect('preScreening/admin')->with('success','You have added '.$request->name.' into the system!');
        }else
        {
            alert()->error('Error!','The subject is already in the system!');
            return redirect('preScreening/admin');
        }
    }

    public function show($id)
    {
        $patient = Patient::find($id);

         return view('preScreening.show',compact('patient'));
    }


    public function edit($id)
    {
        $patient = Patient::find($id);

         return view('preScreening.edit',compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);

        $patient->dateTaken=$request->dateTaken;
        $patient->timeTaken=$request->timeTaken;
        $patient->NRIC=$request->NRIC;
        $patient->name=$request->name;
        $patient->Gender=$request->Gender;
        $patient->Ethnicity=$request->Ethnicity;
        $patient->DoB=$request->DoB;
        $patient->age=$request->age;
        $patient->maritalstatus=$request->maritalstatus;
        $patient->MRNno=$request->MRNno;

        $patient->save();
        Alert::success('Updated', 'The subject details has been updated from the system!');
        return redirect('preScreening/admin')->with('Messages','You have updated the information of the subject!');
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);


        $patient->bodyandvitalsigns()->delete();
        $patient->BreathAlcoholTestAndElectrocardiogram()->delete();
        $patient->MedicalHistory()->delete();
        $patient->PhysicalExam()->delete();
        $patient->UrineTest()->delete();
        $patient->LabTest()->delete();
        $patient->SerologyTest()->delete();
        $patient->InclusionExclusion()->delete();
        $patient->Conclu()->delete();

        //TODO: DELETE STUDY SPECIFIC STUFF ONCE SUBJECT IS DELETED AS WELL!
        $patient->delete();

        Alert::success('Deleted', 'The subject has been removed from the system!');
        return redirect('preScreening/admin')->with('ErrorMessages','The subject has been removed from the system!');
    }
}
