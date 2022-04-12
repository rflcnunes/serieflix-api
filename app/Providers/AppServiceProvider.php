<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\SeriesRepositoryInterface',
            'App\Repositories\Eloquent\SeriesRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\HistoricRepositoryInterface',
            'App\Repositories\Eloquent\HistoricRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
