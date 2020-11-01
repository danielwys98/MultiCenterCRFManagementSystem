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
              $subject_count=1;
              foreach($oriPatientName as $id=>$name)
              {
                  /*echo $id.'='.$name.'<br/>';*/
                  $PatientID[] = $id;
                  $PatientName[] = str_replace($name,$subject_count++,$name);
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


    //return to create a study's page
    public function create()
    {
        return view('studySpecific.create');
    }


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
        return redirect(route('studySpecific.index'))->with('success','You have successfully added the study into the system!');
    }


    //Show specific studies details
    public function edit($id)
    {
        //find the details of the studies.
        $study = studySpecific::find($id);

        //check if the studies is found
        if($study != NULL) {
            //find the subject who enrolled into this studies
            $findPatient = PatientStudySpecific::with(['Patient'])->where('study_id', $id)->get();

            if (count($findPatient) > 0) {
                foreach ($findPatient as $p) {
                    $PatientList[] = $p->patient_id;
                }
                $oriPatientName = Patient::whereIn('id', $PatientList)->get()->pluck('name', 'id');
            } else
            {
                $oriPatientName = NULL;
            }
                return view('studySpecific.edit',compact('study','oriPatientName'));

        }else
        {
            alert()->error('Error!','Study is not found in the database!');
            return back();
        }

    }


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
        return redirect(route('studySpecific.index'))->with('success','You updated the study details!');
    }


    //delete specific studies
    public function destroy($id)
    {
        $study = studySpecific::find($id);

        $study->delete();

         return redirect(route('studySpecific.index'))->with('ErrorMessages','You removed the study from the system!');
    }


    //Will be delete. just for testing purpose.
    public function testing(Request $request,$study_id)
    {
       dd($request);

    }

}
