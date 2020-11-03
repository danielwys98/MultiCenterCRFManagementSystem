<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP3_Admission extends Model
{
    protected $table="sp3_admissions";
    protected $primaryKey='SP3_Admission_ID';
    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod3','SP3_Admission','SP3_Admission_ID');

    }
}
