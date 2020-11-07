<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyPeriod3 extends Model
{
    protected $table = 'study_period3';
    protected $primaryKey='SP3_ID';

    public function PatientStudySpecific()
    {
        return $this->belongsTo('App\PatientStudySpecific','SP3_ID','SP3_ID');
    }
    public function SP3_Admission ()
    {
        return $this->hasOne('App\SP3_Admission','SP3_Admission','SP3_Admission_ID');
    }
    public function SP3_BMVS ()
    {
        return $this->hasOne('App\SP3_BMVS','SP3_BMVS','SP3_BMVS_ID');
    }
    public function SP3_BAT ()
    {
        return $this->hasOne('App\SP3_BAT','SP3_BATER','SP3_BAT_ID');
    }
    public function SP3_AQuestionnaire ()
    {
        return $this->hasOne('App\SP3_AQuestionnaire','SP3_AQuestionnaire','SP3_AQuestionnaire_ID');
    }

    public function SP3_UrineTest ()
    {
        return $this->hasOne('App\SP3_UrineTest','SP3_UrineTest','SP3_UrineTest_ID');
    }

    public function SP3_PKineticSampling ()
    {
        return $this->hasOne('App\SP3_PKineticSampling','SP3_PKineticSampling','SP3_PKineticSampling_ID');
    }

    public function SP3_PDynamicSampling ()
    {
        return $this->hasOne('App\SP3_PDynamicSampling','SP3_PDynamicSampling','SP3_PDynamicSampling_ID');
    }

    public function SP3_PDynamicAnalysis ()
    {
        return $this->hasOne('App\SP3_PDynamicAnalysis','SP3_PDynamicAnalysis','SP3_PDynamicAnalysis_ID');
    }

    public function SP3_VitalSigns ()
    {
        return $this->hasOne('App\SP3_VitalSigns','SP3_VitalSigns','SP3_VitalSigns_ID');
    }

    public function SP3_Discharge ()
    {
        return $this->hasOne('App\SP3_Discharge','SP3_Discharge','SP3_Discharge_ID');
    }

    public function SP3_DQuestionnaire ()
    {
        return $this->hasOne('App\SP3_DQuestionnaire','SP3_DQuestionnaire','SP3_DQuestionnaire_ID');
    }

    public function SP3_IQ36 ()
    {
        return $this->hasOne('App\SP3_IQ36','SP3_IQ36','SP3_IQ36_ID');
    }

    public function SP3_IQ48 ()
    {
        return $this->hasOne('App\SP3_IQ48','SP3_IQ48','SP3_IQ48_ID');
    }

    public function SP3_IQ72 ()
    {
        return $this->hasOne('App\SP3_IQ72','SP3_IQ72','SP3_IQ72_ID');
    }

    public function SP3_IQ96 ()
    {
        return $this->hasOne('App\SP3_IQ96','SP3_IQ96','SP3_IQ96_ID');
    }
}
