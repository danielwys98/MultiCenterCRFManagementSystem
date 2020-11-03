<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP3_IQ36 extends Model
{
    protected $table="sp3_iq36s";
    protected $primaryKey='SP3_IQ36_ID';
    public function StudyPeriod3()
    {
        return $this->belongsTo('App\StudyPeriod3','SP3_IQ36','SP3_IQ36_ID');
    }
}
