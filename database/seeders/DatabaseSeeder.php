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
        // Create admin user
        User::factory()
            ->hasPosts(5)
            ->hasChirps(5)
            ->create([
                'name' => env('ADMIN_USER_NAME', 'My Name'),
                'email' => env('ADMIN_USER_MAIL', 'my.name@example.com'),
                'password' => env('ADMIN_USER_PASS', 'password'),
            ]);

        // Create fake users
        User::factory(9)
            ->hasPosts(3)
            ->hasChirps(3)
            ->create();
    }
}
