<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Image;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{protected $model = Image::class;

    public function definition(): array
    {
        // Crea un nome file univoco
        $filename = Str::uuid() . '.jpg';
        $storagePath = 'public/products/' . $filename;

        // Scarica l'immagine da Lorem Picsum
        $response = Http::get('https://picsum.photos/500/500');

        // Verifica che la richiesta abbia avuto successo
        if ($response->successful()) {
            Storage::put($storagePath, $response->body());

            return [
                'path' => Storage::url($storagePath), // genera /storage/products/xxxx.jpg
                // 'product_id' sarà passato dal seeder
            ];
        }

        return [
            'path' => null,
            // 'product_id' sarebbe passato dal seeder
        ];
    }
}
