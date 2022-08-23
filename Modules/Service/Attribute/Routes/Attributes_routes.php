<?php

use Illuminate\Support\Facades\Route;

/**
 * attributes routes.
 */
Route::group(['namespace' => 'Service\Attribute\Http\Controllers',
//    'middleware' => ['web', 'auth', 'verified']
], function ($router) {
    $router->resource('attributes', 'AttributeController');
});
