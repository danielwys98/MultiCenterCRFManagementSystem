<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP3IQ36STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP3_IQ36s', function (Blueprint $table) {
            $table->increments('SP3_IQ36_ID');

            $table->boolean('Absent')->nullable();
            $table->boolean('NApplicable')->nullable();
            //date and time for interim questionnaire
            $table->date('dateTaken')->nullable();
            $table->time('timeTaken')->nullable();

            //interim questionnaire
            $table->string('interim36hrs01')->nullable();
            $table->string('interim36hrs02')->nullable();
            $table->string('interim36hrs03')->nullable();
            $table->string('interim36hrs04')->nullable();
            $table->string('interim36hrs05')->nullable();
            $table->string('interim36hrs06')->nullable();
            $table->string('interim36hrs07')->nullable();
            $table->string('interim36hrs08')->nullable();

            //interviewed and checked by
            $table->string('Interim36hrsInterviewedby')->nullable();
            $table->string('Interim36hrsCheckedby')->nullable();

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
        Schema::dropIfExists('SP3_IQ36s');
    }
}
