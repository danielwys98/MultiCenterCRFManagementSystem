<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP4_Discharge extends Model
{
    protected $table='sp4_discharges';
    protected $primaryKey='SP4_Discharge_ID';
    public function StudyPeriod4(){
        $this->belongsTo('App\StudyPeriod4','SP4_Discharge','SP4_Discharge_ID');
    }
}
