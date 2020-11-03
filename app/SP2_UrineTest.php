<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP2_UrineTest extends Model
{
    protected $table="sp2_urinetest";
    protected $primaryKey='SP2_UrineTest_ID';
    public function StudyPeriod2()
    {
        return $this->belongsTo('App\StudyPeriod2','SP2_UrineTest','SP2_UrineTest_ID');
    }
}
