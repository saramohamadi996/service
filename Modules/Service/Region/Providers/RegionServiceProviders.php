<?php
namespace Service\Region\Providers;

use Illuminate\Support\ServiceProvider;

class RegionServiceProviders extends ServiceProvider
{
    /**
     * Register Items Providers.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/regions_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'Regions');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang/', 'Regions');
    }

}
