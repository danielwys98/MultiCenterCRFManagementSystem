<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP4_PKineticSampling extends Model
{
    protected $table="sp4_pkineticsamplings";
    protected $primaryKey='SP4_PKineticSampling_ID';
    public function StudyPeriod4()
    {
        return $this->belongsTo('App\StudyPeriod4','SP4_PKineticSampling','SP4_PKineticSampling_ID');
    }
}
