<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP1_BAT extends Model
{
    protected $table="SP1_BAT";
    protected $primaryKey='SP1_BAT_ID';
    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod1','SP1_BATER','SP1_BAT_ID');
    }
}
