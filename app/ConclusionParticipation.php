<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConclusionParticipation extends Model
{
    protected $table="conclusion_participations";
    protected $primaryKey='conclusion_participation_id';

    public function PatientStudySpecific()
    {
        return $this->belongsTo('App\PatientStudySpecific','conclusion_participation_id','conclusion_participation_id');
    }
}
