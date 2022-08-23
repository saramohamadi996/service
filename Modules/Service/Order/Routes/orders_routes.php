<?php

use Illuminate\Support\Facades\Route;

/**
 * orders routes.
 */
Route::group(["namespace" => "Service\Order\Http\Controllers",
////    'middleware' => ['web', 'auth', 'verified']
], function ($router) {
    $router->get('orders/view/{order}', 'OrderController@view')->name('orders.view');
    $router->patch('orders/{order}/waiting', 'OrderController@waiting')->name('orders.waiting');
    $router->patch('orders/{order}/accept', 'OrderController@accept')->name('orders.accept');
    $router->patch('orders/{order}/reject', 'OrderController@reject')->name('orders.reject');
    $router->resource('orders', 'OrderController');
});


