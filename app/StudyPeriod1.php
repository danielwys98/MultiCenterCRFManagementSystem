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
}
