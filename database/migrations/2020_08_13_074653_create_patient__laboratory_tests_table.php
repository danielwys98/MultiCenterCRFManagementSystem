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
            $table->string('describemeal')->nullable();
            $table->string('Blood_Laboratory');

            //Blood Repeated Test
            $table->string('Blood_NAtest')->nullable();
            $table->string('Blood_RepeatTest')->nullable();
            $table->date('Repeat_dateBCollected')->nullable();
            $table->string('BloodRepeat_Laboratory')->nullable();

            //Urine
            $table->date('dateUTaken');
            $table->string('Urine_Laboratory');

            //Urine Repeated Test
            $table->string('Urine_NAtest')->nullable();
            $table->string('Urine_RepeatTest')->nullable();
            $table->string('Repeat_dateUCollected')->nullable();
            $table->string('UrineRepeat_Laboratory')->nullable();

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
