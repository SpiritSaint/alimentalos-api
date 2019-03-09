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
    Route::get('/places/{place}/photos', ['uses' => 'Api\PlacePhotosController@index']);

    Route::get('/pets', ['uses' => 'Api\PetsController@index']);
    Route::post('/pets', ['uses' => 'Api\PetsController@store']);
    Route::get('/pets/{pet}', ['uses' => 'Api\PetsController@show']);
    Route::match(['PUT', 'PATCH'], '/pets/{pet}', ['uses' => 'Api\PetsController@update']);
    Route::delete('/pets/{pet}', ['uses' => 'Api\PetsController@destroy']);
    Route::get('/pets/{pet}/photos', ['uses' => 'Api\PetPhotosController@index']);

    Route::get('/photos', ['uses' => 'Api\PhotosController@index']);
    Route::post('/photos', ['uses' => 'Api\PhotosController@store']);
    Route::get('/photos/{photo}', ['uses' => 'Api\PhotosController@show']);
    Route::delete('/photos/{photo}', ['uses' => 'Api\PhotosController@destroy']);
});
