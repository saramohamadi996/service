<?php

namespace Service\State\Providers;
use Illuminate\Support\ServiceProvider;

class StateServiceProviders extends ServiceProvider
{
    /**
     * Register Items Providers.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/states_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'States');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang/', 'States');
    }
}
