<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP3_AQuestionnaire extends Model
{
    protected $table="sp3_aquestionnaires";
    protected $primaryKey='SP3_AQuestionnaire_ID';

    public function StudyPeriod3(){
        $this->belongsTo('App\StudyPeriod3','SP3_AQuestionnaire','SP3_AQuestionnaire_ID');
    }
}
