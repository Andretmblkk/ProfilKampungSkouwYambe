<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed user admin minimal jika belum ada
        if (!User::where('email', 'admin@kampung.test')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@kampung.test',
                'password' => 'admin12345',
                'is_admin' => true,
            ]);
        }

        $this->call([
            DataPendudukSeeder::class,
        ]);
    }
}
