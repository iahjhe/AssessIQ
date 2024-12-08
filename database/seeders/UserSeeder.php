<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([ [ 'name' => 'Admin', 'email' => 'admin@gmail.com', 'role' => 'admin', 'password' => Hash::make('admin123'), 'created_at' => now(), 'updated_at' => now(), ], [ 'name' => 'Jane Smith', 'email' => 'jane.smith@gmail.com', 'role' => 'teacher', 'password' => Hash::make('teacher123'), 'created_at' => now(), 'updated_at' => now(), ],[ 'name' => 'Jaden Smith', 'email' => 'jaden.smith@gmail.com', 'role' => 'student', 'password' => Hash::make('student123'), 'created_at' => now(), 'updated_at' => now(), ] ]);
    }
}
