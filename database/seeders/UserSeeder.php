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
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin#123'),
            'telephone' => '089567353279',
            'role' => 'Admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Glorious Hermawan',
            'email' => 'glorioushermawan@gmail.com',
            'password' => Hash::make('Glorious#123'),
            'telephone' => '083838382520',
            'role' => 'User'
        ]);

        DB::table('users')->insert([
            'name' => 'Muhammad Ndaru',
            'email' => 'ndarumuhammad@gmail.com',
            'password' => Hash::make('Ndaru#123'),
            'telephone' => '081123456789',
            'role' => 'User'
        ]);
    }
}
