<?php

namespace Tests\Feature\Http;

use App\Http\Controllers\HomeController;
use Database\Factories\BrandFactory;
use Database\Factories\CategoryFactory;
use Database\Factories\ProductFactory;
use Modules\Catalog\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


it('loads home page correctly', function () {

    CategoryFactory::new()->count(5)->create([
        'featured' => true,
        'sorting' => 999
    ]);
    CategoryFactory::new()->createOne([
        'featured' => true,
        'sorting' => 1
    ]);

    BrandFactory::new()->count(5)->create([
        'featured' => true,
        'sorting' => 999
    ]);
    BrandFactory::new()->createOne([
        'featured' => true,
        'sorting' => 1
    ]);

    ProductFactory::new()->count(5)->create([
        'featured' => true,
        'sorting' => 999
    ]);
    ProductFactory::new()->createOne([
        'featured' => true,
        'sorting' => 1
    ]);

    $request = $this->get(action([HomeController::class, 'index']))
        ->assertStatus(200)
        ->assertViewIs('home.index');
});
