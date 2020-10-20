<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use Illuminate\Http\Request;
use App\Patient;
use App\Patient_Conclusion_Signature;
use DB;

class CS_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function storeCS(Request $request,$id)
    {
        $PSS = new PatientStudySpecific;
        $PSS->study_id=$request->study;
        $PSS->patient_id=$id;

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
        ]);
        
        $inclusionYesNo = $request->inclusionYesNo;
        if($inclusionYesNo=="Yes")
        {
            $cs->inclusionYesNo = $request->inclusionYesNo;
        }else{
            $cs->inclusionYesNo = $request->inclusionYesNo . $request->NoDetails;
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
        $PSS->save();

        return redirect(route('details.create',$id))->with('Messages','You have added the conclusion detail for the subject!');
    }
    public function updateCS(Request $request,$id)
    {
        DB::table('patient_study_specifics')
            ->where('patient_id',$id)
            ->update([
                'study_id'=>$request->study
            ]);
        DB::table('patient_conclusion_signatures')
            ->where('patient_id',$id)
            ->update([
            'physicianSign'=>$request->physicianSign,
            'physicianName'=>$request->physicianName,
            'dateTaken'=>$request->dateTaken
            ]);

        $inclusionYesNo = $request->inclusionYesNo;
        if($inclusionYesNo=="Yes")
        {
            DB::table('patient_conclusion_signatures')
                ->where('patient_id',$id)
                ->update([
                    'inclusionYesNo'=>$request->inclusionYesNo
                ]);
        }else{
            DB::table('patient_conclusion_signatures')
                ->where('patient_id',$id)
                ->update([
                    'inclusionYesNo'=>$request->inclusionYesNo . $request->NoDetails
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

        // $validatedData=$this->validate($request,[
        //     'inclusionYesNo' => 'required',
        //     'NoDetails' => 'required_if:inclusionYesNo,==,No',
        //     'physicianSign' => 'required',
        //     'physicianName' => 'required',
        //     'dateTaken' => 'required',
        // ]);
        return redirect(route('details.edit',$id))->with('Messages','You have added the conclusion detail for the subject!');
    }

}
