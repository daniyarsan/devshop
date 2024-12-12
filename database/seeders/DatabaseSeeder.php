<?php

namespace Database\Seeders;

use App\Models\Product;
use Database\Factories\BrandFactory;
use Database\Factories\CategoryFactory;
use Database\Factories\UserFactory;
use Modules\User\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        UserFactory::new()->count(5)->create();
        BrandFactory::new()->count(10) ->create();
        CategoryFactory::new()->count(10)->has(Product::factory(5))->create();
    }
}
