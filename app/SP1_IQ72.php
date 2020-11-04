<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP1_IQ72 extends Model
{
    protected $table="sp1_iq72s";
    protected $primaryKey='SP1_IQ72_ID';
    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod1','SP1_IQ72','SP1_IQ72_ID');
    }
}
