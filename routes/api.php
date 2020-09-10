<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/stores/{id}/products','StoreController@products');
Route::resource('/stores', 'StoreController');
Route::resource('/products', 'ProductController');
