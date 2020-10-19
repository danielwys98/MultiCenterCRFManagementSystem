<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientStudySpecificsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_study_specifics', function (Blueprint $table) {
            $table->increments('patientSS_ID');

            $table->bigInteger('study_id')->unsigned()->nullable();
            $table->bigInteger('patient_id')->unsigned()->nullable();
            $table->bigInteger('SP1_ID')->unsigned()->nullable();
            $table->bigInteger('SP2_ID')->unsigned()->nullable();
            $table->bigInteger('SP3_ID')->unsigned()->nullable();
            $table->bigInteger('SP4_ID')->unsigned()->nullable();
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
        Schema::dropIfExists('patient_study_specifics');
    }
}
