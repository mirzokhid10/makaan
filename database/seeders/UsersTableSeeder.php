<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('users')->insert([
            // Admin
            [
                'name'=> 'Admin',
                'username'=> 'admin',
                'email'=> 'admin@example.com',
                'email_verified_at' => Carbon::now(),
                'password'=> Hash::make('111'),
                'phone' => random_int(100000000, 999999999),
                'role'=> 'admin',
                'status'=> 'active',
                'description' => $faker->paragraph,
                'city'=>'Tashkent',
                'state' => 'Chilanzar'
            ],
            // Agent
            [
                'name'=> 'Agent',
                'username'=> 'agent',
                'email'=> 'agent@example.com',
                'email_verified_at' => Carbon::now(),
                'password'=> Hash::make('111'),
                'phone' => random_int(100000000, 999999999),
                'role'=> 'agent',
                'status'=> 'active',
                'description' => $faker->paragraph,
                'city'=>'Tashkent',
                'state' => 'Chilanzar'
            ],
            // User
            [
                'name'=> 'User',
                'username'=> 'user',
                'email'=> 'user@example.com',
                'email_verified_at' => Carbon::now(),
                'password'=> Hash::make('111'),
                'phone' => random_int(100000000, 999999999),
                'role'=> 'user',
                'status'=> 'active',
                'description' => $faker->paragraph,
                'city'=>'Tashkent',
                'state' => 'Chilanzar'
            ],
        ]);
    }
}
