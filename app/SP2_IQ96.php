<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP2_IQ96 extends Model
{
    protected $table="sp2_iq96s";
    protected $primaryKey='SP2_IQ96_ID';
    public function StudyPeriod2()
    {
        return $this->belongsTo('App\StudyPeriod2','SP2_IQ96','SP2_IQ96_ID');
    }
}
