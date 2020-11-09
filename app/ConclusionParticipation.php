<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConclusionParticipation extends Model
{
    protected $table="conclusion_participations";
    protected $primaryKey='conclusion_participation_id';

    // public function StudyPeriod1()
    // {
    //     return $this->belongsTo('App\StudyPeriod1','SP1_PDynamicSampling','SP1_PDynamicSampling_ID');
    // }
}
