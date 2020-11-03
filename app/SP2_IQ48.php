<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP2_IQ48 extends Model
{
    protected $table="sp2_iq48s";
    protected $primaryKey='SP2_IQ48_ID';
    public function StudyPeriod2()
    {
        return $this->belongsTo('App\StudyPeriod2', 'SP2_IQ48', 'SP2_IQ48_ID');
    }
}
