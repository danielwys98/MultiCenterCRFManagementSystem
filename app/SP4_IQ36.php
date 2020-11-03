<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP4_IQ36 extends Model
{
    protected $table="sp4_iq36s";
    protected $primaryKey='SP4_IQ36_ID';
    public function StudyPeriod4()
    {
        return $this->belongsTo('App\StudyPeriod4','SP4_IQ36','SP4_IQ36_ID');
    }
}
