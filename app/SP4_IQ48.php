<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP4_IQ48 extends Model
{
    protected $table="sp4_iq48s";
    protected $primaryKey='SP4_IQ48_ID';
    public function StudyPeriod4()
    {
        return $this->belongsTo('App\StudyPeriod4', 'SP4_IQ48', 'SP4_IQ48_ID');
    }
}
