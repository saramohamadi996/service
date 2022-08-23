<?php
namespace Service\City\Providers;

use Illuminate\Support\ServiceProvider;

class CityServiceProviders extends ServiceProvider
{
    /**
     * Register Cities Providers.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/cities_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'Cities');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang/', 'Cities');
    }

    public function boot()
    {

    }
}
