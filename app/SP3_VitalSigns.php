<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP3_VitalSigns extends Model
{
    protected $table="sp3_vitalsigns";
    protected $primaryKey='SP3_VitalSign_ID';
    public function StudyPeriod3()
    {
        return $this->belongsTo('App\StudyPeriod3','SP3_VitalSign','SP3_VitalSign_ID');
    }
}
