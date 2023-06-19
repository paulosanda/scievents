<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'is_admin' => true,
            'password' => '123',
       ]);
    }
}