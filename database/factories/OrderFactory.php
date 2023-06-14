<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->sentence(),
            'qty' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->numberBetween(100, 12000),
            'total' => $this->faker->numberBetween(10000,50000),
            'user_id' => rand(1, 10)
        ];
    }
}
