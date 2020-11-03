<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP2_DQuestionnaire extends Model
{
    protected $table="sp2_dquestionnaires";
    protected $primaryKey='SP2_DQuestionnaire_ID';
    public function StudyPeriod2()
    {
        return $this->belongsTo('App\StudyPeriod2','SP2_DQuestionnaire','SP2_DQuestionnaire_ID');
    }
}
