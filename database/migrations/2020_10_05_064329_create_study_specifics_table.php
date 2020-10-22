<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudySpecificsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_specifics', function (Blueprint $table) {
            $table->increments('study_id');
            $table->string('study_name');
            $table->integer('patient_Count');
            $table->integer('studyPeriod_Count');
            $table->time('timeTaken');
            $table->date('dateTaken');
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
        Schema::dropIfExists('study_specifics');
    }
}
