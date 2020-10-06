<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Patient_BodyAndVitalSigns;

class Patient extends Model
{
    protected $table = 'patients';
    protected $primaryKey='id';
    protected $fillable=['id'];
    public function bodyandvitalsigns(){
        return $this->hasOne('App\Patient_BodyAndVitalSigns','patient_id','id');
    }
    public function BreathAlcoholTestAndElectrocardiogram(){
        return $this->hasOne('App\Patient_BreathAlcoholTestAndElectrocardiogram','patient_id','id');
    }
    public function MedicalHistory(){
        return $this->hasOne('App\Patient_MedicalHistory','patient_id','id');
    }
    public function PhysicalExam(){
        return $this->hasOne('App\Patient_PhysicalExamination','patient_id','id');
    }
    public function UrineTest(){
        return $this->hasOne('App\Patient_UrineTest', 'patient_id', 'id');
    }
    public function LabTest(){
        return $this->hasOne('App\Patient_LaboratoryTest', 'patient_id', 'id');
    }
    public function SerologyTest(){
        return $this->hasOne('App\Patient_Serology_Test', 'patient_id', 'id');
    }
    public function InclusionExclusion(){
        return $this->hasOne('App\Patient_InclusionExclusionCriteria', 'patient_id', 'id');
    }
    public function Conclu(){
        return $this->hasOne('App\Patient_Conclusion_Signature', 'patient_id', 'id');
    }

}
