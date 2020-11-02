<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP2AdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP2_Admissions', function (Blueprint $table) {
            $table->increments('SP2_Admission_ID');
            $table->date('AdmissionDateTaken')->nullable();
            $table->time('AdmissionTimeTaken')->nullable();
            $table->date('ConsentDateTaken')->nullable();
            $table->time('ConsentTimeTaken')->nullable();
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
        Schema::dropIfExists('SP2_Admissions');
    }
}
