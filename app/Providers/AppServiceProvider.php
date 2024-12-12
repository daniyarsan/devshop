<?php

namespace App\Providers;

use App\Composers\NavigationComposer;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        foreach (File::directories(app_path('../src/Modules')) as $moduleDir) {
            View::addLocation($moduleDir);
        }

        Model::shouldBeStrict(!app()->isProduction());

//        DB:: whenQueryingForLongerThan(500, function (Connection $connection) {
//            logger()
//                ->channel('telegram')->debug('whenQueryingForLongerThan: ' . $connection->query()->toSql());
//        });



        Vite::macro('image', fn (string $asset) => $this->asset("resources/images/{$asset}"));
        if ($this->app->environment('local')) {
            $this->app->register(TelescopeServiceProvider::class);
        }

        View::composer('*', NavigationComposer::class);
    }
}
