<?php

use Illuminate\Support\Facades\Route;

/**
 * states routes.
 */
Route::group(["namespace" => "Order\State\Http\Controllers",
////    'middleware' => ['web', 'auth', 'verified']
], function ($router) {
    $router->resource('states', 'StateController');
});


