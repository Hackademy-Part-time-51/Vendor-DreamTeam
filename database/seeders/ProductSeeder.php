<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfProducts = 500;
        
        // Get all users or create a default one if none exists
        $users = User::all();
        
        if ($users->isEmpty()) {
            // Create a default user if no users exist
            $user = User::factory()->create();
            $userIds = [$user->id];
        } else {
            $userIds = $users->pluck('id')->toArray();
        }
        
        // Create products and assign them to random users
        Product::factory()->count($numberOfProducts)->create([
            'user_id' => function() use ($userIds) {
                return $userIds[array_rand($userIds)];
            }
        ]);
        
        $this->command->info("Tabella Prodotti popolata con {$numberOfProducts} record usando la Factory!");
    }
}
