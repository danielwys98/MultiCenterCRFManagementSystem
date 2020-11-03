<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP4_UrineTest extends Model
{
    protected $table="sp4_urinetest";
    protected $primaryKey='SP4_UrineTest_ID';
    public function StudyPeriod4()
    {
        return $this->belongsTo('App\StudyPeriod4','SP4_UrineTest','SP4_UrineTest_ID');
    }
}
