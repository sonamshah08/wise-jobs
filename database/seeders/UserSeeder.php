<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@wise.com',
                'role' => 'admin',
                'password' => Hash::make('admin@123'), // Ensure passwords are hashed
            ],
            [
                'name' => 'Sonam Shah',
                'email' => 'sonam@wise.com',
                'role' => 'user',
                'password' => Hash::make('user@123'),
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@wise.com',
                'role' => 'user',
                'password' => Hash::make('user@123'),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
