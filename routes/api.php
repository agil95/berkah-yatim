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

Route::get('load', 'ViewController@load')->name('load');
Route::get('search', 'ViewController@search')->name('search');

//Route::get("users_with_cache", "ViewController@getUserCache");
//Route::get("users_with_query", "ViewController@getUser");
