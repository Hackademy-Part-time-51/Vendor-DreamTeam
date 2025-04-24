<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $categoryIds = Category::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        return [
            'title' => substr(fake()->sentence(3), 0, 20),
            'price' => fake()->randomFloat(2, 5, 1000),
            'description' => fake()->paragraph(3),
            'category_id' => fake()->randomElement($categoryIds),
            'user_id' => fake()->randomElement($userIds), // <-- Assegna un user_id casuale
        ];
    }
}
