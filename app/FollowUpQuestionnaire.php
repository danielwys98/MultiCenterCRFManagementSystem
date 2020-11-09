<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowUpQuestionnaire extends Model
{
    protected $table = 'follow_up_questionnaires';
    protected $primaryKey='FollowUpQuestionnaire_ID';

    public function PatientStudySpecific()
    {
        return $this->belongsTo('App\PatientStudySpecific','FollowUpQuestionnaire_ID','FollowUpQuestionnaire_ID');
    }
}
