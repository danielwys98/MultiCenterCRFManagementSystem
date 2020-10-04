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
        // $cs->inclusionYesNo=$request->inclusionYesNo;
        // $cs->NoDetails=$request->NoDetails;
        
        $NoDetails = $request->NoDetails;
        if($NoDetails==NULL)
        {
            $cs->inclusionYesNo = $request->inclusionYesNo;
        }else{
            $cs->inclusionYesNo = $request->NoDetails;
        }

        $NAbnormality=$request->NAbnormality;
        if($NAbnormality==false)
        {
            $cs->NAbnormality="No";
        }else{
            $cs->NAbnormality="Yes";
        }

        $abnormality=$request->abnormality;
        if($abnormality==true)
        {
            $cs->abnormality="No";
        }else{
            $cs->abnormality="Yes";
        }

        $cs->physicianSign=$request->physicianSign;
        $cs->physicianName=$request->physicianName;
        $cs->dateTaken=$request->dateTaken;
        
        
        // dd($request);
        // $validatedData = $request->validate([
        //     'inclusionYesNo' => 'required',
        //     // 'NAbnormality' => 'required',
        //     // 'abnormality' => 'required',
        //     'physicianSign' => 'required',
        //     'physicianName' => 'required',
        //     'dateTaken' => 'required',
        // ]);

        $cs->save();

        return redirect(route('details.create',$id));
    }
    public function updateCS(Request $request,$id)
    {
       DB::table('patient_conclusion_signatures')
            ->where('patient_id',$id)
            ->update([
            'inclusionYesNo'=>$request->inclusionYesNo,
            'NoDetails'=>$request->NoDetails,
            'NAbnormality'=>$request->NAbnormality,
            'abnormality'=>$request->abnormality,
            'physicianSign'=>$request->physicianSign,
            'physicianName'=>$request->physicianName,
            'dateTaken'=>$request->dateTaken
            
        ]);

        return redirect(route('details.create',$id));
    }
}
