<?php

use App\Menu\Menu;
use App\Menu\MenuItem;

it('it creates MenuItem instance correctly', function () {
    $link = '/test';
    $label = 'Test';

    $menuItem = new MenuItem($link, $label);
    $this->assertEquals($link, $menuItem->link());
    $this->assertEquals($label, $menuItem->label());
});

it('creates menu correctly', function () {
    $menuItem = MenuItem::make('/test', 'Test');
    $menu = Menu::make($menuItem);
    $menuItem2 = MenuItem::make('/test2', 'Test2');
    $this->assertEquals(count($menu->all()), 1);
    $menu->add($menuItem2);
    $this->assertEquals(count($menu->all()), 2);
});

it('removes item correctly', function () {
    $menuItemsArray = [];
    $menuArray = [
        ['link' => '/menu1', 'label' => "Menu1"],
        ['link' => '/menu2', 'label' => "Menu2"],
        ['link' => '/menu3', 'label' => "Menu3"],
    ];
    $menu = Menu::make();

    foreach ($menuArray as $item) {
        $menuItemInstance = MenuItem::make($item['link'], $item['label']);
        $menuItemsArray[] = $menuItemInstance;
        $menu->add($menuItemInstance);
    }

    $this->assertEquals(count($menu->all()), 3);
    $menu->remove($menuItemsArray[0]);
    $this->assertEquals(count($menu->all()), 2);
    $menu->removeByLink($menuItemsArray[1]->link());
    $this->assertEquals(count($menu->all()), 1);
    $this->assertEquals($menu->all()->toArray()[2], $menuItemsArray[2]);
});
