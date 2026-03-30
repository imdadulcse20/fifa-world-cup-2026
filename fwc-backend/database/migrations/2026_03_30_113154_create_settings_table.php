<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // Seed default settings
        DB::table('settings')->insert([
            ['key' => 'app_name', 'value' => 'FIFA World Cup 2026'],
            ['key' => 'portal_description', 'value' => 'The ultimate mobile experience for the 2026 World Cup in USA, Canada, and Mexico.'],
            ['key' => 'footer_text', 'value' => '© 2026 FIFA World Cup Official Fan App'],
            ['key' => 'primary_color', 'value' => '#0ea5e9'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
