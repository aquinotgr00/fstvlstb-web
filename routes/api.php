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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/transaction', 'Api\\TransactionController@store');
Route::get('/subdistrict', 'Api\\RajaOngkirController@getSubdistrict');
Route::post('/get-shipping-cost', 'Api\\RajaOngkirController@getShippingCost');

Route::get('/product/{id}', 'Api\\ProductController@getJsonProductById')->name('product.by-id');
