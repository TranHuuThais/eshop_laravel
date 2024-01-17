<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order_items>
 */
class Order_itemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'product_id' => 1,
            'order_id' => 1,
            'quantity' => fake()->randomDigit(),
            'price' => fake()->randomDigit()
        ];
    }
}
