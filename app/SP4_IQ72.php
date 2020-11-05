<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP4_IQ72 extends Model
{
    protected $table="sp4_iq72s";
    protected $primaryKey='SP4_IQ72_ID';
    public function StudyPeriod4()
    {
        return $this->belongsTo('App\StudyPeriod4','SP4_IQ72','SP4_IQ72_ID');
    }
}
