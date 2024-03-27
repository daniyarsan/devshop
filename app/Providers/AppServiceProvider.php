<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict(!app()->isProduction());


//        DB:: whenQueryingForLongerThan(500, function (Connection $connection) {
//            logger()
//                ->channel('telegram')->debug('whenQueryingForLongerThan: ' . $connection->query()->toSql());
//        });

//        $this->app->singleton(Generator::class, function() {
//            $faker = Factory::create();
//            $faker->addProvider(new FakerFileProvider($faker));
//            return $faker;
//        });


        if ($this->app->environment('local')) {
            $this->app->register(TelescopeServiceProvider::class);
        }
    }
}
