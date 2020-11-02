<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_Admission;
use App\SP1_AQuestionnaire;
use App\SP1_BAT;
use App\SP1_BMVS;
use App\SP1_Discharge;
use App\SP1_DQuestionnaire;
use App\SP1_PDynamicAnalysis;
use App\SP1_PDynamicSampling;
use App\SP1_UrineTest;
use App\SP1_PKineticSampling;
use App\SP1_IQ36;
use App\SP1_IQ48;
use App\SP1_VitalSigns;
use App\StudyPeriod1;
use App\studySpecific;
use Illuminate\Http\Request;
use App\Patient;
use App\Patient_Conclusion_Signature;
use DB;

class
CS_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkAdmin');
    }
    public function storeCS(Request $request,$id)
    {
        //Insert this conclusion under this subject
        $cs = new Patient_Conclusion_Signature;
        $cs->patient_id=$id;

        $custom = [
            'inclusionYesNo.required' => 'Please select whether the subject fulfill all the inclusion criteria and none of the exclusion criteria',
            'NoDetails.required_if' => 'If the the subject does not fulfill all the inclusion criteria and none of the exclusion criteria, Please provide details on the given text field',
            'physicianSign.required' => 'Physician’s signature is required',
            'physicianName.required' => 'Physician’s name is required',
            'dateTaken.required' => 'Please enter the date taken',
        ];

        $validatedData=$this->validate($request,[
            'inclusionYesNo' => 'required',
            'NoDetails' => 'required_if:inclusionYesNo,==,No',
            'physicianSign' => 'required',
            'physicianName' => 'required',
            'dateTaken' => 'required',
        ],$custom);


        if($validatedData){
            $inclusionYesNo = $request->inclusionYesNo;
            if($inclusionYesNo=="Yes")
            {
                $cs->inclusionYesNo = $request->inclusionYesNo;
            }else{
                $cs->inclusionYesNo = $request->NoDetails;
            }

            $NAbnormality=$request->NAbnormality;
            if($NAbnormality=="Yes")
            {
                $cs->NAbnormality=$request->NAbnormality;
            }elseif (($NAbnormality=="")){
                $cs->NAbnormality=NULL;
            }

            $abnormality=$request->abnormality;
            if($abnormality=="Yes")
            {
                $cs->abnormality=$request->abnormality;
            }elseif (($abnormality=="")){
                $cs->abnormality=NULL;
            }

            $cs->physicianSign=$request->physicianSign;
            $cs->physicianName=$request->physicianName;
            $cs->dateTaken=$request->dateTaken;

            $cs->save();
            $savedData=true;
        }
        else{
            $savedData=false;
        }

        if($savedData)
        {
            //Initialise Patient Study Specific column for this subject
            $PSS = new PatientStudySpecific;
            $PSS->study_id=$request->study_id;
            $PSS->patient_id=$id;
            $PSS->save();

            return redirect(route('preScreeningForms.create',$id))->with('success','You have added the conclusion detail for the subject!');
        }
    }
    public function updateCS(Request $request,$id)
    {
        $custom = [
            'inclusionyesno.required' => 'Please select whether the subject fulfill all the inclusion criteria and none of the exclusion criteria',
            'NoDetails.required_if' => 'If the the subject does not fulfill all the inclusion criteria and none of the exclusion criteria, Please provide details on the given text field',
            'physicianSign.required' => 'Physician’s signature is required',
            'physicianName.required' => 'Physician’s name is required',
            'dateTaken.required' => 'Please enter the date taken',
        ];

        $validatedData=$this->validate($request,[
            'inclusionyesno' => 'required',
            'NoDetails' => 'required_if:inclusionyesno,==,No',
            'physicianSign' => 'required',
            'physicianName' => 'required',
            'dateTaken' => 'required',
        ],$custom);

        DB::table('patient_study_specifics')
            ->where('patient_id',$id)
            ->update([
                'study_id'=>$request->study_id
            ]);
        DB::table('patient_conclusion_signatures')
            ->where('patient_id',$id)
            ->update([
            'physicianSign'=>$request->physicianSign,
            'physicianName'=>$request->physicianName,
            'dateTaken'=>$request->dateTaken
            ]);

        $inclusionYesNo = $request->inclusionyesno;
        if($inclusionYesNo=="Yes")
        {
            DB::table('patient_conclusion_signatures')
                ->where('patient_id',$id)
                ->update([
                    'inclusionYesNo'=>$request->inclusionyesno
                ]);
        }else{
            DB::table('patient_conclusion_signatures')
                ->where('patient_id',$id)
                ->update([
                    'inclusionYesNo'=>$request->NoDetails
                ]);
        }

        $NAbnormality=$request->NAbnormality;
        if($NAbnormality=="Yes")
        {
            DB::table('patient_conclusion_signatures')
                ->where('patient_id',$id)
                ->update([
                    'NAbnormality'=>$request->NAbnormality
                ]);
        }elseif (($NAbnormality=="No")){
            DB::table('patient_conclusion_signatures')
                ->where('patient_id',$id)
                ->update([
                    'NAbnormality'=>"No"
                ]);
        }

        $abnormality=$request->abnormality;
        if($abnormality=="Yes")
        {
            DB::table('patient_conclusion_signatures')
                ->where('patient_id',$id)
                ->update([
                    'abnormality'=>$request->abnormality
                ]);
        }elseif (($abnormality=="No")){
            DB::table('patient_conclusion_signatures')
                ->where('patient_id',$id)
                ->update([
                    'abnormality'=>"No"
                ]);
        }

        return redirect(route('preScreeningForms.edit',$id))->with('success','You have updated the conclusion detail for the subject!');
    }
}
