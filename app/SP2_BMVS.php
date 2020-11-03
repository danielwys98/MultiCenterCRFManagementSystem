<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP2_BMVS extends Model
{
    protected $table="sp2_bmvs";
    protected $primaryKey='SP2_BMVS_ID';

    public function StudyPeriod2()
    {
        return $this->belongsTo('App\StudyPeriod2','SP2_BMVS','SP2_BMVS_ID');
    }
}
