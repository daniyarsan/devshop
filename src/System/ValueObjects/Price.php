<?php

namespace Plugins\ValueObjects;

use \InvalidArgumentException;
use Plugins\Trait\Makable;
use Stringable;

class Price implements Stringable
{
    use Makable;

    private array $currencies = [
        'RUB' => '₽'
    ];

    public function __construct(protected $value, private readonly string $currency = 'RUB', private readonly int $precision = 100)
    {
        if ($value < 0) {
            throw new InvalidArgumentException('Value cannot be null');
        }

        if (!isset($this->currencies[$this->currency])) {
            throw new InvalidArgumentException('No such currency available in database');
        }
    }

    public function raw(): float|int
    {
        return $this->value;
    }


    public function value(): float|int
    {
        return $this->value / $this->precision;
    }

    public function currency()
    {
        return $this->currency;
    }

    public function symbol()
    {
        return $this->currencies[$this->currency];
    }

    public function __toString(): string
    {
        return number_format($this->value(), 2, ',', ' ') . ' ' . $this->symbol();
    }
}
