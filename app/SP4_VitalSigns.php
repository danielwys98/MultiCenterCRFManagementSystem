<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP4_VitalSigns extends Model
{
    protected $table="sp4_vitalsigns";
    protected $primaryKey='SP4_VitalSign_ID';
    public function StudyPeriod4()
    {
        return $this->belongsTo('App\StudyPeriod4','SP4_VitalSign','SP4_VitalSign_ID');
    }
}
