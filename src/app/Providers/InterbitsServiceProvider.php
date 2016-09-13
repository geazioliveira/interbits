<?php

namespace Geazi\Interbits\App\Providers;

use Illuminate\Support\ServiceProvider;

class InterbitsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '../../../resources/views', 'interbits');
        $this->loadMigrationsFrom(__DIR__.'../../../database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__ . '../../../routes/web.php';
        $this->app->make('Geazi\Interbits\App\Http\Controllers\RegisterController');
        $this->app->make('Geazi\Interbits\App\Http\Controllers\FunctionsController');

        $this->publishes([
            __DIR__ . '../../../resources/views' => base_path('resources/views/geazi/interbits'),
            __DIR__.'../../../database/migrations' => base_path('database/migrations'),
        ]);
    }
}
