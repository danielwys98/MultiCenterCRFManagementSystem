<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_BodyAndVitalSigns extends Model
{
    protected $table = 'patient_body_and_vital_signs';
    protected $fillable=['form_id'];
    public function patient()
    {
        return $this->belongsTo('App\Patient','patient_id','id');
    }
}
