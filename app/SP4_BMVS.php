<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP4_BMVS extends Model
{
    protected $table="sp4_bmvs";
    protected $primaryKey='SP4_BMVS_ID';

    public function StudyPeriod4()
    {
        return $this->belongsTo('App\StudyPeriod4','SP4_BMVS','SP4_BMVS_ID');
    }
}
