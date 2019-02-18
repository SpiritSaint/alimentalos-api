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

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/places', ['uses' => 'Api\PlacesController@index']);
    Route::post('/places', ['uses' => 'Api\PlacesController@store']);
    Route::get('/places/{place}', ['uses' => 'Api\PlacesController@show']);
    Route::match(['PUT', 'PATCH'], '/places/{place}', ['uses' => 'Api\PlacesController@update']);
    Route::delete('/places/{place}', ['uses' => 'Api\PlacesController@destroy']);
});
