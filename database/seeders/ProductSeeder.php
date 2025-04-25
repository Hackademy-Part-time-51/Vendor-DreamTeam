<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfProducts = 5000; 

        Product::factory()->count($numberOfProducts)->create();

        
        $this->command->info("Tabella Prodotti popolata con {$numberOfProducts} record usando la Factory!");
    }
}
