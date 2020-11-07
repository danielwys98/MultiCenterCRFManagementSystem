<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP2UrineTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP2_UrineTest', function (Blueprint $table) {
            $table->increments('SP2_UrineTest_ID');

            //Urine Pregnancy
            $table->boolean('AbsentUPreg')->nullable();
            $table->boolean('UPreg_male')->nullable();
            $table->date('UPreg_dateTaken')->nullable();
            $table->time('UPreg_TestTime')->nullable();
            $table->time('UPreg_ReadTime')->nullable();
            $table->string('UPreg_Laboratory')->nullable();
            $table->string('UPreg_hCG')->nullable();
            $table->string('UPreg_hCG_Comment')->nullable();
            $table->string('UPreg_Transcribedby')->nullable();

             //Urine Drug
             $table->boolean('AbsentUDrug')->nullable();
             $table->boolean('NApplicable')->nullable();
             $table->date('UDrug_dateTaken')->nullable();
             $table->time('UDrug_TestTime')->nullable();
             $table->time('UDrug_ReadTime')->nullable();
             $table->string('UDrug_Laboratory')->nullable();
             $table->string('UDrug_Methamphetamine')->nullable();
             $table->string('UDrug_Methamphetamine_Comment')->nullable();
             $table->string('UDrug_Morphine')->nullable();
             $table->string('UDrug_Morphine_Comment')->nullable();
             $table->string('UDrug_Marijuana')->nullable();
             $table->string('UDrug_Marijuana_Comment')->nullable();
             $table->string('UDrug_Transcribedby')->nullable();
             
             //Conclusion
             $table->boolean('AbsentC')->nullable();
             $table->string('inclusionYesNo')->nullable();
             $table->string('Comments')->nullable();
             $table->string('subjectFit')->nullable();
             $table->string('physicianSign')->nullable();
             $table->string('physicianName')->nullable();

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
        Schema::dropIfExists('s_p2__urine_tests');
    }
}
