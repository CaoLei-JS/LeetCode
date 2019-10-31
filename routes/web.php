<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test',function (){
    dd(array_values([[1,2,3],[2,3,4]]));
});
Route::get('/905', 'ArrayController@sortArrayByParity');
Route::get('/985', 'ArrayController@sumEvenAfterQueries');
Route::get('/912', 'ArrayController@sortArray');
Route::get('/840', 'ArrayController@numMagicSquaresInside');
