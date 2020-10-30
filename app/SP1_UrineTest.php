<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP1_UrineTest extends Model
{
    protected $table="sp1_urinetests";
    protected $primaryKey='SP1_UrineTest_ID';
    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod1','SP1_UrineTest','SP1_UrineTest_ID');
    }
}
