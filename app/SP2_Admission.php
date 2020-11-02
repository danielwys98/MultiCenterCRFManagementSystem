<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP2_Admission extends Model
{
    protected $table="sp2_admissions";
    protected $primaryKey='SP2_Admission_ID';
    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod1','SP2_Admission','SP2_Admission_ID');

    }
}
