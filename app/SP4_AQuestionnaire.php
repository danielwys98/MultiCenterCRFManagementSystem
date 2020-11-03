<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP4_AQuestionnaire extends Model
{
    protected $table="sp4_aquestionnaires";
    protected $primaryKey='SP4_AQuestionnaire_ID';

    public function StudyPeriod4(){
        $this->belongsTo('App\StudyPeriod4','SP4_AQuestionnaire','SP4_AQuestionnaire_ID');
    }
}
