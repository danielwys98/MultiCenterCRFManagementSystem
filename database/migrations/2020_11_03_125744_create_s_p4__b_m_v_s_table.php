<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP4BMVSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP4_BMVS', function (Blueprint $table) {
            $table->increments('SP4_BMVS_ID');
            $table->date('dateTaken')->nullable();
            $table->time('timeTaken')->nullable();
            $table->decimal('weight')->nullable();
            $table->decimal('height')->nullable();
            $table->decimal('bmi')->nullable();
            $table->decimal('temperature')->nullable();
            $table->time('Supine_ReadingTime')->nullable();
            $table->integer('Supine_BP')->nullable();
            $table->integer('Supine_HR')->nullable();
            $table->integer('Supine_RespiratoryRate')->nullable();
            $table->time('Sitting_ReadingTime')->nullable();
            $table->integer('Sitting_BP')->nullable();
            $table->integer('Sitting_HR')->nullable();
            $table->integer('Sitting_RespiratoryRate')->nullable();
            $table->time('Sitting_ReadingTime_Repeat1')->nullable();
            $table->integer('Sitting_BP_Repeat1')->nullable();
            $table->integer('Sitting_HR_Repeat1')->nullable();
            $table->integer('Sitting_RespiratoryRate_Repeat1')->nullable();
            $table->time('Sitting_ReadingTime_Repeat2')->nullable();
            $table->integer('Sitting_BP_Repeat2')->nullable();
            $table->integer('Sitting_HR_Repeat2')->nullable();
            $table->integer('Sitting_RespiratoryRate_Repeat2')->nullable();
            $table->string('Initial')->nullable();
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
        Schema::dropIfExists('s_p4__b_m_v_s');
    }
}
