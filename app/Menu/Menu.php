<?php

namespace App\Menu;

use Illuminate\Support\Collection;
use Plugins\Trait\Makable;
use Traversable;

class Menu implements \IteratorAggregate
{
    use Makable;

    protected array $items = [];

    public function __construct(MenuItem ...$items)
    {
        $this->items = $items;
    }

    public function add(MenuItem $menuItem)
    {
        $this->items[] = $menuItem;

        return $this;
    }

    public function all()
    {
        return Collection::make($this->items);
    }

    public function remove(MenuItem $menuItem)
    {
        $this->items = $this->all()->filter(fn(MenuItem $item) => $item != $menuItem)->toArray();
    }

    public function removeByLink(string $link)
    {
        $this->items = $this->all()->filter(fn(MenuItem $item) => $item->link() != $link)->toArray();
    }

    public function getIterator(): Traversable
    {
        return $this->all();
    }
}
