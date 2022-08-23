<?php

namespace Service\Order\Providers;

use Illuminate\Support\ServiceProvider;

class OrderServiceProviders extends ServiceProvider
{
    /**
     * Register Items Providers.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/orders_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'Orders');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang/', 'Orders');
    }
}
