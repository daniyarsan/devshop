<?php

use Plugins\ValueObjects\Price;

it('price object creates successfully', function () {

    $priceObj = Price::make(10000);
    $this->assertInstanceOf(Price::class, $priceObj);
    $this->assertEquals(100, $priceObj->value());
    $this->assertEquals(10000, $priceObj->raw());
    $this->assertEquals('RUB', $priceObj->currency());
    $this->assertEquals('₽', $priceObj->symbol());
    $this->assertEquals('100,00 ₽', (string) $priceObj);

    $this->expectException(\InvalidArgumentException::class);

    Price::make(-1000);
    Price::make(10000, 'ABC');

});
