<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Demo users
        User::create([
            'name' => 'Alice Student',
            'email' => 'alice@student.com',
            'password' => bcrypt('password'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Bob Teacher',
            'email' => 'bob@teacher.com',
            'password' => bcrypt('password'),
            'role' => 'teacher',
        ]);
    }
}
