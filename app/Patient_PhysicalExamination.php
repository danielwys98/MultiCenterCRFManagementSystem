<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_PhysicalExamination extends Model
{
    protected $table = 'patient_physical_examinations';
    protected $fillable=['form_id','patient_id'];
    public function patient()
    {
        return $this->belongsTo('App\Patient','patient_id');
    }
}
