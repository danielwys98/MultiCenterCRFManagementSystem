<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateTaken');
            $table->time('timeTaken');
            $table->string('NRIC');
            $table->string('name');
            $table->string('Gender');
            $table->string('Ethnicity');
            $table->date('DoB');
            $table->integer('age');
            $table->string('maritalstatus');
            $table->string('MRNno');
            $table->rememberToken();
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
        Schema::dropIfExists('patients');
    }
}
