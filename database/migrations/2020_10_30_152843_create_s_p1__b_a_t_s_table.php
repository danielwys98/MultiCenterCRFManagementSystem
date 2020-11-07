<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP1BATSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP1_BAT', function (Blueprint $table) {
            $table->increments('SP1_BAT_ID');

            $table->boolean('Absent')->nullable();
            $table->boolean('NApplicable')->nullable();
            $table->date('dateTaken')->nullable();
            $table->time('timeTaken')->nullable();
            $table->string('laboratory')->nullable();
            $table->decimal('breathalcohol')->nullable();
            $table->string('breathalcoholResult')->nullable();
            $table->string('Usertranscribed')->nullable();
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
        Schema::dropIfExists('SP1_BAT');
    }
}
