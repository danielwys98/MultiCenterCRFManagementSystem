<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP2_VitalSigns extends Model
{
    protected $table="sp2_vitalsigns";
    protected $primaryKey='SP2_VitalSign_ID';
    public function StudyPeriod2()
    {
        return $this->belongsTo('App\StudyPeriod2','SP2_VitalSign','SP2_VitalSign_ID');
    }
}
