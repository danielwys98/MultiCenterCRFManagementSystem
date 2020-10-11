<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studySpecific extends Model
{
    protected $table="study_specifics";
    protected $primaryKey="studyID";
  public function patientStudySpecific()
    {
        return $this->hasOne('App\PatientStudySpecific','studyID');
    }
}
