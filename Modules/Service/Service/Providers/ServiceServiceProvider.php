<?php
namespace Service\Service\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register Services Providers.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/service_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'Services');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang/', 'Services');
    }
}
