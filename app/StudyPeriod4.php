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
    /*  public function SP1_Admission ()
      {
          return $this->hasOne('App\SP1_Admission','SP1_Admission','SP1_Admission_ID');
      }*/
}
