<?php

namespace Modules\Catalog\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

abstract class AbstractFilters
{
    abstract public function title(): string;

    abstract public function key(): string;

    abstract public function apply(Builder $query): Builder;

    abstract public function values(): array;

    abstract public function view(): string;

    public function requestValue(string $index = null, mixed $default = null):mixed
    {
        return request('filters.' . $this->key() . ($index ? ".$index" : ""), $default);
    }

    public function name($index = null): string
    {
        return str($this->key())
            ->wrap('[', ']')
            ->prepend('filters')
            ->when($index, fn($str) => $str->append("[$index]"))->value();
    }

    public function id(string $index = null)
    {
        return str($this->name($index))->slug('_')->value();
    }
}
