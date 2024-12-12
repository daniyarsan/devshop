<?php

namespace Modules\Catalog\Filters;

use Illuminate\Database\Eloquent\Builder;
use Modules\Catalog\Models\Brand;

class BrandFilter extends AbstractFilters
{

    public function title(): string
    {
        return 'Бренд';
    }

    public function key(): string
    {
        return 'brands';
    }

    public function apply(Builder $query): Builder
    {
        return $query->when(request('filters.brands'), function (Builder $q) {
            $q->whereIn('brand_id', $this->requestValue());
        });
    }

    public function values(): array
    {
        return Brand::query()
            ->select(['id', 'title'])->has('products')->get()->pluck('title', 'id')->toArray();
    }

    public function view(): string
    {
        return 'View.filters.brand';
    }
}
