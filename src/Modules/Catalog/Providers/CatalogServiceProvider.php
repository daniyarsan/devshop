<?php

namespace Modules\Catalog\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Catalog\Filters\BrandFilter;
use Modules\Catalog\Filters\FilterManager;
use Modules\Catalog\Filters\PriceFilter;
use Modules\User\Providers\ActionServiceProvider;

class CatalogServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(FilterManager::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        (app(FilterManager::class))->registerFilters([
            new PriceFilter(),
            new BrandFilter(),
        ]);
    }



}
