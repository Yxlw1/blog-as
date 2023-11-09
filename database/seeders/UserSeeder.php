<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Yolwi Linares',
            'email' => 'yolwilinares@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Xpc$7620'),
            'remember_token' => Str::random(10),
        ])->assignRole('Admin');

        // User::factory(10)->create();
    }
}
