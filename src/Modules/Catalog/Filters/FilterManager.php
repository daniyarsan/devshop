<?php

namespace Modules\Catalog\Filters;

use Illuminate\Database\Eloquent\Builder;

class FilterManager
{

    public function __construct(protected array $items = []) {}

    public function registerFilters(array $items)
    {
        $this->items = $items;
    }

    public function items():array
    {
        return $this->items;
    }

}
