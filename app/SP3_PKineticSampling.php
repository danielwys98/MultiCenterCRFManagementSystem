<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP3_PKineticSampling extends Model
{
    protected $table="sp3_pkineticsamplings";
    protected $primaryKey='SP3_PKineticSampling_ID';
    public function StudyPeriod3()
    {
        return $this->belongsTo('App\StudyPeriod3','SP3_PKineticSampling','SP3_PKineticSampling_ID');
    }
}
