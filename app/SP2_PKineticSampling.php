<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP2_PKineticSampling extends Model
{
    protected $table="sp2_pkineticsamplings";
    protected $primaryKey='SP2_PKineticSampling_ID';
    public function StudyPeriod2()
    {
        return $this->belongsTo('App\StudyPeriod2','SP2_PKineticSampling','SP2_PKineticSampling_ID');
    }
}
