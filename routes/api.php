<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/authentication', 'API\UserController@auth');
Route::post('/user', 'API\UserController@createUser');

Route::group([ 'middleware' => 'jwt.auth' ], function ($router) {
    Route::post('/product', 'API\ProductController@createProduct');
    Route::get('/product/{id}', 'API\ProductController@getProductByID');
    Route::get('/products', 'API\ProductController@getProducts');
    Route::delete('/product', 'API\ProductController@deleteProduct');    
});
