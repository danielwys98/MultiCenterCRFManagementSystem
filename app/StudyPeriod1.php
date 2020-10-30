<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyPeriod1 extends Model
{
    protected $table = 'study_period1';
    protected $primaryKey='SP1_ID';

    public function PatientStudySpecific()
    {
        return $this->belongsTo('App\PatientStudySpecific','SP1_ID','SP1_ID');
    }
  /*  public function SP1_Admission ()
    {
        return $this->hasOne('App\SP1_Admission','SP1_Admission','SP1_Admission_ID');
    }*/
}
