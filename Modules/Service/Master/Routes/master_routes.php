<?php

use Illuminate\Support\Facades\Route;

/**
 * master routes.
 */
Route::group(['namespace' => 'Service\Master\Http\Controllers',
//    'middleware' => ['web', 'auth', 'verified']
], function ($router) {$router->get('/master', 'MasterController@master')->name('master');});
