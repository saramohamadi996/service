<?php

use Illuminate\Support\Facades\Route;

/**
 * regions routes.
 */
Route::group(["namespace" => "Order\Region\Http\Controllers",
////    'middleware' => ['web', 'auth', 'verified']
], function ($router) {
    $router->get('regions/add/{Region}','RegionController@add')->name('regions.add');
    $router->get('regions/view/{Region}', 'RegionController@view')->name('regions.view');
    $router->resource('regions', 'RegionController');
});


