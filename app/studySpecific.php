<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studySpecific extends Model
{
    protected $table="study_specifics";
    protected $primaryKey="study_id";
  public function patientStudySpecific()
    {
        return $this->hasOne('App\PatientStudySpecific','study_id');
    }
}
