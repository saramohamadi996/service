<?php

use Illuminate\Support\Facades\Route;

/**
 * cities routes.
 */
Route::group(["namespace" => "Order\City\Http\Controllers",
////    'middleware' => ['web', 'auth', 'verified']
], function ($router) {
    $router->get('cities/add/{City}','CityController@add')->name('cities.add');
    $router->get('cities/view/{City}', 'CityController@view')->name('cities.view');
    $router->resource('cities', 'CityController');
});


