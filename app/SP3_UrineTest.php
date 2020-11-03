<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP3_UrineTest extends Model
{
    protected $table="sp3_urinetest";
    protected $primaryKey='SP3_UrineTest_ID';
    public function StudyPeriod3()
    {
        return $this->belongsTo('App\StudyPeriod3','SP3_UrineTest','SP3_UrineTest_ID');
    }
}
