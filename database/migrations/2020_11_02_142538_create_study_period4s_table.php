<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyPeriod4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_period4', function (Blueprint $table) {
            $table->increments('SP4_ID');

            $table->bigInteger('SP4_Admission')->unsigned()->nullable();
            $table->bigInteger('SP4_BMVS')->unsigned()->nullable();
            $table->bigInteger('SP4_BATER')->unsigned()->nullable();
            $table->bigInteger('SP4_AQuestionnaire')->unsigned()->nullable();
            $table->bigInteger('SP4_UrineTest')->unsigned()->nullable();
            $table->bigInteger('SP4_PKineticSampling')->unsigned()->nullable();
            $table->bigInteger('SP4_PDynamicSampling')->unsigned()->nullable();
            $table->bigInteger('SP4_PDynamicAnalysis')->unsigned()->nullable();
            $table->bigInteger('SP4_VitalSign')->unsigned()->nullable();
            $table->bigInteger('SP4_Discharge')->unsigned()->nullable();
            $table->bigInteger('SP4_DQuestionnaire')->unsigned()->nullable();
            $table->bigInteger('SP4_IQ36')->unsigned()->nullable();
            $table->bigInteger('SP4_IQ48')->unsigned()->nullable();

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
        Schema::dropIfExists('study_period4');
    }
}
