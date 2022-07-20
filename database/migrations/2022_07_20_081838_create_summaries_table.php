<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->Integer('runs_a');
            $table->Integer('wickets_a');
            $table->Integer('overs_a');
            $table->Integer('extras_a');
            $table->Integer('runs_b');
            $table->Integer('wickets_b');
            $table->Integer('overs_b');
            $table->Integer('extras_b');
            $table->string('won_by');
            
            $table->foreign('match_id')->references('id')->on('matches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summaries');
    }
}
