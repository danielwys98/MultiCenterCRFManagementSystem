<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowUpQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_up_questionnaires', function (Blueprint $table) {
            $table->increments('FollowUpQuestionnaire_ID');
            $table->date('FollowUpDateTaken')->nullable();
            $table->time('AdmissionTimeTaken')->nullable();
            $table->text('MedicalProblem')->nullable();
            $table->text('Medication')->nullable();
            $table->text('Hospitalized')->nullable();
            $table->text('otherDrugStudies')->nullable();
            $table->text('PhysicianInitial')->nullable();
            $table->text('Comment')->nullable();
            $table->text('physicianSign')->nullable();
            $table->text('physicianName')->nullable();
            $table->date('FollowUpDateTaken')->nullable();

            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follow_up_questionnaires');
    }
}
