<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\studySpecific;
use App\PatientStudySpecific;

class studySpecificController extends Controller
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
    public function index()
    {
        $studies=studySpecific::all();

        return view('studySpecific.index',compact('studies'));


    }

    public function search(Request $request){
    /*    if($request->search_patient==NULL){
            $patients = Patient::all();
            return view('preScreening.admin',compact('patients'));
        }else{
            $patients=Patient::where('name',"LIKE","%".$request->search_patient."%")->get();
            return view('preScreening.admin',compact('patients'));
        }*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studySpecific.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $study = new studySpecific();

        $study->study_name=$request->study_name;
        $study->timeTaken = $request->timeTaken;
        $study->dateTaken=$request->dateTaken;
        $study->patient_Count=$request->patient_Count;
        $study->studyPeriod_Count=$request->studyPeriod_Count;
        $study->save();
        return redirect(route('studySpecific.index'))->with('Messages','You have successfully added the study into the system!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      /*  $patient = Patient::find($id);

         return view('preScreening.show',compact('patient'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $study = studySpecific::find($id);

         return view('studySpecific.edit',compact('study'));
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
        $study = studySpecific::find($id);

        $study->study_name=$request->study_name;
        $study->timeTaken = $request->timeTaken;
        $study->dateTaken=$request->dateTaken;
        $study->patient_Count=$request->patient_Count;
        $study->studyPeriod_Count=$request->studyPeriod_Count;
        $study->save();

         return redirect(route('studySpecific.index'))->with('Messages','You updated the study details!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $study = studySpecific::find($id);

        $study->delete();

         return redirect(route('studySpecific.index'));
    }

    public function testing()
    {
        //for example getting patient id from request = 1
      /*  $id= 6;
        $findPatientStudy=Patient::findOrFail($id)->patientStudySpecific;
        $findStudy=studySpecific::findOrFail($findPatientStudy->study_id);
        echo $findStudy->study_name;*/
        $studies=studySpecific::all()->pluck('study_name','study_id');

      return view('studySpecificdb')->with('studies',$studies);
    }
}
