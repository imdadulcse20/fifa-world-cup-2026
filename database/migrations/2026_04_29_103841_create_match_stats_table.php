<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_id')->constrained('matches')->onDelete('cascade');
            
            // Possession
            $table->integer('home_possession')->default(50);
            $table->integer('away_possession')->default(50);
            
            // Shots
            $table->integer('home_shots')->default(0);
            $table->integer('away_shots')->default(0);
            $table->integer('home_shots_on_target')->default(0);
            $table->integer('away_shots_on_target')->default(0);
            
            // Other Stats
            $table->integer('home_corners')->default(0);
            $table->integer('away_corners')->default(0);
            $table->integer('home_fouls')->default(0);
            $table->integer('away_fouls')->default(0);
            $table->integer('home_yellow_cards')->default(0);
            $table->integer('away_yellow_cards')->default(0);
            $table->integer('home_red_cards')->default(0);
            $table->integer('away_red_cards')->default(0);
            $table->integer('home_offsides')->default(0);
            $table->integer('away_offsides')->default(0);
            
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
        Schema::dropIfExists('match_stats');
    }
};
