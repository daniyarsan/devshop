<?php

namespace App\Composers;

use App\Menu\Menu;
use App\Menu\MenuItem;
use Illuminate\View\View;

class NavigationComposer
{

    public function compose(View $view):void
    {
        $menu = Menu::make()->add(MenuItem::make('/test', 'Test'));

        $view->with('menu', $menu);
    }

}
