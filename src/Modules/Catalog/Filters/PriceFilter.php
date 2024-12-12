<?php

namespace Modules\Catalog\Filters;

use Illuminate\Database\Eloquent\Builder;

class PriceFilter extends AbstractFilters
{

    public function title(): string
    {
        return 'Цена';
    }

    public function key(): string
    {
        return 'price';
    }

    public function apply(Builder $query): Builder
    {
        return $query->when(request('filters.price'), function (Builder $q) {
            $q->whereBetween('price', [
                $this->requestValue('from', 0),
                $this->requestValue('to', 100000)
            ]);
        });
    }

    public function values(): array
    {
        // TODO: Implement values() method.
    }

    public function view(): string
    {
        return 'View.filters.price';
    }
}
