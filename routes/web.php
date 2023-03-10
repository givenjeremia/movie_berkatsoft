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

Route::resource('/', MovieController::class);

Route::resource('/category', CategoryController::class);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/category/movie', 'CategoryController@getMovieByCategory')->name('category.movie');
Route::post('/category/edit', 'CategoryController@getEditForm')->name('category.edit');

Route::post('/movie/detail', 'MovieController@getMovieDetail')->name('movie.detail');


