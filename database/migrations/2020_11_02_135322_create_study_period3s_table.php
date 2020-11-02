<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyPeriod3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_period3', function (Blueprint $table) {
            $table->increments('SP3_ID');

            $table->bigInteger('SP3_Admission')->unsigned()->nullable();
            $table->bigInteger('SP3_BMVS')->unsigned()->nullable();
            $table->bigInteger('SP3_BATER')->unsigned()->nullable();
            $table->bigInteger('SP3_AQuestionnaire')->unsigned()->nullable();
            $table->bigInteger('SP3_UrineTest')->unsigned()->nullable();
            $table->bigInteger('SP3_PKineticSampling')->unsigned()->nullable();
            $table->bigInteger('SP3_PDynamicSampling')->unsigned()->nullable();
            $table->bigInteger('SP3_PDynamicAnalysis')->unsigned()->nullable();
            $table->bigInteger('SP3_VitalSign')->unsigned()->nullable();
            $table->bigInteger('SP3_Discharge')->unsigned()->nullable();
            $table->bigInteger('SP3_DQuestionnaire')->unsigned()->nullable();
            $table->bigInteger('SP3_IQ36')->unsigned()->nullable();
            $table->bigInteger('SP3_IQ48')->unsigned()->nullable();

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
        Schema::dropIfExists('study_period3');
    }
}
