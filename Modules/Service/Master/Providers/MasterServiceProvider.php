<?php

namespace Service\Master\Providers;

use Illuminate\Support\ServiceProvider;

class MasterServiceProvider extends ServiceProvider
{
    /**
     * Register Master Providers.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__. '/../Routes/master_routes.php');
        $this->loadViewsFrom(__DIR__. '/../Resources/Views', 'Master');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang/', 'Master');

    }
}
