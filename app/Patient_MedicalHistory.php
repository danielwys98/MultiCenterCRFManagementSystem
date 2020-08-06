<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_MedicalHistory extends Model
{
    protected $table = 'patient_medical_histories';
    protected $fillable=['form_id','patient_id'];
    public function patient()
    {
        return $this->belongsTo('App\Patient','patient_id');
    }
}
