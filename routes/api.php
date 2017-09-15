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

Route::get('countries', 'CountryController@index');
Route::get('allcountries', 'CountryController@getCountries');
Route::post('allrate', 'CountryController@getRate');
Route::post('countries', 'CountryController@store');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
