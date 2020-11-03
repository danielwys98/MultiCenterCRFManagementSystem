<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP4_DQuestionnaire extends Model
{
    protected $table="sp4_dquestionnaires";
    protected $primaryKey='SP4_DQuestionnaire_ID';
    public function StudyPeriod4()
    {
        return $this->belongsTo('App\StudyPeriod4','SP4_DQuestionnaire','SP4_DQuestionnaire_ID');
    }
}
