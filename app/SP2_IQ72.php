<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP2_IQ72 extends Model
{
    protected $table="sp2_iq72s";
    protected $primaryKey='SP2_IQ72_ID';
    public function StudyPeriod2()
    {
        return $this->belongsTo('App\StudyPeriod2','SP2_IQ72','SP2_IQ72_ID');
    }
}
