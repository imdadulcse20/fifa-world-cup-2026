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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('home_team_id')->nullable()->constrained('teams')->onDelete('cascade');
            $table->foreignId('away_team_id')->nullable()->constrained('teams')->onDelete('cascade');
            $table->string('home_team_placeholder')->nullable();
            $table->string('away_team_placeholder')->nullable();
            $table->foreignId('stadium_id')->constrained('stadiums')->onDelete('cascade');
            $table->dateTime('match_date_utc');
            $table->string('status')->default('upcoming'); // upcoming, live, finished
            $table->integer('home_score')->default(0);
            $table->integer('away_score')->default(0);
            $table->string('stage')->default('Group Stage'); // Group Stage, Round of 16, etc.
            $table->string('group_name')->nullable();
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
        Schema::dropIfExists('matches');
    }
};
