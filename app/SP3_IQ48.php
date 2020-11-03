<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP3_IQ48 extends Model
{
    protected $table="sp3_iq48s";
    protected $primaryKey='SP3_IQ48_ID';
    public function StudyPeriod3()
    {
        return $this->belongsTo('App\StudyPeriod3', 'SP3_IQ48', 'SP3_IQ48_ID');
    }
}
