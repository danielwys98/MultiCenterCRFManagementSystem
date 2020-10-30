<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP1_IQ36 extends Model
{
    protected $table="sp1_iq36s";
    protected $primaryKey='SP1_IQ36_ID';
    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod1','SP1_IQ36','SP1_IQ36_ID');
    }
}
