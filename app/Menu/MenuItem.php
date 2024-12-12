<?php

namespace App\Menu;

use Plugins\Trait\Makable;

class MenuItem
{

    use Makable;

    public function __construct(protected string $link, protected string $label)
    {

    }

    public function link()
    {
        return $this->link;
    }

    public function label()
    {
        return $this->label;
    }
}
