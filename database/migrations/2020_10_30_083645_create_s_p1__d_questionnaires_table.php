<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP1DQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP1_DQuestionnaires', function (Blueprint $table) {
            $table->increments('SP1_DQuestionnaire_ID');

            $table->boolean('Absent')->nullable();
            $table->time('DQtimeTaken')->nullable();

            $table->text('Oriented')->nullable();
            $table->text('ReadyDischarge')->nullable();
            $table->text('AdditionalRemarks')->nullable();

            $table->text('PhysicianSign')->nullable();
            $table->text('PhysicianName')->nullable();

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
        Schema::dropIfExists('SP1_DQuestionnaires');
    }
}
