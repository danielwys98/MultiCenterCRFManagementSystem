<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP2VitalSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP2_VitalSigns', function (Blueprint $table) {
            $table->increments('SP2_VitalSign_ID');

            $table->boolean('Absent')->nullable();
            //TPD=Time Pose Dose

            //Time Pose Dose 1hr
            $table->date('TPD_1_Date')->nullable();
            $table->time('TPD_1_ReadingTime')->nullable();
            $table->text('TPD_1_SittingBP_S')->nullable();
            $table->text('TPD_1_SittingBP_D')->nullable();
            $table->text('TPD_1_Pulse')->nullable();
            $table->text('TPD_1_Respiration')->nullable();
            $table->text('TPD_1_TakenBy')->nullable();

            $table->date('TPD_2_Date')->nullable();
            $table->time('TPD_2_ReadingTime')->nullable();
            $table->text('TPD_2_SittingBP_S')->nullable();
            $table->text('TPD_2_SittingBP_D')->nullable();
            $table->text('TPD_2_Pulse')->nullable();
            $table->text('TPD_2_Respiration')->nullable();
            $table->text('TPD_2_TakenBy')->nullable();

            $table->date('TPD_5_Date')->nullable();
            $table->time('TPD_5_ReadingTime')->nullable();
            $table->text('TPD_5_SittingBP_S')->nullable();
            $table->text('TPD_5_SittingBP_D')->nullable();
            $table->text('TPD_5_Pulse')->nullable();
            $table->text('TPD_5_Respiration')->nullable();
            $table->text('TPD_5_TakenBy')->nullable();

            $table->date('TPD_8_Date')->nullable();
            $table->time('TPD_8_ReadingTime')->nullable();
            $table->text('TPD_8_SittingBP_S')->nullable();
            $table->text('TPD_8_SittingBP_D')->nullable();
            $table->text('TPD_8_Pulse')->nullable();
            $table->text('TPD_8_Respiration')->nullable();
            $table->text('TPD_8_TakenBy')->nullable();

            $table->date('TPD_12_Date')->nullable();
            $table->time('TPD_12_ReadingTime')->nullable();
            $table->text('TPD_12_SittingBP_S')->nullable();
            $table->text('TPD_12_SittingBP_D')->nullable();
            $table->text('TPD_12_Pulse')->nullable();
            $table->text('TPD_12_Respiration')->nullable();
            $table->text('TPD_12_TakenBy')->nullable();

            $table->date('TPD_24_Date')->nullable();

            $table->date('TPD_36_Date')->nullable();
            $table->time('TPD_36_ReadingTime')->nullable();
            $table->text('TPD_36_SittingBP_S')->nullable();
            $table->text('TPD_36_SittingBP_D')->nullable();
            $table->text('TPD_36_Pulse')->nullable();
            $table->text('TPD_36_Respiration')->nullable();
            $table->text('TPD_36_TakenBy')->nullable();

            $table->date('TPD_48_Date')->nullable();
            $table->time('TPD_48_ReadingTime')->nullable();
            $table->text('TPD_48_SittingBP_S')->nullable();
            $table->text('TPD_48_SittingBP_D')->nullable();
            $table->text('TPD_48_Pulse')->nullable();
            $table->text('TPD_48_Respiration')->nullable();
            $table->text('TPD_48_TakenBy')->nullable();



            //For Repeat/Extra Vital Signs
            $table->date('Extra1_Date')->nullable();
            $table->text('Extra1_TPD')->nullable();
            $table->time('Extra1_ReadingTime')->nullable();
            $table->text('Extra1_SittingBP_S')->nullable();
            $table->text('Extra1_SittingBP_D')->nullable();
            $table->text('Extra1_Pulse')->nullable();
            $table->text('Extra1_Respiration')->nullable();
            $table->text('Extra1_TakenBy')->nullable();

            $table->date('Extra2_Date')->nullable();
            $table->text('Extra2_TPD')->nullable();
            $table->time('Extra2_ReadingTime')->nullable();
            $table->text('Extra2_SittingBP_S')->nullable();
            $table->text('Extra2_SittingBP_D')->nullable();
            $table->text('Extra2_Pulse')->nullable();
            $table->text('Extra2_Respiration')->nullable();
            $table->text('Extra2_TakenBy')->nullable();

            $table->date('Extra3_Date')->nullable();
            $table->text('Extra3_TPD')->nullable();
            $table->time('Extra3_ReadingTime')->nullable();
            $table->text('Extra3_SittingBP_S')->nullable();
            $table->text('Extra3_SittingBP_D')->nullable();
            $table->text('Extra3_Pulse')->nullable();
            $table->text('Extra3_Respiration')->nullable();
            $table->text('Extra3_TakenBy')->nullable();

            $table->date('Extra4_Date')->nullable();
            $table->text('Extra4_TPD')->nullable();
            $table->time('Extra4_ReadingTime')->nullable();
            $table->text('Extra4_SittingBP_S')->nullable();
            $table->text('Extra4_SittingBP_D')->nullable();
            $table->text('Extra4_Pulse')->nullable();
            $table->text('Extra4_Respiration')->nullable();
            $table->text('Extra4_TakenBy')->nullable();

            $table->date('Extra5_Date')->nullable();
            $table->text('Extra5_TPD')->nullable();
            $table->time('Extra5_ReadingTime')->nullable();
            $table->text('Extra5_SittingBP_S')->nullable();
            $table->text('Extra5_SittingBP_D')->nullable();
            $table->text('Extra5_Pulse')->nullable();
            $table->text('Extra5_Respiration')->nullable();
            $table->text('Extra5_TakenBy')->nullable();

            $table->date('Extra6_Date')->nullable();
            $table->text('Extra6_TPD')->nullable();
            $table->time('Extra6_ReadingTime')->nullable();
            $table->text('Extra6_SittingBP_S')->nullable();
            $table->text('Extra6_SittingBP_D')->nullable();
            $table->text('Extra6_Pulse')->nullable();
            $table->text('Extra6_Respiration')->nullable();
            $table->text('Extra6_TakenBy')->nullable();

            $table->date('Extra7_Date')->nullable();
            $table->text('Extra7_TPD')->nullable();
            $table->time('Extra7_ReadingTime')->nullable();
            $table->text('Extra7_SittingBP_S')->nullable();
            $table->text('Extra7_SittingBP_D')->nullable();
            $table->text('Extra7_Pulse')->nullable();
            $table->text('Extra7_Respiration')->nullable();
            $table->text('Extra7_TakenBy')->nullable();

            $table->date('Extra8_Date')->nullable();
            $table->text('Extra8_TPD')->nullable();
            $table->time('Extra8_ReadingTime')->nullable();
            $table->text('Extra8_SittingBP_S')->nullable();
            $table->text('Extra8_SittingBP_D')->nullable();
            $table->text('Extra8_Pulse')->nullable();
            $table->text('Extra8_Respiration')->nullable();
            $table->text('Extra8_TakenBy')->nullable();

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
        Schema::dropIfExists('s_p2__vital_signs');
    }
}
