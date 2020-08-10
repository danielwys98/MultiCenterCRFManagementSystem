<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_Conclusion_Signature extends Model
{
    protected $table = 'patient_conclusion_signatures';
    protected $fillable=['form_id','patient_id'];
    public function patient()
    {
        return $this->belongsTo('App\Patient','patient_id');
    }
}
