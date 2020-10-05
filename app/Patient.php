<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Patient_BodyAndVitalSigns;

class Patient extends Model
{
    protected $table = 'patients';
    protected $primaryKey='id';
    protected $fillable=['id'];
    public function bodyandvitalsigns()
    {
        return $this->hasOne('App\Patient_BodyAndVitalSigns','patient_id','id');
    }
    public function BreathAlcoholTestAndElectrocardiogram()
    {
        return $this->hasOne('App\Patient_BreathAlcoholTestAndElectrocardiogram','patient_id','id');
    }
    public function studySpecific()
    {
        return $this->hasOne('App\studySpecific','patient_id','id');
    }
}
