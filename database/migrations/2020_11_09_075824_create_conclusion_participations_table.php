<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConclusionParticipationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conclusion_participations', function (Blueprint $table) {
            $table->increments('conclusion_participation_id');

            $table->boolean('Pre_Reserve')->nullable();
            $table->boolean('Pre_Yes')->nullable();
            $table->boolean('Pre_SubDecision')->nullable();
            $table->boolean('Pre_PhyDecision')->nullable();
            $table->boolean('Pre_Exclusion')->nullable();
            $table->boolean('Pre_ProtoViolation')->nullable();
            $table->boolean('Pre_Lost')->nullable();
            $table->boolean('Pre_Adverse')->nullable();
            $table->boolean('Pre_Death')->nullable();
            $table->boolean('Pre_others')->nullable();

            $table->boolean('SP1_Yes')->nullable();
            $table->boolean('SP1_SubDecision')->nullable();
            $table->boolean('SP1_PhyDecision')->nullable();
            $table->boolean('SP1_Exclusion')->nullable();
            $table->boolean('SP1_ProtoViolation')->nullable();
            $table->boolean('SP1_Lost')->nullable();
            $table->boolean('SP1_Adverse')->nullable();
            $table->boolean('SP1_Death')->nullable();
            $table->boolean('SP1_others')->nullable();

            $table->boolean('SP2_Yes')->nullable();
            $table->boolean('SP2_SubDecision')->nullable();
            $table->boolean('SP2_PhyDecision')->nullable();
            $table->boolean('SP2_Exclusion')->nullable();
            $table->boolean('SP2_ProtoViolation')->nullable();
            $table->boolean('SP2_Lost')->nullable();
            $table->boolean('SP2_Adverse')->nullable();
            $table->boolean('SP2_Death')->nullable();
            $table->boolean('SP2_others')->nullable();

            $table->boolean('SP3_Yes')->nullable();
            $table->boolean('SP3_SubDecision')->nullable();
            $table->boolean('SP3_PhyDecision')->nullable();
            $table->boolean('SP3_Exclusion')->nullable();
            $table->boolean('SP3_ProtoViolation')->nullable();
            $table->boolean('SP3_Lost')->nullable();
            $table->boolean('SP3_Adverse')->nullable();
            $table->boolean('SP3_Death')->nullable();
            $table->boolean('SP3_others')->nullable();

            $table->boolean('SP4_Yes')->nullable();
            $table->boolean('SP4_SubDecision')->nullable();
            $table->boolean('SP4_PhyDecision')->nullable();
            $table->boolean('SP4_Exclusion')->nullable();
            $table->boolean('SP4_ProtoViolation')->nullable();
            $table->boolean('SP4_Lost')->nullable();
            $table->boolean('SP4_Adverse')->nullable();
            $table->boolean('SP4_Death')->nullable();
            $table->boolean('SP4_others')->nullable();

            $table->boolean('Fol_Yes')->nullable();
            $table->boolean('Fol_SubDecision')->nullable();
            $table->boolean('Fol_PhyDecision')->nullable();
            $table->boolean('Fol_Exclusion')->nullable();
            $table->boolean('Fol_ProtoViolation')->nullable();
            $table->boolean('Fol_Lost')->nullable();
            $table->boolean('Fol_Adverse')->nullable();
            $table->boolean('Fol_Death')->nullable();
            $table->boolean('Fol_others')->nullable();

            $table->text('InvestSign')->nullable();
            $table->text('InvestName')->nullable();
            $table->date('DateTaken')->nullable();

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
        Schema::dropIfExists('conclusion_participations');
    }
}
