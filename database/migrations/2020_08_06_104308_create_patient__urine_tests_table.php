<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientUrineTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_urine_tests', function (Blueprint $table) {
            $table->increments('form_id');
            $table->integer('patient_id');

            //Urine Pregnancy
            $table->boolean('UPreg_male')->nullable();

            $table->date('UPreg_dateTaken')->nullable();
            $table->time('UPreg_TestTime')->nullable();
            $table->time('UPreg_ReadTime')->nullable();

            $table->string('UPreg_Laboratory')->nullable();

            $table->string('UPreg_hCG')->nullable();
            $table->string('UPreg_hCG_Comment')->nullable();
            $table->string('UPreg_Transcribedby')->nullable();

            //Urine Drug
            $table->date('UDrug_dateTaken')->nullable();
            $table->time('UDrug_TestTime')->nullable();
            $table->time('UDrug_ReadTime')->nullable();

            $table->string('UDrug_Laboratory')->nullable();

            $table->string('UDrug_Methamphetamine')->nullable();
            $table->string('UDrug_Methamphetamine_Comment')->nullable();

            $table->string('UDrug_Morphine')->nullable();
            $table->string('UDrug_Morphine_Comment')->nullable();

            $table->string('UDrug_Marijuana')->nullable();
            $table->string('UDrug_Marijuana_Comment')->nullable();
            $table->string('UDrug_Transcribedby')->nullable();

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
        Schema::dropIfExists('patient__urine_tests');
    }
}
