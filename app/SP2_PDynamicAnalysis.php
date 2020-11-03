<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP2_PDynamicAnalysis extends Model
{
    protected $table="sp2_pdynamicanalysis";
    protected $primaryKey="SP2_PDynamicAnalysis_ID";

    public function StudyPeriod2()
    {
        return $this->belongsTo('App\StudyPeriod2','SP2_PDynamicAnalysis','SP2_PDynamicAnalysis_ID');
    }
}
