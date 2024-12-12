<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Plugins\ValueObjects\Price;

class PriceCast implements CastsAttributes
{

    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return Price::make($value);
    }


    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if ($value instanceof Price) {
            return $value->raw();
        }

        return $value;
    }
}
