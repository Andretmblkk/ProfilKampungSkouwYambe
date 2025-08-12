<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user with professional password
        if (!User::where('email', 'admin@kampungskouwyambe.id')->exists()) {
            User::create([
                'name' => 'Administrator Kampung',
                'email' => 'admin@kampungskouwyambe.id',
                'password' => Hash::make('KampungSkouw2024!'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]);
        }

        // Create backup admin user
        if (!User::where('email', 'admin@skouwyambe.com')->exists()) {
            User::create([
                'name' => 'Admin Backup',
                'email' => 'admin@skouwyambe.com',
                'password' => Hash::make('SkouwYambe2024!'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]);
        }
    }
}
