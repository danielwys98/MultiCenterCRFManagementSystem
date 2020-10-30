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

            //date for day 1 and 2
            $table->date('Day1')->nullable();
            $table->date('Day2')->nullable();

            $table->date('pda_Date_Daye_PD')->nullable();
            

            $table->date('pda_Date_Daye_PD')->nullable();


            $table->date('pda_Date_Daye_PD')->nullable();


            $table->date('pda_Date_Daye_PD')->nullable();


            $table->date('pda_Date_Daye_PD')->nullable();


            $table->date('pda_Date_Daye_PD')->nullable();


            $table->date('pda_Date_Daye_PD')->nullable();


            $table->date('pda_Date_Daye_PD')->nullable();


            $table->date('pda_Date_Daye_PD')->nullable();


            $table->date('pda_Date_Daye_PD')->nullable();



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
