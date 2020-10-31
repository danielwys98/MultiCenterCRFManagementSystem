<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP1_PDynamicSampling extends Model
{
    protected $table="SP1_PDynamicSamplings";
    protected $primaryKey='SP1_PDynamicSampling_ID';

    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod1','SP1_PDynamicSampling','SP1_PDynamicSampling_ID');
    }
}
