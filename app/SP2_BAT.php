<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP2_BAT extends Model
{
    protected $table="SP2_BAT";
    protected $primaryKey='SP2_BAT_ID';
    public function StudyPeriod2()
    {
        return $this->belongsTo('App\StudyPeriod2','SP2_BATER','SP2_BAT_ID');
    }
}
