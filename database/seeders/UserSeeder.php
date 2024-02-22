<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'GoWork Test',
            'email' => 'test@gowork.com',
            'password' => bcrypt('test1234'),
            'email_verified_at' => now(),
        ]);
    }
}
