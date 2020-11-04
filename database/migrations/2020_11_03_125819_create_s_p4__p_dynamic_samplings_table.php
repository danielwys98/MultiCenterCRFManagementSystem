<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP4PDynamicSamplingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP4_PDynamicSamplings', function (Blueprint $table) {
            $table->increments('SP4_PDynamicSampling_ID');

            $table->boolean('NApplicable')->nullable();
            
            $table->date('Day1')->nullable();
            $table->date('Day2')->nullable();

            //PD
            $table->date('PD_Date_Day_1')->nullable();
            $table->time('PD_AST')->nullable();
            $table->text('PD_Collected')->nullable();
            $table->text('PD_Checked')->nullable();
            $table->text('PD_Comments')->nullable();

            //S1
            $table->date('S1_Date_Day_1')->nullable();
            $table->time('S1_SST')->nullable();
            $table->time('S1_AST')->nullable();
            $table->text('S1_Collected')->nullable();
            $table->text('S1_Checked')->nullable();
            $table->text('S1_Comments')->nullable();

            //S2
            $table->date('S2_Date_Day_1')->nullable();
            $table->time('S2_SST')->nullable();
            $table->time('S2_AST')->nullable();
            $table->text('S2_Collected')->nullable();
            $table->text('S2_Checked')->nullable();
            $table->text('S2_Comments')->nullable();

            //S3
            $table->date('S3_Date_Day_1')->nullable();
            $table->time('S3_SST')->nullable();
            $table->time('S3_AST')->nullable();
            $table->text('S3_Collected')->nullable();
            $table->text('S3_Checked')->nullable();
            $table->text('S3_Comments')->nullable();

            //S4
            $table->date('S4_Date_Day_1')->nullable();
            $table->time('S4_SST')->nullable();
            $table->time('S4_AST')->nullable();
            $table->text('S4_Collected')->nullable();
            $table->text('S4_Checked')->nullable();
            $table->text('S4_Comments')->nullable();

            //S5
            $table->date('S5_Date_Day_1')->nullable();
            $table->time('S5_SST')->nullable();
            $table->time('S5_AST')->nullable();
            $table->text('S5_Collected')->nullable();
            $table->text('S5_Checked')->nullable();
            $table->text('S5_Comments')->nullable();

            //S6
            $table->date('S6_Date_Day_1')->nullable();
            $table->time('S6_SST')->nullable();
            $table->time('S6_AST')->nullable();
            $table->text('S6_Collected')->nullable();
            $table->text('S6_Checked')->nullable();
            $table->text('S6_Comments')->nullable();

            //S7
            $table->date('S7_Date_Day_1')->nullable();
            $table->time('S7_SST')->nullable();
            $table->time('S7_AST')->nullable();
            $table->text('S7_Collected')->nullable();
            $table->text('S7_Checked')->nullable();
            $table->text('S7_Comments')->nullable();

            //S8
            $table->date('S8_Date_Day_1')->nullable();
            $table->time('S8_SST')->nullable();
            $table->time('S8_AST')->nullable();
            $table->text('S8_Collected')->nullable();
            $table->text('S8_Checked')->nullable();
            $table->text('S8_Comments')->nullable();

            //S9
            $table->date('S9_Date_Day_2')->nullable();
            $table->time('S9_SST')->nullable();
            $table->time('S9_AST')->nullable();
            $table->text('S9_Collected')->nullable();
            $table->text('S9_Checked')->nullable();
            $table->text('S9_Comments')->nullable();

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
        Schema::dropIfExists('s_p4__p_dynamic_samplings');
    }
}
