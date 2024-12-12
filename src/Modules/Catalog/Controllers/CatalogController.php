<?php

namespace Modules\Catalog\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Modules\Catalog\Models\Brand;
use Modules\Catalog\Models\Category;
use Modules\Catalog\QueryBuilders\ProductQueryBuilder;
use Modules\Catalog\ViewModels\CategoryViewModel;
use Modules\Catalog\ViewModels\ProductViewModel;

class CatalogController extends Controller
{

    public function index(?Category $category)
    {
        $categories = CategoryViewModel::make()->homePage();
        $brands = Brand::query()->select(['id', 'title'])->has('products')->get();
        $products = Product::query()->catalogPage($category)->get();

        return view('View/index', [
            'category' => $category,
            'categories' => $categories,
            'products' => $products,
            'brands' => $brands,
        ]);
    }

    public function test()
    {
        return 'asdfasdfasfd';
    }
}
