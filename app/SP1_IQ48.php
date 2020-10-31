<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SP1_IQ48 extends Model
{
    protected $table="sp1_iq48s";
    protected $primaryKey='SP1_IQ48_ID';

    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod1', 'SP1_IQ48', 'SP1_IQ48_ID');
    }
}

