<?php

use Illuminate\Support\Facades\Route;

/**
 * services routes.
 */
Route::group(['namespace' => 'Service\Service\Http\Controllers',
//    'middleware' => ['web', 'auth', 'verified']
], function ($router) {
    $router->patch('services/{service}/waiting', 'ServiceController@waiting')->name('services.waiting');
    $router->patch('services/{service}/accept', 'ServiceController@accept')->name('services.accept');
    $router->patch('services/{service}/reject', 'ServiceController@reject')->name('services.reject');
    $router->resource('services', 'ServiceController');
});
