<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_UrineTest extends Model
{
    protected $table = 'patient_urine_tests';
    protected $fillable=['form_id','patient_id'];
    public function patient()
    {
        return $this->belongsTo('App\Patient','patient_id');
    }
}
