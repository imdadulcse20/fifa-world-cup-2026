<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Update existing users to admin (if any)
        \App\Models\User::where('role', 'admin')->update(['role' => 'admin']);

        // Create FAQ Manager
        \App\Models\User::updateOrCreate(
            ['email' => 'faq@fwc2026.com'],
            [
                'name' => 'FAQ Manager',
                'password' => \Illuminate\Support\Facades\Hash::make('password123'),
                'role' => 'faq_manager'
            ]
        );

        // Ensure at least one main admin exists
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@fwc2026.com'],
            [
                'name' => 'System Admin',
                'password' => \Illuminate\Support\Facades\Hash::make('password123'),
                'role' => 'admin'
            ]
        );
    }
}
