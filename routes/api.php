<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('auth')->group(function () {
    Route::post('login', 'AuthenticateController@login');
});

Route::middleware('auth.jwt')->group(function () {
    Route::post('logout', 'AuthenticateController@logout');
    Route::post('refresh', 'AuthenticateController@refresh');
    Route::post('me', 'AuthenticateController@me');

    //Colors
    // Route::get('getColors', 'ColorController@getColors')->name('getColors');
    Route::post('addColor', 'ColorController@addColor')->name('addColor');
    Route::post('updateColor', 'ColorController@updateColor')->name('updateColor');
    Route::post('deleteColor', 'ColorController@deleteColor')->name('deleteColor');

});

Route::prefix('api')->group( function(){
    Route::get('/colors', 'ColorController@getColors');
});
