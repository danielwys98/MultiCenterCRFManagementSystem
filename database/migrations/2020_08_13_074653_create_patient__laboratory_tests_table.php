<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientLaboratoryTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_laboratory_tests', function (Blueprint $table) {
            $table->increments('form_id');
            $table->integer('patient_id');

            //Blood
            $table->date('dateBTaken');
            $table->date('dateLMTaken');
            $table->time('TimeLMTaken');
            $table->string('describemeal');
            $table->string('Blood_Laboratory');

            //Blood Repeated Test
            $table->string('Blood_NAtest');
            $table->string('Blood_RepeatTest');
            $table->date('Repeat_dateBCollected');
            $table->string('BloodRepeat_Laboratory');

            //Urine
            $table->date('dateUTaken');
            $table->string('Urine_Laboratory');

            //Urine Repeated Test
            $table->string('Urine_NAtest');
            $table->string('Urine_RepeatTest');
            $table->string('Repeat_dateUCollected');
            $table->string('UrineRepeat_Laboratory');

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
        Schema::dropIfExists('patient__laboratory_tests');
    }
}
