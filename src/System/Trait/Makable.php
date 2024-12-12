<?php

namespace Plugins\Trait;

trait Makable
{

    public static function make(mixed ...$arguments):static
    {
        return new static(...$arguments);
    }
}
