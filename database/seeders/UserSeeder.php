<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'first_name' => 'Admin',
                'last_name' => 'Login',
                'email' => 'admin@gmail.com',
                'phone' => '+36 70 111 1111',
                'role' => 'admin',
                'status' => 'active',
                'password' => Hash::make('Alma1234'),
                'newsletter' => 0,
            ],
            [
                'username' => 'leader',
                'first_name' => 'Leader',
                'last_name' => 'Login',
                'email' => 'leader@gmail.com',
                'phone' => '+36 70 111 2222',
                'role' => 'leader',
                'status' => 'active',
                'password' => Hash::make('Alma1234'),
                'newsletter' => 0,
            ],
            [
                'username' => 'agent',
                'first_name' => 'Agent',
                'last_name' => 'Login',
                'email' => 'agent@gmail.com',
                'phone' => '+36 70 111 3333',
                'role' => 'agent',
                'status' => 'active',
                'password' => Hash::make('Alma1234'),
                'newsletter' => 0,
            ],
            [
                'username' => 'customer',
                'first_name' => 'Customer',
                'last_name' => 'Login',
                'email' => 'customer@gmail.com',
                'phone' => '+36 70 111 4444',
                'role' => 'customer',
                'status' => 'active',
                'password' => Hash::make('Alma1234'),
                'newsletter' => 0,
            ]
        ]);
    }
}
