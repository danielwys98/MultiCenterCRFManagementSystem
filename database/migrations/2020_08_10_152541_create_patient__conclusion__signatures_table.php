<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientConclusionSignaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_conclusion_signatures', function (Blueprint $table) {
            $table->increments('form_id');
            $table->integer('patient_id');

            $table->string('inclusionYesNo');
            // $table->string('NoDetails');
            $table->string('NAbnormality');
            $table->string('abnormality');
            $table->string('physicianSign');
            $table->string('physicianName');
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
        Schema::dropIfExists('patient__conclusion_signatures');
    }
}
