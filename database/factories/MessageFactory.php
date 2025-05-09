<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Message::class;
    public function definition(): array
    {

        

        return [
            'sender_id' => User::inRandomOrder()->first()->id ?? User::factory(), // ID dell'utente mittente (puoi modificarlo in base alla tua logica)
            'receiver_id' => User::inRandomOrder()->first()->id ?? User::factory(), // ID dell'utente destinatario (puoi modificarlo in base alla tua logica)
            'product_id' => Product::inRandomOrder()->first()->id ?? Product::factory(), // ID del prodotto associato al messaggio (puoi modificarlo in base alla tua logica)
            'message' => fake()->sentence(), // Contenuto del messaggio
        ];
    }
}