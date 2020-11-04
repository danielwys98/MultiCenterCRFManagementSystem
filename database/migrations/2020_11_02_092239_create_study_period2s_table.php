<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyPeriod2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_period2', function (Blueprint $table) {
            $table->increments('SP2_ID');

            $table->bigInteger('SP2_Admission')->unsigned()->nullable();
            $table->bigInteger('SP2_BMVS')->unsigned()->nullable();
            $table->bigInteger('SP2_BATER')->unsigned()->nullable();
            $table->bigInteger('SP2_AQuestionnaire')->unsigned()->nullable();
            $table->bigInteger('SP2_UrineTest')->unsigned()->nullable();
            $table->bigInteger('SP2_PKineticSampling')->unsigned()->nullable();
            $table->bigInteger('SP2_PDynamicSampling')->unsigned()->nullable();
            $table->bigInteger('SP2_PDynamicAnalysis')->unsigned()->nullable();
            $table->bigInteger('SP2_VitalSign')->unsigned()->nullable();
            $table->bigInteger('SP2_Discharge')->unsigned()->nullable();
            $table->bigInteger('SP2_DQuestionnaire')->unsigned()->nullable();
            $table->bigInteger('SP2_IQ36')->unsigned()->nullable();
            $table->bigInteger('SP2_IQ48')->unsigned()->nullable();
            $table->bigInteger('SP2_IQ72')->unsigned()->nullable();
            $table->bigInteger('SP2_IQ96')->unsigned()->nullable();

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
        Schema::dropIfExists('study_period2');
    }
}
