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
    public function studies($study_id)
    {

        $study = studySpecific::find($study_id);
        //find the amount of period of this study
        $studyPeriodLimit = $study->studyPeriod_Count;
        $period = 0;
        $studyPeriod[0]='---';

        for($i = 0; $i < $studyPeriodLimit; $i++)
        {
            $period++;
            $studyPeriod[] =$period;
        }

        $findPSS = PatientStudySpecific::with(['Patient'])->where('study_id',$study_id)->get();

          if(count($findPSS)>0){
              foreach($findPSS as $p)
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
              return view('studySpecific',compact('oriPatientName','newName','study','studyPeriod'));
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
        $custom = [
            'study_name.required' => 'Please enter the name of the study',
            'timeTaken.required' => 'Please enter the time taken for study',
            'dateTaken.required' => 'Please enter the date taken for the study',
            'patient_Count.required' => 'Please enter the amount of subject can be enroll in the study',
            'studyPeriod_Count.required' => 'Please enter amount of study period needed to be done in this study',
            'MRNno.required' => 'Please enter the MRN number',
        ];
        //validation for required fields
        $validatedData=$this->validate($request,[
            'study_name' => 'required',
            'timeTaken' => 'required',
            'dateTaken' => 'required',
            'patient_Count' => 'required',
            'studyPeriod_Count' => 'required|numeric|min:1|max:4',
            'MRNno' => 'required',
        ],$custom);

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
        $custom = [
            'study_name.required' => 'Please enter the name of the study',
            'timeTaken.required' => 'Please enter the time taken for study',
            'dateTaken.required' => 'Please enter the date taken for the study',
            'patient_Count.required' => 'Please enter the amount of subject can be enroll in the study',
            'studyPeriod_Count.required' => 'Please enter amount of study period needed to be done in this study',
            'MRNno.required' => 'Please enter the MRN number',
        ];
        //validation for required fields
        $validatedData=$this->validate($request,[
            'study_name' => 'required',
            'timeTaken' => 'required',
            'dateTaken' => 'required',
            'patient_Count' => 'required',
            'studyPeriod_Count' => 'required|numeric|min:1|max:4',
            'MRNno' => 'required',
        ],$custom);

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
        return redirect(route('studySpecific.edit',$study->study_id))->with('success','You updated the study details!');
    }


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
        //assuming the study_id is 4
        $study_id = 4;

        //get study's study period count
        $study = studySpecific::where('study_id',$study_id)->first();
        $studyPeriodLimit = $study->studyPeriod_Count;

        $period = 0;
      /*  $studyPeriod = array();
        array_unshift($studyPeriod,"");*/
        $studyPeriod[0]='---';

        for($i = 0; $i < $studyPeriodLimit; $i++)
        {
            $period++;
            $studyPeriod[] =$period;
        }
         return view('test',compact('study','studyPeriod'));
    }

    public function testPost(Request $request,$study_id)
    {
        $study = studySpecific::where('study_id',$study_id)->first();
        $studyPeriodLimit = $study->studyPeriod_Count;
        if($request->studyPeriod <= $studyPeriodLimit)
        {
           if($request->studyPeriod == 1)
           {
               echo "save SP1";
           }else if($request->studyPeriod == 2)
           {
               echo "save SP2";
           }else if($request->studyPeriod == 3)
           {
               echo "save SP3";
           }else if($request->studyPeriod == 4)
           {
               echo "save SP4";
           }else
           {
               echo "You did not select a study period";
           }
        }

    }

}
