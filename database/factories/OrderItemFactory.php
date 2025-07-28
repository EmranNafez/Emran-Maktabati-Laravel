<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'order_id' => \App\Models\Order::factory(),
        'book_id' => \App\Models\Book::factory(),
        'quantity' => $this->faker->numberBetween(1, 3),
        'price' => $this->faker->randomFloat(2, 5, 100),
        ];
    }
}
