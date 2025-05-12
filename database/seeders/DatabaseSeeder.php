<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //  User::factory(500)->create();
        
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
<<<<<<< HEAD
            // UserSeeder::class,
            CategorySeeder::class,
=======
            //  UserSeeder::class,
            //  CategorySeeder::class,
>>>>>>> 3613d210c8320796c36ca753479d33c76a69df94
            // ProductSeeder::class,
            // MessageSeeder::class,
        ]);
    }
}
