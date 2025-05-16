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
    // Seleziona due utenti distinti casuali
    $sender = User::inRandomOrder()->first();
    $receiver = User::where('id', '!=', $sender->id)->inRandomOrder()->first();

    return [
        'sender_id' => $sender->id,
        'receiver_id' => $receiver->id,
        'product_id' => function (array $attributes) {
            $products = Product::where('user_id', $attributes['sender_id'])
                ->orWhere('user_id', $attributes['receiver_id'])
                ->inRandomOrder()
                ->first();

            return $products?->id ?? Product::factory()->create()->id;
        },
        'message' => fake()->sentence(),
    ];
}

}
