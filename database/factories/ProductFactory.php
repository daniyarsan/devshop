<?php

namespace Database\Factories;

use Modules\Catalog\Models\Brand;
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
            'title' => fake()->name(),
            'brand_id' => Brand::query()->inRandomOrder()->value('id'),
            'price' => fake()->numberBetween(1000, 100000),
            'featured' => fake()->boolean,
            'sorting' => fake()->numberBetween(1, 999),
            'thumb' => fake()->file(base_path('/tests/Fixtures/images/products'), storage_path('/app/public/images/products'), false)
        ];
    }
}
