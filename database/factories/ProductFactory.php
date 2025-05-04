<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $json = Storage::disk('public')->get('comuni.json');

        $comuni=json_decode($json);
        return [
            'title' => fake()->words(3, true),
            'price' => fake()->randomFloat(2, 10, 1000),
            'description' => fake()->paragraph(),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'is_accepted' => fake()->randomElement([1, 0, null]),
            'city' => $comuni[fake()->randomElement(array_keys($comuni))]->denominazione_ita,
            'latitudine' => $comuni[fake()->randomElement(array_keys($comuni))]->lat,
            'longitudine' => $comuni[fake()->randomElement(array_keys($comuni))]->lon
        ];
    }
}
