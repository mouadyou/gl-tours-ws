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

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'AuthController@user');
});

Route::resource('ads', 'AdController');
Route::resource('places', 'PlaceController');
Route::get('places/{latitude}/{longitude}/{distance?}', 'PlaceController@placesByArea');
