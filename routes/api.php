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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('v1/login', '\App\Http\Controllers\api\v1\User@login');
Route::post('v1/user', '\App\Http\Controllers\api\v1\User@store');

Route::group(['middleware' => 'auth:api'], function (){
    Route::resource('v1/address', \App\Http\Controllers\api\v1\Address::class);
    Route::post('v1/logout', '\App\Http\Controllers\api\v1\User@logout');
});
