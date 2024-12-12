<?php

namespace Modules\Catalog\ViewModels;

use Illuminate\Support\Facades\Cache;
use Modules\Catalog\Models\Category;
use Plugins\Trait\Makable;

class CategoryViewModel
{

    use Makable;

    public function homePage()
    {
//        return Cache::rememberForever('category_homepage_list', function() {
//            return Category::query()->homePage()->get();
//        });
        return Category::query()->homePage()->get();

    }
}
