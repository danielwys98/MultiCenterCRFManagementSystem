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
            $table->string('UPreg_Transcribedby');

            //Urine Drug
            $table->string('UDrug_dateTaken');
            $table->string('UDrug_TestTime');
            $table->string('Chest_Lungs');
            $table->string('Heart');
            $table->string('Abdomen');
            $table->string('Back_Spine');
            $table->string('Musculoskeletal');
            $table->string('Neurological');
            $table->string('Extremities');
            $table->string('Lymph_Nodes');
            $table->string('Other');
            $table->string('Cubital_Fossa_Veins');
            $table->string('Comments');
            $table->string('Comments_Physically_Healthy');
            $table->string('Comments_Otherwise');

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
