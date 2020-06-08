<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Patient_BodyAndVitalSigns;

class Patient extends Model
{
    public function bodyandvitalsigns()
    {
        return $this->hasOne('App\Patient_BodyAndVitalSigns','patient_id','id');
    }
}
