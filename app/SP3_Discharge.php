<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP3_Discharge extends Model
{
    protected $table='sp3_discharges';
    protected $primaryKey='SP3_Discharge_ID';
    public function StudyPeriod3(){
        $this->belongsTo('App\StudyPeriod3','SP3_Discharge','SP3_Discharge_ID');
    }
}
