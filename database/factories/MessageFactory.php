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
            'sender_id' => User::inRandomOrder()->first()->id, 
            'receiver_id' => User::inRandomOrder()->first()->id, 
            'product_id' => function (array $attributes) {
                
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
