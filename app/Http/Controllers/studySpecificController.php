<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\studySpecific;
use App\Patient_Conclusion_Signature;
use App\PatientStudySpecific;
use App\StudyPeriod1;
use DB;

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

    public function studies()
    {
        return view('studySpecific');
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
        $study->MRNno=$request->MRNno;
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
        $data = $request->except('_token','_method');
        foreach($data as $key=>$value)
        {
            if($value!=NULL){
                DB::table('study_specifics')
                ->where('study_id', $id)
                ->update([
                    $key => $data[$key]
                ]);
            }
        }
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

         return redirect(route('studySpecific.index'))->with('ErrorMessages','You removed the study from the system!');
    }

    public function testing()
    {
      //Enroll a study id of 1=covid into the study
     //Create child first then save the child's ID into PSS
        $sp1 = new StudyPeriod1;
        /*$sp1->save();*/

        $PSS = new PatientStudySpecific;
        $PSS->study_id=2;
        $PSS->patient_id=7;
        $PSS->SP1_ID=$sp1->SP1_ID;
        /*$PSS->save();*/
        $findSP= $sp1->where('SP1_ID',7)->first();
        if($findSP->SP1_Admission == NULL)
        {
            $findSP->SP1_BATER = 2;
            $findSP->SP1_UrineTest=1;
            $findSP->save();
        }
        echo "saved!";
    }
}
