<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_InclusionExclusionCriteria extends Model
{
    protected $table = 'patient_inclusion_exclusion_criterias';
    protected $fillable=['form_id','patient_id'];
    public function patient()
    {
        return $this->belongsTo('App\Patient','patient_id');
    }
}
