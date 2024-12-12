<?php

namespace Database\Factories;

use Modules\Catalog\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Catalog\Models\Brand>
 */
class BrandFactory extends Factory
{

    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'featured' => fake()->boolean,
            'sorting' => fake()->numberBetween(1, 999),
            'thumb' => fake()->file(base_path('/tests/Fixtures/images/brands'), storage_path('/app/public/images/brands'), false)
        ];
    }
}
