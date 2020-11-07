<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP2PKineticSamplingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP2_PKineticSamplings', function (Blueprint $table) {
            $table->increments('SP2_PKineticSampling_ID');

            $table->boolean('Absent')->nullable();
            //day 1 to day 3 date
            $table->date('Day1')->nullable();
            $table->date('Day3')->nullable();

            //last food intake, last water intake, study drug dosing
            $table->date('LastFoodDate')->nullable();
            $table->date('LastWaterDate')->nullable();
            $table->date('StudyDrugDate')->nullable();
            $table->time('LastFoodTime')->nullable();
            $table->time('LastWaterTime')->nullable();
            $table->time('StudyDrugTime')->nullable();

            //Pharmacokinetic Blood Sampling Sample Code PD
            //Actual Day 1 of Sample Code
            $table->date('pk_Date_Day_PD')->nullable();
            //No SST for Sample Code PD
            $table->time('pk_PD_AST')->nullable();
            $table->text('pk_PD_Collected')->nullable();
            $table->text('pk_PD_Checked')->nullable();
            $table->text('pk_PD_Comments')->nullable();

            $table->date('pk_Date_Day_S1')->nullable();
            $table->time('pk_S1_SST')->nullable();
            $table->time('pk_S1_AST')->nullable();
            $table->text('pk_S1_Collected')->nullable();
            $table->text('pk_S1_Checked')->nullable();
            $table->text('pk_S1_Comments')->nullable();

            $table->date('pk_Date_Day_S2')->nullable();
            $table->time('pk_S2_SST')->nullable();
            $table->time('pk_S2_AST')->nullable();
            $table->text('pk_S2_Collected')->nullable();
            $table->text('pk_S2_Checked')->nullable();
            $table->text('pk_S2_Comments')->nullable();

            $table->date('pk_Date_Day_S3')->nullable();
            $table->time('pk_S3_SST')->nullable();
            $table->time('pk_S3_AST')->nullable();
            $table->text('pk_S3_Collected')->nullable();
            $table->text('pk_S3_Checked')->nullable();
            $table->text('pk_S3_Comments')->nullable();

            $table->date('pk_Date_Day_S4')->nullable();
            $table->time('pk_S4_SST')->nullable();
            $table->time('pk_S4_AST')->nullable();
            $table->text('pk_S4_Collected')->nullable();
            $table->text('pk_S4_Checked')->nullable();
            $table->text('pk_S4_Comments')->nullable();

            $table->date('pk_Date_Day_S5')->nullable();
            $table->time('pk_S5_SST')->nullable();
            $table->time('pk_S5_AST')->nullable();
            $table->text('pk_S5_Collected')->nullable();
            $table->text('pk_S5_Checked')->nullable();
            $table->text('pk_S5_Comments')->nullable();

            $table->date('pk_Date_Day_S6')->nullable();
            $table->time('pk_S6_SST')->nullable();
            $table->time('pk_S6_AST')->nullable();
            $table->text('pk_S6_Collected')->nullable();
            $table->text('pk_S6_Checked')->nullable();
            $table->text('pk_S6_Comments')->nullable();

            $table->date('pk_Date_Day_S7')->nullable();
            $table->time('pk_S7_SST')->nullable();
            $table->time('pk_S7_AST')->nullable();
            $table->text('pk_S7_Collected')->nullable();
            $table->text('pk_S7_Checked')->nullable();
            $table->text('pk_S7_Comments')->nullable();

            $table->date('pk_Date_Day_S8')->nullable();
            $table->time('pk_S8_SST')->nullable();
            $table->time('pk_S8_AST')->nullable();
            $table->text('pk_S8_Collected')->nullable();
            $table->text('pk_S8_Checked')->nullable();
            $table->text('pk_S8_Comments')->nullable();

            $table->date('pk_Date_Day_S9')->nullable();
            $table->time('pk_S9_SST')->nullable();
            $table->time('pk_S9_AST')->nullable();
            $table->text('pk_S9_Collected')->nullable();
            $table->text('pk_S9_Checked')->nullable();
            $table->text('pk_S9_Comments')->nullable();

            $table->date('pk_Date_Day_S10')->nullable();
            $table->time('pk_S10_SST')->nullable();
            $table->time('pk_S10_AST')->nullable();
            $table->text('pk_S10_Collected')->nullable();
            $table->text('pk_S10_Checked')->nullable();
            $table->text('pk_S10_Comments')->nullable();

            $table->date('pk_Date_Day_S11')->nullable();
            $table->time('pk_S11_SST')->nullable();
            $table->time('pk_S11_AST')->nullable();
            $table->text('pk_S11_Collected')->nullable();
            $table->text('pk_S11_Checked')->nullable();
            $table->text('pk_S11_Comments')->nullable();

            $table->date('pk_Date_Day_S12')->nullable();
            $table->time('pk_S12_SST')->nullable();
            $table->time('pk_S12_AST')->nullable();
            $table->text('pk_S12_Collected')->nullable();
            $table->text('pk_S12_Checked')->nullable();
            $table->text('pk_S12_Comments')->nullable();

            $table->date('pk_Date_Day_S13')->nullable();
            $table->time('pk_S13_SST')->nullable();
            $table->time('pk_S13_AST')->nullable();
            $table->text('pk_S13_Collected')->nullable();
            $table->text('pk_S13_Checked')->nullable();
            $table->text('pk_S13_Comments')->nullable();

            $table->date('pk_Date_Day_S14')->nullable();
            $table->time('pk_S14_SST')->nullable();
            $table->time('pk_S14_AST')->nullable();
            $table->text('pk_S14_Collected')->nullable();
            $table->text('pk_S14_Checked')->nullable();
            $table->text('pk_S14_Comments')->nullable();

            $table->date('pk_Date_Day_S15')->nullable();
            $table->time('pk_S15_SST')->nullable();
            $table->time('pk_S15_AST')->nullable();
            $table->text('pk_S15_Collected')->nullable();
            $table->text('pk_S15_Checked')->nullable();
            $table->text('pk_S15_Comments')->nullable();

            $table->date('pk_Date_Day_S16')->nullable();
            $table->time('pk_S16_SST')->nullable();
            $table->time('pk_S16_AST')->nullable();
            $table->text('pk_S16_Collected')->nullable();
            $table->text('pk_S16_Checked')->nullable();
            $table->text('pk_S16_Comments')->nullable();

            $table->date('pk_Date_Day_S17')->nullable();
            $table->time('pk_S17_SST')->nullable();
            $table->time('pk_S17_AST')->nullable();
            $table->text('pk_S17_Collected')->nullable();
            $table->text('pk_S17_Checked')->nullable();
            $table->text('pk_S17_Comments')->nullable();

            $table->date('pk_Date_Day_S18')->nullable();
            $table->time('pk_S18_SST')->nullable();
            $table->time('pk_S18_AST')->nullable();
            $table->text('pk_S18_Collected')->nullable();
            $table->text('pk_S18_Checked')->nullable();
            $table->text('pk_S18_Comments')->nullable();

            //Actual Day 2 of Sample Code
            $table->date('pk_Date_Day_S19')->nullable();
            $table->time('pk_S19_SST')->nullable();
            $table->time('pk_S19_AST')->nullable();
            $table->text('pk_S19_Collected')->nullable();
            $table->text('pk_S19_Checked')->nullable();
            $table->text('pk_S19_Comments')->nullable();

            $table->date('pk_Date_Day_S20')->nullable();
            $table->time('pk_S20_SST')->nullable();
            $table->time('pk_S20_AST')->nullable();
            $table->text('pk_S20_Collected')->nullable();
            $table->text('pk_S20_Checked')->nullable();
            $table->text('pk_S20_Comments')->nullable();

            //Actual Day 3 of Sample Code
            $table->date('pk_Date_Day_S21')->nullable();
            $table->time('pk_S21_SST')->nullable();
            $table->time('pk_S21_AST')->nullable();
            $table->text('pk_S21_Collected')->nullable();
            $table->text('pk_S21_Checked')->nullable();
            $table->text('pk_S21_Comments')->nullable();

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
        Schema::dropIfExists('s_p2__p_kinetic_samplings');
    }
}
