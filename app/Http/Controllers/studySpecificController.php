<?php

namespace App\Http\Controllers;

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
        $this->middleware('checkAdmin',['except'=>'studies']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //This return to the study-specific database page
    public function index()
    {
        $studies=studySpecific::all();

        return view('studySpecific.index',compact('studies'));


    }

    //This return to the studySpecific forms
    public function studies($id)
    {
        $study = studySpecific::find($id);

        $findPatient = PatientStudySpecific::with(['Patient'])->where('study_id',$id)->get();
        
          if(count($findPatient)>0){
              foreach($findPatient as $p)
              {
                  $PatientList[] = $p->patient_id;
              }
              $oriPatientName =Patient::whereIn('id',$PatientList)->get()->pluck('name','id');
              //increasing 0 until count of Subjects in the study
              $test=1;
              foreach($oriPatientName as $id=>$name)
              {
                  /*echo $id.'='.$name.'<br/>';*/
                  $PatientID[] = $id;
                  $PatientName[] = str_replace($name,$test++,$name);
                  $newName = array_combine($PatientID,$PatientName);
              }
              return view('studySpecific',compact('oriPatientName','newName','study'));
          }
          else{
              alert()->error('Error!','No subject enrolled into this study!');
              return back();
          }

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
    //return to create a study's page
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
    //store studies' details
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Show specific studies details
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

    //Edit the specific studies details and store it
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
    //delete specific studies
    public function destroy($id)
    {
        $study = studySpecific::find($id);

        $study->delete();

         return redirect(route('studySpecific.index'))->with('ErrorMessages','You removed the study from the system!');
    }


    //Will be delete. just for testing purpose.
    public function testing()
    {
        //Enroll a study id of 1=covid into the study
        //Create child first then save the child's ID into PSS
        /*$sp1 = new StudyPeriod1;
        /*$sp1->save();

        $PSS = new PatientStudySpecific;
        $PSS->study_id=2;
        $PSS->patient_id=7;
        $PSS->SP1_ID=$sp1->SP1_ID;
        $PSS->save();
        $findSP= $sp1->where('SP1_ID',7)->first();
        if($findSP->SP1_Admission == NULL)
        {
            $findSP->SP1_BATER = 2;
            $findSP->SP1_UrineTest=1;
            $findSP->save();
        }
        echo "saved!";*/

        //test relationship from top to down Patient -> PSS -> SP1
        /*  $PID=7;

          $StP1= new StudyPeriod1;
          $StP1->save();

          $newAdmission = new SP1_Admission;
          $newAdmission->details1= "a";
          $newAdmission->details2= "b";
          $newAdmission->save();*/

        $findPatient = PatientStudySpecific::with(['Patient'])->where('study_id',2)->get();

        foreach($findPatient as $p)
        {
            $PatientList[] = $p->patient_id;
        }
            $oriPatientName =Patient::whereIn('id',$PatientList)->get()->pluck('name','id');
        //increasing 0 until count of Subjects in the study
        $test=1;
        foreach($oriPatientName as $id=>$name)
        {
            /*echo $id.'='.$name.'<br/>';*/
            $PatientID[] = $id;
            $PatientName[] = str_replace($name,$test++,$name);
            $newName = array_combine($PatientID,$PatientName);
        }
            return view('test',compact('oriPatientName','newName'));

    }

    public function AdmissionCreate(Request $request,$study_id)
    {
        //assuming request inside has Patient ID of 5 and update study details (admission) of patient 5

        $PID = $request->patient_id;
        //find Patient Study Specific table
        $findPSS =PatientStudySpecific::with('StudyPeriod1')->where('patient_id',$PID)->first();

       if($findPSS !=NULL){
           if($findPSS->study_id == $study_id)
           {
               //find SP1_ID to access the SP1_Admission
               //find admission table and update it
               $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
               $findSP1_Admission = SP1_Admission::where('SP1_Admission_ID',$findSP1->SP1_Admission)->first();
               $findSP1_Admission->details1= "X";
               $findSP1_Admission->details2= "Z";

               $findSP1_Admission->save();
               echo "Saved successfully!";
           }
           else
           {
               echo "The subject is not enrolled into this study!";
           }

       }else{
           echo "This subject has not found in any studies!";
       }

    }
}
