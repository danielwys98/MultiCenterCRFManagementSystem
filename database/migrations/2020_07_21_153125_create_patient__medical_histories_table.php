<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_medical_histories', function (Blueprint $table) {
            $table->increments('form_id');
            $table->integer('patient_id');
            $table->date('dateTaken');
            $table->time('timeTaken');
            $table->string('Allergy');
            $table->string('EENT');
            $table->string('Respiratory');
            $table->string('Cardiovascular');
            $table->string('Gastrointestinal');
            $table->string('Genitourinary');
            $table->string('Neurological');
            $table->string('HaematopoieticL');
            $table->string('EndocrineM');
            $table->string('Dermatological');
            $table->string('Musculoskeletal');
            $table->string('Psychological');
            $table->string('FamilyHistory');
            $table->string('SurgicalHistory');
            $table->string('PrevHospitalization');
            $table->string('Smoker');
            $table->string('Smoker_txt');
            $table->string('RAI');
            $table->string('RAI_txt');
            $table->string('RMS');
            $table->string('RMS_txt');
            $table->string('RegularExercise');
            $table->string('RegularExercise_txt');
            $table->string('BloodDonations');
            $table->string('BloodDonations_txt');
            $table->string('RegularPeriods');
            $table->string('RegularPeriods_txt');
            $table->string('ActiveSexAct');
            $table->string('FertilityControl');
            $table->string('FertilityControlcounseling');
            $table->string('Breastfeeding');
            $table->string('Conclusion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient__medical_histories');
    }
}
