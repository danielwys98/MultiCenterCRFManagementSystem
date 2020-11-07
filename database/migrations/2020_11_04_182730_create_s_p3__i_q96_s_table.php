<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP3IQ96STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP3_IQ96s', function (Blueprint $table) {
            $table->increments('SP3_IQ96_ID');

            $table->boolean('Absent')->nullable();
            $table->boolean('NApplicable')->nullable();
            //date and time for interim questionnaire
            $table->date('dateTaken')->nullable();
            $table->time('timeTaken')->nullable();

            //interim questionnaire
            $table->string('interim96hrs01')->nullable();
            $table->string('interim96hrs02')->nullable();
            $table->string('interim96hrs03')->nullable();
            $table->string('interim96hrs04')->nullable();
            $table->string('interim96hrs05')->nullable();
            $table->string('interim96hrs06')->nullable();
            $table->string('interim96hrs07')->nullable();
            $table->string('interim96hrs08')->nullable();

            //interviewed and checked by
            $table->string('Interim96hrsInterviewedby')->nullable();
            $table->string('Interim96hrsCheckedby')->nullable();

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
        Schema::dropIfExists('SP3_IQ96s');
    }
}
