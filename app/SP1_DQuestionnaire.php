<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP1_UrineTest extends Model
{
    protected $table="sp1_dquestionnaires";
    protected $primaryKey='SP1_DQuestionnaire_ID';
    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod1','SP1_DQuestionnaire','SP1_DQuestionnaire_ID');
    }
}
