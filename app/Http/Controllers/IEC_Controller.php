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

        return redirect(route('details.create',$id));
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

        return redirect(route('details.create',$id));
    }
}
