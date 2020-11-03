<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP2_IQ36 extends Model
{
    protected $table="sp2_iq36s";
    protected $primaryKey='SP2_IQ36_ID';
    public function StudyPeriod2()
    {
        return $this->belongsTo('App\StudyPeriod2','SP2_IQ36','SP2_IQ36_ID');
    }
}
