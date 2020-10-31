<?php

namespace App\Http\Controllers;

use App\PatientStudySpecific;
use App\SP1_PDynamicAnalysis;
use App\StudyPeriod1;
use Illuminate\Http\Request;

class SP1_PDynamicAnalysis_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $study_id)
    {
        $PID = $request->patient_id;
        //find Patient Study Specific table
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
            ->where('patient_id', $PID)
            ->first();
        if ($findPSS != NULL) {
            if ($findPSS->study_id == $study_id) {
                //find SP1_ID to access the SP1_PKineticSampling
                //find table and update it
                $findSP1 = StudyPeriod1::where('SP1_ID', $findPSS->SP1_ID)->first();
                $findPS1_PDAnalysis=SP1_PDynamicAnalysis::where('SP1_PDynamicAnalysis_ID',$findSP1->SP1_PDynamicAnalysis)->first();


            } else {
                alert()->error('Error!', 'This subject is not enrolled into this study!');
                return redirect(route('studySpecific.input', $study_id));
            }
        } else {
            alert()->error('Error!', 'This subject is not enrolled into any study!');
            return redirect(route('studySpecific.input', $study_id));
        }
    }
}
