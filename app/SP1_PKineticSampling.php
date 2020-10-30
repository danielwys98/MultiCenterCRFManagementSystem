<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP1_UrineTest extends Model
{
    protected $table="sp1_pkineticsamplings";
    protected $primaryKey='SP1_PKineticSampling_ID';
    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod1','SP1_PKineticSampling','SP1_PKineticSampling_ID');
    }
}
//Ayye lmao Im Marcus 