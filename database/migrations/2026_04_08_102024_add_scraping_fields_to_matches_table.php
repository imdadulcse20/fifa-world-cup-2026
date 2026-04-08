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
        Schema::table('matches', function (Blueprint $table) {
            $table->string('external_match_id')->nullable()->after('status');
            $table->string('scraping_url')->nullable()->after('external_match_id');
            $table->boolean('is_scraping_active')->default(false)->after('scraping_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropColumn(['external_match_id', 'scraping_url', 'is_scraping_active']);
        });
    }
};
