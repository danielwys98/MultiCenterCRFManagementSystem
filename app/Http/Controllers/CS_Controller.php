<?php

namespace App\Http\Controllers;

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
        $cs = new Patient_Conclusion_Signature;
        $cs->patient_id=$id;

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
            $cs->NAbnormality="Yes";
        }elseif (($NAbnormality=="")){
            $cs->NAbnormality="No";
        }

        $abnormality=$request->abnormality;
        if($abnormality=="Yes")
        {
            $cs->abnormality="Yes";
        }elseif (($abnormality=="")){
            $cs->abnormality="No";
        }

        $cs->physicianSign=$request->physicianSign;
        $cs->physicianName=$request->physicianName;
        $cs->dateTaken=$request->dateTaken;

        $validatedData=$this->validate($request,[
            'inclusionYesNo' => 'required',
            'physicianSign' => 'required',
            'physicianName' => 'required',
            'dateTaken' => 'required',
        ]);

        $cs->save();

        return redirect(route('details.create',$id));
    }
    public function updateCS(Request $request,$id)
    {
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
                        'inclusionYesNo'=>$request->NoDetails
                    ]);
            }

            $NAbnormality=$request->NAbnormality;
            if($NAbnormality=="Yes")
            {
                DB::table('patient_conclusion_signatures')
                    ->where('patient_id',$id)
                    ->update([
                        'NAbnormality'=>"Yes"
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
                        'abnormality'=>"Yes"
                    ]);
            }elseif (($abnormality=="No")){
                DB::table('patient_conclusion_signatures')
                    ->where('patient_id',$id)
                    ->update([
                        'abnormality'=>"No"
                    ]);
            }

            $validatedData=$this->validate($request,[
                'inclusionYesNo' => 'required',
                'physicianSign' => 'required',
                'physicianName' => 'required',
                'dateTaken' => 'required',
            ]);

        return redirect(route('details.edit',$id));
    }

}
