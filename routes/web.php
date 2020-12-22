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

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('franquicia', 'App\Http\Controllers\FranquiciaController@index');
Route::get('franquicia/token', 'App\Http\Controllers\FranquiciaController@getToken');
Route::get('franquicia/{id}', 'App\Http\Controllers\FranquiciaController@show');
Route::post('franquicia', 'App\Http\Controllers\FranquiciaController@store');
Route::put('books/{id}', 'Api\BookController@updateBook');
Route::delete('books/{id}','Api\BookController@deleteBook');