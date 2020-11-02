<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP4_Admission extends Model
{
    protected $table="sp4_admissions";
    protected $primaryKey='SP4_Admission_ID';
    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod1','SP4_Admission','SP4_Admission_ID');
    }
}
