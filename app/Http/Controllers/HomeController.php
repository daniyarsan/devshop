<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Modules\Catalog\Models\Brand;
use Modules\Catalog\Models\Category;
use Modules\Catalog\ViewModels\CategoryViewModel;

class HomeController extends Controller
{

    public function index()
    {
        $categories = CategoryViewModel::make()->homePage();
        $brands = Brand::query()->homePage()->get();
        $products = Product::query()->homePage()->get();

        return view('home/index', compact('categories', 'brands', 'products'));
    }

}
