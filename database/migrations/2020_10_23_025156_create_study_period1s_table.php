<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyPeriod1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_period1', function (Blueprint $table) {
            $table->increments('SP1_ID');

            $table->bigInteger('SP1_Admission')->unsigned()->nullable();
            $table->bigInteger('SP1_BMVS')->unsigned()->nullable();
            $table->bigInteger('SP1_BATER')->unsigned()->nullable();
            $table->bigInteger('SP1_AQuestionnaire')->unsigned()->nullable();
            $table->bigInteger('SP1_UrineTest')->unsigned()->nullable();
            $table->bigInteger('SP1_PKineticSampling')->unsigned()->nullable();
            $table->bigInteger('SP1_PDynamicSampling')->unsigned()->nullable();
            $table->bigInteger('SP1_PDynamicAnalysis')->unsigned()->nullable();
            $table->bigInteger('SP1_Discharge')->unsigned()->nullable();
            $table->bigInteger('SP1_DQuestionnaire')->unsigned()->nullable();
            $table->bigInteger('SP1_IQ36')->unsigned()->nullable();
            $table->bigInteger('SP1_IQ48')->unsigned()->nullable();

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
        Schema::dropIfExists('study_period1s');
    }
}
