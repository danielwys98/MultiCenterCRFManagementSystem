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
    /*  public function SP1_Admission ()
      {
          return $this->hasOne('App\SP1_Admission','SP1_Admission','SP1_Admission_ID');
      }*/
}
