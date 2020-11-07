<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyPeriod2 extends Model
{
    protected $table = 'study_period2';
    protected $primaryKey='SP2_ID';

    public function PatientStudySpecific()
    {
        return $this->belongsTo('App\PatientStudySpecific','SP2_ID','SP2_ID');
    }
    public function SP2_Admission ()
    {
        return $this->hasOne('App\SP2_Admission','SP2_Admission','SP2_Admission_ID');
    }
    public function SP2_BMVS ()
    {
        return $this->hasOne('App\SP2_BMVS','SP2_BMVS','SP2_BMVS_ID');
    }
    public function SP2_BAT ()
    {
        return $this->hasOne('App\SP2_BAT','SP2_BATER','SP2_BAT_ID');
    }
    public function SP2_AQuestionnaire ()
    {
        return $this->hasOne('App\SP2_AQuestionnaire','SP2_AQuestionnaire','SP2_AQuestionnaire_ID');
    }

    public function SP2_UrineTest ()
    {
        return $this->hasOne('App\SP2_UrineTest','SP2_UrineTest','SP2_UrineTest_ID');
    }

    public function SP2_PKineticSampling ()
    {
        return $this->hasOne('App\SP2_PKineticSampling','SP2_PKineticSampling','SP2_PKineticSampling_ID');
    }

    public function SP2_PDynamicSampling ()
    {
        return $this->hasOne('App\SP2_PDynamicSampling','SP2_PDynamicSampling','SP2_PDynamicSampling_ID');
    }

    public function SP2_PDynamicAnalysis ()
    {
        return $this->hasOne('App\SP2_PDynamicAnalysis','SP2_PDynamicAnalysis','SP2_PDynamicAnalysis_ID');
    }

    public function SP2_VitalSigns ()
    {
        return $this->hasOne('App\SP2_VitalSigns','SP2_VitalSigns','SP2_VitalSigns_ID');
    }

    public function SP2_Discharge ()
    {
        return $this->hasOne('App\SP2_Discharge','SP2_Discharge','SP2_Discharge_ID');
    }

    public function SP2_DQuestionnaire ()
    {
        return $this->hasOne('App\SP2_DQuestionnaire','SP2_DQuestionnaire','SP2_DQuestionnaire_ID');
    }

    public function SP2_IQ36 ()
    {
        return $this->hasOne('App\SP2_IQ36','SP2_IQ36','SP2_IQ36_ID');
    }

    public function SP2_IQ48 ()
    {
        return $this->hasOne('App\SP2_IQ48','SP2_IQ48','SP2_IQ48_ID');
    }

    public function SP2_IQ72 ()
    {
        return $this->hasOne('App\SP2_IQ72','SP2_IQ72','SP2_IQ72_ID');
    }

    public function SP2_IQ96 ()
    {
        return $this->hasOne('App\SP2_IQ96','SP2_IQ96','SP2_IQ96_ID');
    }
}
