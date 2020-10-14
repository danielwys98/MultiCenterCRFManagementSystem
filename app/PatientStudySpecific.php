<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientStudySpecific extends Model
{
    protected $table="patient_study_specifics";
    protected $primaryKey="patientSS_ID";
    public function studySpecific()
    {
        return $this->belongsTo('App\studySpecific','study_id','study_id');
    }
    public function Patient()
    {
        return $this->belongsTo('App\Patient','patient_id','id');
    }
}
