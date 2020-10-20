<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\studySpecific;
use Gate;

class preScreeningController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*    public function index()
    {
            $patients = Patient::all();

            return view('preScreening.admin',compact('patients'));
    }*/
    public function index()
    {
        $patients = Patient::all();

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('preScreening.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient = new Patient;

        $patient->id=$request->id;
        $patient->dateTaken=$request->dateTaken;
        $patient->timeTaken=$request->timeTaken;
        $patient->NRIC=$request->NRIC;
        $patient->name=$request->name;
        $patient->Gender=$request->Gender;
        if($request->Ethnicity=='Others'){
            $patient->Ethnicity=$request->Ethnic_Text;
        }else
            $patient->Ethnicity=$request->Ethnicity;

        $patient->DoB=$request->DoB;
        $patient->age=$request->age;
        $patient->maritalstatus=$request->maritalstatus;
        $patient->MRNno=$request->MRNno;

        $patient->save();

        return redirect('preScreening');
        //remember to change to other path as only admin can view index pages
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);

         return view('preScreening.show',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);

         return view('preScreening.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

         return redirect('preScreening');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        $patient->delete();


         return redirect('preScreening');
    }
}
