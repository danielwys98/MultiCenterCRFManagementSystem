<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientSerologyTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_serology_tests', function (Blueprint $table) {
            $table->increments('form_id');
            $table->integer('patient_id');

            $table->date('dateCTaken');
            $table->date('dateBCollected');
            $table->string('Laboratory');
           
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
        Schema::dropIfExists('patient__serology__tests');
    }
}
