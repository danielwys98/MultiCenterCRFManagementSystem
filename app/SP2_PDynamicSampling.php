<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP2_PDynamicSampling extends Model
{
    protected $table="SP2_PDynamicSamplings";
    protected $primaryKey='SP2_PDynamicSampling_ID';

    public function StudyPeriod2()
    {
        return $this->belongsTo('App\StudyPeriod2','SP2_PDynamicSampling','SP2_PDynamicSampling_ID');
    }
}
