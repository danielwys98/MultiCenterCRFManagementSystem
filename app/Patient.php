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
}
