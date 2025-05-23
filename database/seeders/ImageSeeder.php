<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $products = Product::all();

        foreach ($products as $product) {
            Image::factory()
                ->count(3)
                ->create([
                    'product_id' => $product->id,
                ]);
        }
    }
}
