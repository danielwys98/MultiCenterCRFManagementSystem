<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP3_DQuestionnaire extends Model
{
    protected $table="sp3_dquestionnaires";
    protected $primaryKey='SP3_DQuestionnaire_ID';
    public function StudyPeriod3()
    {
        return $this->belongsTo('App\StudyPeriod3','SP3_DQuestionnaire','SP3_DQuestionnaire_ID');
    }
}
