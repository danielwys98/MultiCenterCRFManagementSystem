<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP1_IQ96 extends Model
{
    protected $table="sp1_iq96s";
    protected $primaryKey='SP1_IQ96_ID';
    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod1','SP1_IQ96','SP1_IQ96_ID');
    }
}
