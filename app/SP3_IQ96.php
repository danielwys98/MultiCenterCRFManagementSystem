<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP3_IQ96 extends Model
{
    protected $table="sp3_iq96s";
    protected $primaryKey='SP3_IQ96_ID';
    public function StudyPeriod3()
    {
        return $this->belongsTo('App\StudyPeriod3','SP3_IQ96','SP3_IQ96_ID');
    }
}
