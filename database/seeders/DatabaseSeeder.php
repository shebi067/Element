<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'demo@elementmusic.com'],
            [
                'name' => 'Aditya Sharma',
                'password' => bcrypt('password123'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'shehbazashraf@outlook.com'],
            [
                'name' => 'Shehbaz Ashraf',
                'password' => bcrypt('1234'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'huzaifasaleem@outlook.com'],
            [
                'name' => 'Huzaifa Saleem',
                'password' => bcrypt('1234'),
            ]
        );
    }
}
