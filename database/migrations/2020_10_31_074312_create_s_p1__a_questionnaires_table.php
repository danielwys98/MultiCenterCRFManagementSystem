<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP1AQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp1_AQuestionnaires', function (Blueprint $table) {
            $table->increments('SP1_AQuestionnaire_ID');

            $table->date('AQuestionnaireDateTaken')->nullable();
            $table->time('AQuestionnaireTimeTaken')->nullable();

            $table->text('MedicalProblem')->nullable();
            $table->text('Medication')->nullable();
            $table->text('Hospitalized')->nullable();
            $table->text('AlcoholXanthine')->nullable();
            $table->text('PoppySeeds')->nullable();
            $table->text('GrapefruitPomelo')->nullable();
            $table->text('OtherDrugStudies')->nullable();
            $table->text('BloodDono')->nullable();
            $table->text('Contraception')->nullable();

            $table->text('PhysicianInitial')->nullable();


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
        Schema::dropIfExists('s_p1_a_questionnaires');
    }
}
