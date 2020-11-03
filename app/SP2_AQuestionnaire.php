<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP2_AQuestionnaire extends Model
{
    protected $table="sp2_aquestionnaires";
    protected $primaryKey='SP2_AQuestionnaire_ID';

    public function StudyPeriod2(){
        $this->belongsTo('App\StudyPeriod2','SP2_AQuestionnaire','SP2_AQuestionnaire_ID');
    }
}
