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
Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');


Route::apiResource('/hu', 'Api\HuddleUpController')->middleware('auth:api');
Route::apiResource('/team', 'Api\TeamController')->middleware('auth:api');


Route::get('/team/getTeams/{userid}', 'Api\TeamController@getTeams')->middleware('auth:api');


Route::post('/team/init_droplet', 'Api\TeamController@init_droplet')->middleware('auth:api');


Route::apiResource('/ceo', 'Api\CEOController')->middleware('auth:api');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
