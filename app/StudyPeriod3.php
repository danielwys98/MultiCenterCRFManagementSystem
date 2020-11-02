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
    /*  public function SP1_Admission ()
      {
          return $this->hasOne('App\SP1_Admission','SP1_Admission','SP1_Admission_ID');
      }*/
}
