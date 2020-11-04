<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP4_IQ96 extends Model
{
    protected $table="sp4_iq96s";
    protected $primaryKey='SP4_IQ96_ID';
    public function StudyPeriod4()
    {
        return $this->belongsTo('App\StudyPeriod4','SP4_IQ96','SP4_IQ96_ID');
    }
}
