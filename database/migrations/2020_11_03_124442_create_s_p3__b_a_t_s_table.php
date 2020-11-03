<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP3BATSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP3_BAT', function (Blueprint $table) {
            $table->increments('SP3_BAT_ID');
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
        Schema::dropIfExists('s_p3__b_a_t_s');
    }
}
