<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP3IQ72STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP3_IQ72s', function (Blueprint $table) {
            $table->increments('SP3_IQ72_ID');

            $table->boolean('Absent')->nullable();
            $table->boolean('NApplicable')->nullable();
            //date and time for interim questionnaire
            $table->date('dateTaken')->nullable();
            $table->time('timeTaken')->nullable();

            //interim questionnaire
            $table->string('interim72hrs01')->nullable();
            $table->string('interim72hrs02')->nullable();
            $table->string('interim72hrs03')->nullable();
            $table->string('interim72hrs04')->nullable();
            $table->string('interim72hrs05')->nullable();
            $table->string('interim72hrs06')->nullable();
            $table->string('interim72hrs07')->nullable();
            $table->string('interim72hrs08')->nullable();

            //interviewed and checked by
            $table->string('Interim72hrsInterviewedby')->nullable();
            $table->string('Interim72hrsCheckedby')->nullable();

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
        Schema::dropIfExists('SP3_IQ72s');
    }
}
