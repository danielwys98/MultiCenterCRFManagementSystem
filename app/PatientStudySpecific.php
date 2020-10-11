<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientStudySpecific extends Model
{
    protected $table="patient_study_specifics";
    protected $primaryKey="patientSS_ID";
    public function studySpecific()
    {
        return $this->belongsTo('App\studySpecific','studyID');
    }
    public function Patient()
    {
        return $this->belongsTo('App\Patient','patients','id');
    }
}
