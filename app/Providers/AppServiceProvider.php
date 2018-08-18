<?php

namespace App\Providers;

use App\Contracts\Routing\YUrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $url = $this->app['url'];
        $this->app->singleton('url', function () use ($url) {
            return new YUrlGenerator($url);
        });
    }
}
