<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP4_PDynamicAnalysis extends Model
{
    protected $table="sp4_pdynamicanalysis";
    protected $primaryKey="SP4_PDynamicAnalysis_ID";
    public function StudyPeriod4()
    {
        return $this->belongsTo('App\StudyPeriod4','SP4_PDynamicAnalysis','SP4_PDynamicAnalysis_ID');
    }
}
