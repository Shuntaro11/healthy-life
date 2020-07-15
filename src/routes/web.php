<?php

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

Route::get('/', 'PostController@index')->name('top');

Route::put('users', 'UserController@update');

Route::get('/posts/search', 'PostController@search')->name('posts.search');

Auth::routes();

Route::resource('posts', 'PostController')->only(['create', 'store', 'show']);
Route::resource('users', 'UserController')->only(['show', 'edit']);
Route::resource('likes', 'LikeController')->only(['index']);
Route::resource('meals', 'MealController')->only(['create', 'store', 'destroy']);