<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP1PDynamicAnalysisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP1_PDynamicAnalysis', function (Blueprint $table) {
            $table->increments('SP1_PDynamicAnalysis_ID');

            //date for day 1 and 2 of the study
            $table->date('Day1')->nullable();
            $table->date('Day2')->nullable();


            //Columns for PD Analysis starts here:
            $table->date('pda_Date_Day_PD')->nullable();
            $table->text('pda_PD_Result')->nullable();
            $table->text('pda_PD_Conducted')->nullable();
            $table->text('pda_PD_Checked')->nullable();
            $table->text('pda_PD_Comments')->nullable();



            $table->date('pda_Date_Day_S1')->nullable();
            $table->time('pda_S1_Time')->nullable();
            $table->text('pda_S1_Result')->nullable();
            $table->text('pda_S1_Conducted')->nullable();
            $table->text('pda_S1_Checked')->nullable();
            $table->text('pda_S1_Comments')->nullable();



            $table->date('pda_Date_Day_S2')->nullable();
            $table->time('pda_S2_Time')->nullable();
            $table->text('pda_S2_Result')->nullable();
            $table->text('pda_S2_Conducted')->nullable();
            $table->text('pda_S2_Checked')->nullable();
            $table->text('pda_S2_Comments')->nullable();



            $table->date('pda_Date_Day_S3')->nullable();
            $table->time('pda_S3_Time')->nullable();
            $table->text('pda_S3_Result')->nullable();
            $table->text('pda_S3_Conducted')->nullable();
            $table->text('pda_S3_Checked')->nullable();
            $table->text('pda_S3_Comments')->nullable();



            $table->date('pda_Date_Day_S4')->nullable();
            $table->time('pda_S4_Time')->nullable();
            $table->text('pda_S4_Result')->nullable();
            $table->text('pda_S4_Conducted')->nullable();
            $table->text('pda_S4_Checked')->nullable();
            $table->text('pda_S4_Comments')->nullable();



            $table->date('pda_Date_Day_S5')->nullable();
            $table->time('pda_S5_Time')->nullable();
            $table->text('pda_S5_Result')->nullable();
            $table->text('pda_S5_Conducted')->nullable();
            $table->text('pda_S5_Checked')->nullable();
            $table->text('pda_S5_Comments')->nullable();



            $table->date('pda_Date_Day_S6')->nullable();
            $table->time('pda_S6_Time')->nullable();
            $table->text('pda_S6_Result')->nullable();
            $table->text('pda_S6_Conducted')->nullable();
            $table->text('pda_S6_Checked')->nullable();
            $table->text('pda_S6_Comments')->nullable();



            $table->date('pda_Date_Day_S7')->nullable();
            $table->time('pda_S7_Time')->nullable();
            $table->text('pda_S7_Result')->nullable();
            $table->text('pda_S7_Conducted')->nullable();
            $table->text('pda_S7_Checked')->nullable();
            $table->text('pda_S7_Comments')->nullable();



            $table->date('pda_Date_Day_S8')->nullable();
            $table->time('pda_S8_Time')->nullable();
            $table->text('pda_S8_Result')->nullable();
            $table->text('pda_S8_Conducted')->nullable();
            $table->text('pda_S8_Checked')->nullable();
            $table->text('pda_S8_Comments')->nullable();



            $table->date('pda_Date_Day_S9')->nullable();
            $table->time('pda_S9_Time')->nullable();
            $table->text('pda_S9_Result')->nullable();
            $table->text('pda_S9_Conducted')->nullable();
            $table->text('pda_S9_Checked')->nullable();
            $table->text('pda_S9_Comments')->nullable();


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
        Schema::dropIfExists('s_p1__p_dynamic_analyses');
    }
}
