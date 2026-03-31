<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@fwc2026.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
        ]);

        $this->call(WorldCupSeeder::class);
    }
}
