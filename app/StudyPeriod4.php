<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyPeriod4 extends Model
{
    protected $table = 'study_period4';
    protected $primaryKey='SP4_ID';

    public function PatientStudySpecific()
    {
        return $this->belongsTo('App\PatientStudySpecific','SP4_ID','SP4_ID');
    }
    public function SP4_Admission ()
    {
        return $this->hasOne('App\SP4_Admission','SP4_Admission','SP4_Admission_ID');
    }
    public function SP4_BMVS ()
    {
        return $this->hasOne('App\SP4_BMVS','SP4_BMVS','SP4_BMVS_ID');
    }
    public function SP4_BAT ()
    {
        return $this->hasOne('App\SP4_BAT','SP4_BATER','SP4_BAT_ID');
    }
    public function SP4_AQuestionnaire ()
    {
        return $this->hasOne('App\SP4_AQuestionnaire','SP4_AQuestionnaire','SP4_AQuestionnaire_ID');
    }

    public function SP4_UrineTest ()
    {
        return $this->hasOne('App\SP4_UrineTest','SP4_UrineTest','SP4_UrineTest_ID');
    }

    public function SP4_PKineticSampling ()
    {
        return $this->hasOne('App\SP4_PKineticSampling','SP4_PKineticSampling','SP4_PKineticSampling_ID');
    }

    public function SP4_PDynamicSampling ()
    {
        return $this->hasOne('App\SP4_PDynamicSampling','SP4_PDynamicSampling','SP4_PDynamicSampling_ID');
    }

    public function SP4_PDynamicAnalysis ()
    {
        return $this->hasOne('App\SP4_PDynamicAnalysis','SP4_PDynamicAnalysis','SP4_PDynamicAnalysis_ID');
    }

    public function SP4_VitalSigns ()
    {
        return $this->hasOne('App\SP4_VitalSigns','SP4_VitalSigns','SP4_VitalSigns_ID');
    }

    public function SP4_Discharge ()
    {
        return $this->hasOne('App\SP4_Discharge','SP4_Discharge','SP4_Discharge_ID');
    }

    public function SP4_DQuestionnaire ()
    {
        return $this->hasOne('App\SP4_DQuestionnaire','SP4_DQuestionnaire','SP4_DQuestionnaire_ID');
    }

    public function SP4_IQ36 ()
    {
        return $this->hasOne('App\SP4_IQ36','SP4_IQ36','SP4_IQ36_ID');
    }

    public function SP4_IQ48 ()
    {
        return $this->hasOne('App\SP4_IQ48','SP4_IQ48','SP4_IQ48_ID');
    }

    public function SP4_IQ72 ()
    {
        return $this->hasOne('App\SP4_IQ72','SP4_IQ72','SP4_IQ72_ID');
    }

    public function SP4_IQ96 ()
    {
        return $this->hasOne('App\SP4_IQ96','SP4_IQ96','SP4_IQ96_ID');
    }
}
