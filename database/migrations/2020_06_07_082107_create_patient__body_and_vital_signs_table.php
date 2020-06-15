<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientBodyAndVitalSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_body_and_vital_signs', function (Blueprint $table) {
            $table->increments('form_id');
            $table->integer('patient_id');
            $table->date('dateTaken');
            $table->time('timeTaken');
            $table->integer('weight');
            $table->integer('height');
            $table->integer('bmi');
            $table->integer('temperature');
            $table->integer('Supine_ReadingTime');
            $table->integer('Supine_BP');
            $table->integer('Supine_HR');
            $table->integer('Supine_RespiratoryRate');
            $table->integer('Sitting_ReadingTime');
            $table->integer('Sitting_BP');
            $table->integer('Sitting_HR');
            $table->integer('Sitting_RespiratoryRate');
            $table->integer('Standing_ReadingTime');
            $table->integer('Standing_BP');
            $table->integer('Standing_HR');
            $table->integer('Standing_RespiratoryRate');
            $table->string('Initial');
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
        Schema::dropIfExists('patient__body_and_vital_signs');
    }
}
