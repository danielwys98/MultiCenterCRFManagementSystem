<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP2_Discharge extends Model
{
    protected $table='sp2_discharges';
    protected $primaryKey='SP2_Discharge_ID';
    public function StudyPeriod2(){
        $this->belongsTo('App\StudyPeriod2','SP2_Discharge','SP2_Discharge_ID');
    }
}
