<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Patient_InclusionExclusionCriteria;
use DB;

class IEC_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function storeIEC(Request $request,$id)
    {
        $iec = new Patient_InclusionExclusionCriteria;

        $iec->patient_id=$id;

        $custom = [
            'Inclusion01.required' => 'Please select whether Yes or No on Inclusion 1',
            'Inclusion02.required' => 'Please select whether Yes or No on Inclusion 2',
            'Inclusion03.required' => 'Please select whether Yes or No on Inclusion 3',
            'Inclusion04.required' => 'Please select whether Yes or No on Inclusion 4',
            'Inclusion05.required' => 'Please select whether Yes or No on Inclusion 5',

            'Exclusion01.required' => 'Please select whether Yes or No on Exclusion 1',
            'Exclusion02.required' => 'Please select whether Yes or No on Exclusion 2',
            'Exclusion03.required' => 'Please select whether Yes or No on Exclusion 3',
            'Exclusion04.required' => 'Please select whether Yes or No on Exclusion 4',
            'Exclusion05.required' => 'Please select whether Yes or No on Exclusion 5',
            'Exclusion06.required' => 'Please select whether Yes or No on Exclusion 6',
            'Exclusion07.required' => 'Please select whether Yes or No on Exclusion 7',
            'Exclusion08.required' => 'Please select whether Yes or No on Exclusion 8',
            'Exclusion09.required' => 'Please select whether Yes or No on Exclusion 9',
            'Exclusion10.required' => 'Please select whether Yes or No on Exclusion 10',
            'Exclusion11.required' => 'Please select whether Yes or No on Exclusion 11',
            'Exclusion12.required' => 'Please select whether Yes or No on Exclusion 12',
            'Exclusion13.required' => 'Please select whether Yes or No on Exclusion 13',
            'Exclusion14.required' => 'Please select whether Yes or No on Exclusion 14',
            'Exclusion15.required' => 'Please select whether Yes or No on Exclusion 15',
            'Exclusion16.required' => 'Please select whether Yes or No on Exclusion 16',
            'Exclusion17.required' => 'Please select whether Yes or No on Exclusion 17',
            'Exclusion18.required' => 'Please select whether Yes or No on Exclusion 18',
            'Exclusion19.required' => 'Please select whether Yes or No on Exclusion 19',
            'Exclusion20.required' => 'Please select whether Yes or No on Exclusion 20',
            'Exclusion21.required' => 'Please select whether Yes or No on Exclusion 21',
            'Exclusion22.required' => 'Please select whether Yes or No on Exclusion 22',
            'Exclusion23.required' => 'Please select whether Yes or No on Exclusion 23',
            'Exclusion24.required' => 'Please select whether Yes or No on Exclusion 24',
            'Exclusion25.required' => 'Please select whether Yes or No on Exclusion 25',
        ];

        $validatedData=$this->validate($request,[
            'Inclusion01' => 'required',
            'Inclusion02' => 'required',
            'Inclusion03' => 'required',
            'Inclusion04' => 'required',
            'Inclusion05' => 'required',

            'Exclusion01' => 'required',
            'Exclusion02' => 'required',
            'Exclusion03' => 'required',
            'Exclusion04' => 'required',
            'Exclusion05' => 'required',
            'Exclusion06' => 'required',
            'Exclusion07' => 'required',
            'Exclusion08' => 'required',
            'Exclusion09' => 'required',
            'Exclusion10' => 'required',
            'Exclusion11' => 'required',
            'Exclusion12' => 'required',
            'Exclusion13' => 'required',
            'Exclusion14' => 'required',
            'Exclusion15' => 'required',
            'Exclusion16' => 'required',
            'Exclusion17' => 'required',
            'Exclusion18' => 'required',
            'Exclusion19' => 'required',
            'Exclusion20' => 'required',
            'Exclusion21' => 'required',
            'Exclusion22' => 'required',
            'Exclusion23' => 'required',
            'Exclusion24' => 'required',
            'Exclusion25' => 'required',
        ],$custom);

        $iec->Inclusion01=$request->Inclusion01;
        $iec->Inclusion02=$request->Inclusion02;
        $iec->Inclusion03=$request->Inclusion03;
        $iec->Inclusion04=$request->Inclusion04;
        $iec->Inclusion05=$request->Inclusion05;

        $iec->Exclusion01=$request->Exclusion01;
        $iec->Exclusion02=$request->Exclusion02;
        $iec->Exclusion03=$request->Exclusion03;
        $iec->Exclusion04=$request->Exclusion04;
        $iec->Exclusion05=$request->Exclusion05;
        $iec->Exclusion06=$request->Exclusion06;
        $iec->Exclusion07=$request->Exclusion07;
        $iec->Exclusion08=$request->Exclusion08;
        $iec->Exclusion09=$request->Exclusion09;
        $iec->Exclusion10=$request->Exclusion10;
        $iec->Exclusion11=$request->Exclusion11;
        $iec->Exclusion12=$request->Exclusion12;
        $iec->Exclusion13=$request->Exclusion13;
        $iec->Exclusion14=$request->Exclusion14;
        $iec->Exclusion15=$request->Exclusion15;
        $iec->Exclusion16=$request->Exclusion16;
        $iec->Exclusion17=$request->Exclusion17;
        $iec->Exclusion18=$request->Exclusion18;
        $iec->Exclusion19=$request->Exclusion19;
        $iec->Exclusion20=$request->Exclusion20;
        $iec->Exclusion21=$request->Exclusion21;
        $iec->Exclusion22=$request->Exclusion22;
        $iec->Exclusion23=$request->Exclusion23;
        $iec->Exclusion24=$request->Exclusion24;
        $iec->Exclusion25=$request->Exclusion25;

        $iec->save();

        return redirect(route('preScreeningForms.create',$id))->with('Messages','You have added the Inclusion and Exclusion Criteria detail for the subject!');
    }
    public function updateIEC(Request $request,$id)
    {
       DB::table('patient_inclusion_exclusion_criterias')
            ->where('patient_id',$id)
            ->update([
            'Inclusion01'=>$request->Inclusion01,
            'Inclusion02'=>$request->Inclusion02,
            'Inclusion03'=>$request->Inclusion03,
            'Inclusion04'=>$request->Inclusion04,
            'Inclusion05'=>$request->Inclusion05,

            'Exclusion01'=>$request->Exclusion01,
            'Exclusion02'=>$request->Exclusion02,
            'Exclusion03'=>$request->Exclusion03,
            'Exclusion04'=>$request->Exclusion04,
            'Exclusion05'=>$request->Exclusion05,
            'Exclusion06'=>$request->Exclusion06,
            'Exclusion07'=>$request->Exclusion07,
            'Exclusion08'=>$request->Exclusion08,
            'Exclusion09'=>$request->Exclusion09,
            'Exclusion10'=>$request->Exclusion10,
            'Exclusion11'=>$request->Exclusion11,
            'Exclusion12'=>$request->Exclusion12,
            'Exclusion13'=>$request->Exclusion13,
            'Exclusion14'=>$request->Exclusion14,
            'Exclusion15'=>$request->Exclusion15,
            'Exclusion16'=>$request->Exclusion16,
            'Exclusion17'=>$request->Exclusion17,
            'Exclusion18'=>$request->Exclusion18,
            'Exclusion19'=>$request->Exclusion19,
            'Exclusion20'=>$request->Exclusion20,
            'Exclusion21'=>$request->Exclusion21,
            'Exclusion22'=>$request->Exclusion22,
            'Exclusion23'=>$request->Exclusion23,
            'Exclusion24'=>$request->Exclusion24,
            'Exclusion25'=>$request->Exclusion25

        ]);

        return redirect(route('preScreeningForms.edit',$id))->with('Messages','You have updated the Inclusion and Exclusion Criteria detail for the subject!');
    }

}
