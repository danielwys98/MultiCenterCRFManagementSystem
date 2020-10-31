<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP1_Discharge extends Model
{
    protected $table='sp1_discharges';
    protected $primaryKey='SP1_Discharge_ID';
    public function StudyPeriod1(){
        $this->belongsTo('App\StudyPeriod1','SP1_Discharge','SP1_Discharge_ID');
    }
}
