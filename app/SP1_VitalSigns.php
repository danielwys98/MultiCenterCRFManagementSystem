<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP1_VitalSigns extends Model
{
    protected $table="sp1_vitalsigns";
    protected $primaryKey='SP1_VitalSign_ID';
    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod1','SP1_VitalSign','SP1_VitalSign_ID');
    }
}
