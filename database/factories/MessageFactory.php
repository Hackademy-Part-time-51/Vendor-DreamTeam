<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

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
            'sender_id' => User::inRandomOrder()->first()->id, // ID dell'utente mittente (puoi modificarlo in base alla tua logica)
            'receiver_id' => User::inRandomOrder()->first()->id, // ID dell'utente destinatario (puoi modificarlo in base alla tua logica)
            'product_id' => function (array $attributes) {
                // Recuperiamo i prodotti del mittente o destinatario
                $products = Product::whereIn('user_id', [
                    $attributes['sender_id'],
                    $attributes['receiver_id']
                ])->get();
                return $products->random()->id;
            },
            'message' => fake()->sentence(), // Contenuto del messaggio
        ];
    }
}
