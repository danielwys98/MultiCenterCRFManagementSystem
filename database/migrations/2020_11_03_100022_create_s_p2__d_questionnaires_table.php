<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP2DQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP2_DQuestionnaires', function (Blueprint $table) {
            $table->increments('SP2_DQuestionnaire_ID');
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
        Schema::dropIfExists('s_p2__d_questionnaires');
    }
}
