<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP3_IQ72 extends Model
{
    protected $table="sp3_iq72s";
    protected $primaryKey='SP3_IQ72_ID';
    public function StudyPeriod3()
    {
        return $this->belongsTo('App\StudyPeriod3','SP3_IQ72','SP3_IQ72_ID');
    }
}
