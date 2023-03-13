<?php

namespace Database\Factories;

use App\Models\ProductCategory;
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
        return [
            'category_id' => ProductCategory::factory(),
            'stock' => rand(0, 100),
            'name' => fake()->words(3, true),
            'description' => fake()->paragraphs(3, true),
            'identifier' => fake()->unique()->ean13(),
            'price' => fake()->randomFloat(1, 10, 500),
            'details' => json_encode([
                fake()->word() => fake()->words(3, true),
                fake()->word() => fake()->words(3, true),
                fake()->word() => fake()->words(3, true),
            ])
        ];
    }
}
