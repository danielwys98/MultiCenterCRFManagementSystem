<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP3_PDynamicAnalysis extends Model
{
    protected $table="sp3_pdynamicanalysis";
    protected $primaryKey="SP3_PDynamicAnalysis_ID";
    public function StudyPeriod3()
    {
        return $this->belongsTo('App\StudyPeriod3','SP3_PDynamicAnalysis','SP3_PDynamicAnalysis_ID');
    }
}
