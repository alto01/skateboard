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
Route::put('/users/{user}/update', 'UserController@update');
Route::get('/posts/{id}', 'PostController@show');
Route::get('/users/{id}', 'UserController@index');
Route::get('/users/{id}/edit', 'UserController@edit');
Route::post('/posts', 'PostController@store');
Route::get('/places', 'PlaceController@index');
Route::get('/places/serchPrefecture','PlaceController@serchPrefecture');
Route::get('/places/serchKeyword','PlaceController@serchKeyword');
Route::get('/places/create','PlaceController@create');
Route::post('/places/store','PlaceController@store');
Route::get('/posts/{post}/like', 'LikeController@like');
Route::get('/posts/{post}/unlike', 'LikeController@unlike');
Route::get('posts/{post}/countfavorites', 'LikeController@count');
Route::get('/places/{place}', 'PlaceController@show');
Route::post('/users/{user}/follow', 'RelationshipController@follow');
Route::post('/users/{user}/unfollow', 'RelationshipController@unfollow');
Route::delete('/posts/{post}','PostController@delete');


