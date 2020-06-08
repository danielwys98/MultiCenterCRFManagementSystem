<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Patient_BodyAndVitalSigns;

class Patient extends Model
{
    protected $fillable=['id'];
    public $primaryKey= 'id';
    public function bodyandvitalsigns()
    {
        return $this->hasOne('App\Patient_BodyAndVitalSigns','patient_id');
    }
}
