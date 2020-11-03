<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP4_PDynamicSampling extends Model
{
    protected $table="SP4_PDynamicSamplings";
    protected $primaryKey='SP4_PDynamicSampling_ID';
    public function StudyPeriod4()
    {
        return $this->belongsTo('App\StudyPeriod4','SP4_PDynamicSampling','SP4_PDynamicSampling_ID');
    }
}
