<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientBreathAlcoholTestAndElectrocardiogramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_breath_alcohol_test_and_electrocardiograms', function (Blueprint $table) {
            $table->increments('form_id');
            $table->integer('patient_id');
            $table->date('dateTaken');
            $table->time('timeTaken');
            $table->string('laboratory');
            $table->decimal('breathalcohol');
            $table->string('breathalcoholResult');
            $table->string('Usertranscribed');
            //ECG starts from here
            $table->date('ECGdateTaken');
            $table->string('conclusion');
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
        Schema::dropIfExists('patient__breath_alcohol_test_and_electrocardiograms');
    }
}
