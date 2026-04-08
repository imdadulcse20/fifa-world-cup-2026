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
        Schema::table('match_events', function (Blueprint $table) {
            $table->string('player_name')->nullable()->after('player_id'); // Store name directly for scraped data
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('match_events', function (Blueprint $table) {
            $table->dropColumn('player_name');
        });
    }
};
