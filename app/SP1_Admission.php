<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP1_Admission extends Model
{
    protected $table="sp1_admissions";
    protected $primaryKey='SP1_Admission_ID';
    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod1','SP1_Admission','SP1_Admission_ID');
    }
}
