<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP3_BAT extends Model
{
    protected $table="SP3_BAT";
    protected $primaryKey='SP3_BAT_ID';
    public function StudyPeriod3()
    {
        return $this->belongsTo('App\StudyPeriod3','SP3_BATER','SP3_BAT_ID');
    }
}
