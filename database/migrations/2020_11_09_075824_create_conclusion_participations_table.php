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

            $table->text('Pre_Reserve')->nullable();
            $table->text('Pre_Yes')->nullable();
            $table->text('Pre_SubDecision')->nullable();
            $table->text('Pre_PhyDecision')->nullable();
            $table->text('Pre_Exclusion')->nullable();
            $table->text('Pre_ProtoViolation')->nullable();
            $table->text('Pre_Lost')->nullable();
            $table->text('Pre_Adverse')->nullable();
            $table->text('Pre_Death')->nullable();
            $table->text('Pre_others')->nullable();
            $table->text('Pre_others_text')->nullable();

            $table->text('SP1_Yes')->nullable();
            $table->text('SP1_SubDecision')->nullable();
            $table->text('SP1_PhyDecision')->nullable();
            $table->text('SP1_Exclusion')->nullable();
            $table->text('SP1_ProtoViolation')->nullable();
            $table->text('SP1_Lost')->nullable();
            $table->text('SP1_Adverse')->nullable();
            $table->text('SP1_Death')->nullable();
            $table->text('SP1_others')->nullable();
            $table->text('SP1_others_text')->nullable();

            $table->text('SP2_Yes')->nullable();
            $table->text('SP2_SubDecision')->nullable();
            $table->text('SP2_PhyDecision')->nullable();
            $table->text('SP2_Exclusion')->nullable();
            $table->text('SP2_ProtoViolation')->nullable();
            $table->text('SP2_Lost')->nullable();
            $table->text('SP2_Adverse')->nullable();
            $table->text('SP2_Death')->nullable();
            $table->text('SP2_others')->nullable();
            $table->text('SP2_others_text')->nullable();

            $table->text('SP3_Yes')->nullable();
            $table->text('SP3_SubDecision')->nullable();
            $table->text('SP3_PhyDecision')->nullable();
            $table->text('SP3_Exclusion')->nullable();
            $table->text('SP3_ProtoViolation')->nullable();
            $table->text('SP3_Lost')->nullable();
            $table->text('SP3_Adverse')->nullable();
            $table->text('SP3_Death')->nullable();
            $table->text('SP3_others')->nullable();
            $table->text('SP3_others_text')->nullable();

            $table->text('SP4_Yes')->nullable();
            $table->text('SP4_SubDecision')->nullable();
            $table->text('SP4_PhyDecision')->nullable();
            $table->text('SP4_Exclusion')->nullable();
            $table->text('SP4_ProtoViolation')->nullable();
            $table->text('SP4_Lost')->nullable();
            $table->text('SP4_Adverse')->nullable();
            $table->text('SP4_Death')->nullable();
            $table->text('SP4_others')->nullable();
            $table->text('SP4_others_text')->nullable();

            $table->text('Fol_Yes')->nullable();
            $table->text('Fol_SubDecision')->nullable();
            $table->text('Fol_PhyDecision')->nullable();
            $table->text('Fol_Exclusion')->nullable();
            $table->text('Fol_ProtoViolation')->nullable();
            $table->text('Fol_Lost')->nullable();
            $table->text('Fol_Adverse')->nullable();
            $table->text('Fol_Death')->nullable();
            $table->text('Fol_others')->nullable();
            $table->text('Fol_others_text')->nullable();

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
