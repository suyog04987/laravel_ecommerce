<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        User::create([
            'name' => 'Suyog Gautam',
            'email' => 'suyog@gmail.com',
            'usertype' => '1', // Admin usertype
            'phone' => '+1234567890',
            'address' => '123 Admin Street, Admin City, AC 12345',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        // Create additional users using factory if needed
        User::factory(7)->create();
    }
}
