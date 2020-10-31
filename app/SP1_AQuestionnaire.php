<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP1_AQuestionnaire extends Model
{
    protected $table="sp1_";
    protected $primaryKey='SP1_AQuestionnaire_ID';
    public function StudyPeriod1(){
        $this->belongsTo('App\StudyPeriod1','SP1_AQuestionnaire','SP1_AQuestionnaire_ID');
    }
}
