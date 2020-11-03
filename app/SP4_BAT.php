<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP4_BAT extends Model
{
    protected $table="SP4_BAT";
    protected $primaryKey='SP4_BAT_ID';
    public function StudyPeriod4()
    {
        return $this->belongsTo('App\StudyPeriod4','SP4_BATER','SP4_BAT_ID');
    }
}
