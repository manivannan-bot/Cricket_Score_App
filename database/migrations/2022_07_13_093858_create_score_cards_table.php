<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('player_id');
            $table->Integer('runs');
            $table->Integer('balls');
            $table->Integer('fours');
            $table->Integer('sixes');
            $table->float('strike_rate');
            $table->enum('dismissed_status',['OUT','NOT OUT']);
            $table->Integer('overs');
            $table->Integer('maidens');
            $table->Integer('runs_conceded');
            $table->Integer('wickets');
            $table->float('economy');
            
            $table->foreign('match_id')->references('id')->on('matches');
            $table->foreign('player_id')->references('id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('score_cards');
    }
}
