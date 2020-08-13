<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_LaboratoryTest extends Model
{
    protected $table = 'patient_laboratory_tests';
    protected $fillable=['form_id','patient_id'];
    public function patient()
    {
        return $this->belongsTo('App\Patient','patient_id');
    }
}
