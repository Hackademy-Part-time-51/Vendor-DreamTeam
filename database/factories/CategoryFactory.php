<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;
    public function definition(): array
    {
        $categories = [
            'Abbigliamento',
            'Scarpe',
            'Borse e Accessori',
            'Elettronica',
            'Libri e Riviste',
            'Casa e Cucina',
            'Sport e Tempo Libero',
            'Bellezza e Cura Personale',
            'Gioielli e Orologi',
            'Fai da Te e Giardinaggio',
            'Informatica',
            'Giochi e Giocattoli',
            'Auto e Moto',
        ];

        return [
            'name' => fake()->unique()->randomElement($categories),
        ];
    }
}
