<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_BreathAlcoholTestAndElectrocardiogram extends Model
{
    protected $table = 'patient_breath_alcohol_test_and_electrocardiograms';
    protected $fillable=['form_id','patient_id'];
    public function patient()
    {
        return $this->belongsTo('App\Patient','patient_id');
    }
}
