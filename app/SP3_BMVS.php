<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP3_BMVS extends Model
{
    protected $table="sp3_bmvs";
    protected $primaryKey='SP3_BMVS_ID';

    public function StudyPeriod3()
    {
        return $this->belongsTo('App\StudyPeriod3','SP3_BMVS','SP3_BMVS_ID');
    }
}
