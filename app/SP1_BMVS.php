<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP1_BMVS extends Model
{
    protected $table="sp1_bmvs";
    protected $primaryKey='SP1_BMVS_ID';

    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod1','SP1_BMVS','SP1_BMVS_ID');
    }
}
