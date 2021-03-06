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

Route::get('/categories/all', 'Api\ApiCategoryController@getAll');
Route::get('/categories/sub/{category}', 'Api\ApiCategoryController@getSubAll');

Route::get('/regions/all', 'Api\ApiRegionController@getAll');
Route::get('/regions/city/{region}', 'Api\ApiRegionController@getCityAll');
