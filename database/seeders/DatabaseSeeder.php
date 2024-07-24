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
                'name' => config('database.admin_user.name'),
                'email' => config('database.admin_user.name'),
                'password' => config('database.admin_user.name'),
            ]);

        // Create fake users
        User::factory(9)
            ->hasPosts(3)
            ->hasChirps(3)
            ->create();
    }
}
