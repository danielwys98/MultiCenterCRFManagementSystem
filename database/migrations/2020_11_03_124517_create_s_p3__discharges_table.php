<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP3DischargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP3_Discharges', function (Blueprint $table) {
            $table->increments('SP3_Discharge_ID');

            $table->boolean('Absent')->nullable();
            $table->date('DischargeDate')->nullable();

            $table->text('UnscheduledDischarge')->nullable();

            $table->time('Sitting_ReadingTime')->nullable();
            $table->text('Sitting_BP_S')->nullable();
            $table->text('Sitting_BP_D')->nullable();
            $table->integer('Sitting_HR')->nullable();
            $table->integer('Sitting_RespiratoryRate')->nullable();

            $table->text('SittingRepeat')->nullable();

            $table->time('SittingRepeat_ReadingTime')->nullable();
            $table->text('SittingRepeat_BP_S')->nullable();
            $table->text('SittingRepeat_BP_D')->nullable();
            $table->integer('SittingRepeat_HR')->nullable();
            $table->integer('SittingRepeat_RespiratoryRate')->nullable();

            $table->text('Initial')->nullable();
            $table->text('Comment')->nullable();

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
        Schema::dropIfExists('s_p3__discharges');
    }
}
