<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(100, 12000),
            'old_price' => $this->faker->numberBetween(100, 12000),
            'in_stock' => rand(1, 10),
            'image' => $this->faker->imageUrl(640, 480),
            'category_id' => rand(1, 10)
        ];
    }
}
