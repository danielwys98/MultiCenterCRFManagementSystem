<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP2BATSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP2_BAT', function (Blueprint $table) {
            $table->increments('SP2_BAT_ID');
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
        Schema::dropIfExists('s_p2__b_a_t_s');
    }
}
