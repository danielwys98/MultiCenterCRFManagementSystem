<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientPhysicalExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_physical_examinations', function (Blueprint $table) {
            $table->increments('form_id');
            $table->integer('patient_id');
            $table->date('dateTaken');
            $table->string('GeneralAppearance');
            $table->string('Skin');
            $table->string('Head_Neck');
            $table->string('Eyes');
            $table->string('Ears_Nose_Throat');
            $table->string('Mouth');
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
            $table->string('Comments')->nullable();
            $table->string('Comments_txt')->nullable();

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
        Schema::dropIfExists('patient__physical_examinations');
    }
}
