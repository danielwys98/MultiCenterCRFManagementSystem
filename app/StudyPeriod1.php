<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyPeriod1 extends Model
{
    protected $table = 'study_period1';
    protected $primaryKey='SP1_ID';

    public function PatientStudySpecific()
    {
        return $this->belongsTo('App\PatientStudySpecific','SP1_ID','SP1_ID');
    }
    public function SP1_Admission ()
    {
        return $this->hasOne('App\SP1_Admission','SP1_Admission','SP1_Admission_ID');
    }
    public function SP1_BMVS ()
    {
        return $this->hasOne('App\SP1_BMVS','SP1_BMVS','SP1_BMVS_ID');
    }
    public function SP1_BAT ()
    {
        return $this->hasOne('App\SP1_BAT','SP1_BATER','SP1_BAT_ID');
    }
    public function SP1_AQuestionnaire ()
    {
        return $this->hasOne('App\SP1_AQuestionnaire','SP1_AQuestionnaire','SP1_AQuestionnaire_ID');
    }

    public function SP1_UrineTest ()
    {
        return $this->hasOne('App\SP1_UrineTest','SP1_UrineTest','SP1_UrineTest_ID');
    }

    public function SP1_PKineticSampling ()
    {
        return $this->hasOne('App\SP1_PKineticSampling','SP1_PKineticSampling','SP1_PKineticSampling_ID');
    }

    public function SP1_PDynamicSampling ()
    {
        return $this->hasOne('App\SP1_PDynamicSampling','SP1_PDynamicSampling','SP1_PDynamicSampling_ID');
    }

    public function SP1_PDynamicAnalysis ()
    {
        return $this->hasOne('App\SP1_PDynamicAnalysis','SP1_PDynamicAnalysis','SP1_PDynamicAnalysis_ID');
    }

    public function SP1_VitalSigns ()
    {
        return $this->hasOne('App\SP1_VitalSigns','SP1_VitalSigns','SP1_VitalSigns_ID');
    }

    public function SP1_Discharge ()
    {
        return $this->hasOne('App\SP1_Discharge','SP1_Discharge','SP1_Discharge_ID');
    }

    public function SP1_DQuestionnaire ()
    {
        return $this->hasOne('App\SP1_DQuestionnaire','SP1_DQuestionnaire','SP1_DQuestionnaire_ID');
    }

    public function SP1_IQ36 ()
    {
        return $this->hasOne('App\SP1_IQ36','SP1_IQ36','SP1_IQ36_ID');
    }

    public function SP1_IQ48 ()
    {
        return $this->hasOne('App\SP1_IQ48','SP1_IQ48','SP1_IQ48_ID');
    }

    public function SP1_IQ72 ()
    {
        return $this->hasOne('App\SP1_IQ72','SP1_IQ72','SP1_IQ72_ID');
    }

    public function SP1_IQ96 ()
    {
        return $this->hasOne('App\SP1_IQ96','SP1_IQ96','SP1_IQ96_ID');
    }
}
