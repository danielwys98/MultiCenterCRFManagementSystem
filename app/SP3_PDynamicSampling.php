<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP3_PDynamicSampling extends Model
{
    protected $table="SP3_PDynamicSamplings";
    protected $primaryKey='SP3_PDynamicSampling_ID';
    public function StudyPeriod3()
    {
        return $this->belongsTo('App\StudyPeriod3','SP3_PDynamicSampling','SP3_PDynamicSampling_ID');
    }
}
