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

Auth::routes();

Route::get('/', 'PostController@index')->middleware('auth');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{id}', 'PostController@show');
Route::get('/users/{id}', 'UserController@index');
Route::post('/posts', 'PostController@store');
Route::get('/places', 'PlaceController@index');
Route::get('/places/serch','PlaceController@serch');

