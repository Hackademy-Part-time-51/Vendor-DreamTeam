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
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com', 
        // ]);

        $numberOfUsers = 25; 
        // 25 utenti test
        User::factory()->count($numberOfUsers)->create();
        // 4 utenti admin e revisori
        // User::factory()->create([
        //     'name' => fake()->name(), 
        //     'email' => fake()->unique()->safeEmail(), 
        //     'email_verified_at' => now(),  
        //     'password' => static::$password ??= Hash::make('password'),  
        //     'gender' => fake()->randomElement(['male', 'female', 'other', null]),
        //     'phone' => fake()->optional()->e164PhoneNumber(),  
        //     'profile_image' => 'null', 
        //     'remember_token' => Str::random(10), 
        // ]);
    }
}
