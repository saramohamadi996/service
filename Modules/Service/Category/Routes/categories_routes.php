<?php
use Illuminate\Support\Facades\Route;

/**
 * categories routes.
 */
Route::group(["namespace" => "Service\Category\Http\Controllers",
////    'middleware' => ['web', 'auth', 'verified']
], function ($router) {
    $router->get('categories/deleteFile','CategoryController@deleteFile')->name('categories.deleteFile');
    $router->get('categories/view/{category}', 'CategoryController@view')->name('categories.view');
    $router->get('categories/add/{category}','CategoryController@add')->name('categories.add');
    $router->resource('categories', 'CategoryController');
});


