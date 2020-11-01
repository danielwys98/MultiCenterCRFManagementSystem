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
            $table->text('MP_IncreaseRisk')->nullable();
            $table->text('MP_InfluencePKinetic')->nullable();

            $table->text('Medication')->nullable();
            $table->text('Medi_IncreaseRisk')->nullable();
            $table->text('Medi_InfluencePKinetic')->nullable();

            $table->text('Hospitalized')->nullable();
            $table->text('H_IncreaseRisk')->nullable();
            $table->text('H_InfluencePKinetic')->nullable();

            $table->text('AlcoholXanthine')->nullable();
            $table->text('AX_InfluencePKinetic')->nullable();

            $table->text('PoppySeeds')->nullable();
            $table->text('PS_InfluencePKinetic')->nullable();

            $table->text('GrapefruitPomelo')->nullable();
            $table->text('Grapefruit_InfluencePKinetic')->nullable();

            $table->text('OtherDrugStudies')->nullable();
            $table->text('Other_IncreaseRisk')->nullable();
            $table->text('Other_InfluencePKinetic')->nullable();

            $table->text('BloodDono')->nullable();
            $table->text('Blood_IncreaseRisk')->nullable();

            $table->text('Contraception')->nullable();
            $table->text('Contraception_IncreaseRisk')->nullable();

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
