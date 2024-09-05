<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'rawan', 'email' => 'rawan@gmail.com', 'password' => '12345'],
            ['name' => 'aya', 'email' => 'aya@gmail.com', 'password' => '123456'],
            ['name' => 'arej', 'email' => 'arej@gmail.com', 'password' => '1234567'],
            ['name' => 'kheder', 'email' => 'kheder@gmail.com', 'password' => '12345678'],
            ['name' => 'majd', 'email' => 'majd@gmail.com', 'password' => '123456789'],
            ['name' => 'mhmd', 'email' => 'mhmd@gmail.com', 'password' => '1234567890'],
            ['name' => 'alaa', 'email' => 'alaa@gmail.com', 'password' => '12341234'],
            ['name' => 'lena', 'email' => 'lena@gmail.com', 'password' => '12345543'],
            ['name' => 'osama', 'email'=> 'osama@gmail.com', 'password' => '3456765'],
];
DB::table('users')->insert($users);
    }
}
