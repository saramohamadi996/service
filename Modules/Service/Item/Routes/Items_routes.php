<?php

use Illuminate\Support\Facades\Route;

/**
 * items routes.
 */
Route::group(["namespace" => "Order\Item\Http\Controllers",
////    'middleware' => ['web', 'auth', 'verified']
], function ($router) {
    $router->get('items/add/{Item}','ItemController@add')->name('items.add');
    $router->get('items/view/{Item}', 'ItemController@view')->name('items.view');
    $router->resource('items', 'ItemController');
});


