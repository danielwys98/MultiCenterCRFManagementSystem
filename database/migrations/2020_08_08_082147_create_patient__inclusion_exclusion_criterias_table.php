<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientInclusionExclusionCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_inclusion_exclusion_criterias', function (Blueprint $table) {
            $table->increments('form_id');
            $table->integer('patient_id');

            $table->string('Inclusion01');
            $table->string('Inclusion02');
            $table->string('Inclusion03');
            $table->string('Inclusion04');
            $table->string('Inclusion05');
            $table->string('Exclusion01');
            $table->string('Exclusion02');
            $table->string('Exclusion03');
            $table->string('Exclusion04');
            $table->string('Exclusion05');
            $table->string('Exclusion06');
            $table->string('Exclusion07');
            $table->string('Exclusion08');
            $table->string('Exclusion09');
            $table->string('Exclusion10');
            $table->string('Exclusion11');
            $table->string('Exclusion12');
            $table->string('Exclusion13');
            $table->string('Exclusion14');
            $table->string('Exclusion15');
            $table->string('Exclusion16');
            $table->string('Exclusion17');
            $table->string('Exclusion18');
            $table->string('Exclusion19');
            $table->string('Exclusion20');
            $table->string('Exclusion21');
            $table->string('Exclusion22');
            $table->string('Exclusion23');
            $table->string('Exclusion24');
            $table->string('Exclusion25');
           
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
        Schema::dropIfExists('patient__inclusion_exclusion_criterias');
    }
}
