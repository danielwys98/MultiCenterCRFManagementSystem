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
            $table->string('UPreg_male');

            $table->date('UPreg_dateTaken');
            $table->time('UPreg_TestTime');
            $table->time('UPreg_ReadTime');

            $table->string('UPreg_Laboratory');

            $table->string('UPreg_hCG');
            $table->string('UPreg_hCG_Comment');
            $table->string('UPreg_Transcribedby');

            //Urine Drug
            $table->date('UDrug_dateTaken');
            $table->time('UDrug_TestTime');
            $table->time('UDrug_ReadTime');

            $table->string('UDrug_Laboratory');

            $table->string('UDrug_Methamphetamine');
            $table->string('UDrug_Methamphetamine_Comment');

            $table->string('UDrug_Morphine');
            $table->string('UDrug_Morphine_Comment');

            $table->string('UDrug_Marijuana');
            $table->string('UDrug_Marijuana_Comment');
            $table->string('UDrug_Transcribedby');

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
