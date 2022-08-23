<?php
namespace Service\Item\Providers;

use Illuminate\Support\ServiceProvider;

class ItemServiceProviders extends ServiceProvider
{
    /**
     * Register Items Providers.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/items_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'Items');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang/', 'Items');
    }

    public function boot()
    {

    }
}
