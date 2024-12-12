<?php

namespace Modules\Catalog\ViewModels;

use App\Models\Product;
use Plugins\Trait\Makable;

class ProductViewModel
{
    use Makable;

    public function homePage()
    {
        return Product::query()->homePage()->get();
    }
}
