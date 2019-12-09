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

Route::get('840', 'Api\ArrayController@exercise840');
Route::get('164', 'Api\StringController@exercise164');
Route::get('974', 'Api\ArrayController@exercise974');
Route::post('122', 'Api\GreedyController@exercise122');
Route::get('26', 'Api\ArrayController@exercise26');
