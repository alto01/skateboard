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

//postルーティング
Route::get('/', 'PostController@index')->name('posts.index');
Route::resource('/posts', 'PostController')->except(['index','show'])->middleware('auth');
Route::resource('/posts', 'PostController')->only(['show']);
Route::delete('/posts/{post}','PostController@delete')->name('posts.delete')->middleware('auth');
//いいね機能
Route::prefix('posts')->name('posts.')->group(function () {
    Route::put('/{post}/like', 'PostController@like')->name('like')->middleware('auth');
    Route::delete('/{post}/like', 'PostController@unlike')->name('unlike')->middleware('auth');
});


//place関係ルーティング
Route::get('/places', 'PlaceController@index')->name('places.index');
Route::get('/places/serchPrefecture','PlaceController@serchPrefecture');
Route::get('/places/serchKeyword','PlaceController@serchKeyword');
Route::get('/places/create','PlaceController@create')->name('places.create');
Route::post('/places/store','PlaceController@store')->name('places.store');
Route::get('/places/{place}', 'PlaceController@show');
Route::middleware('auth')->group(function () {
    Route::put('/places/{place}','PlaceController@update')->name('places.update');
    Route::get('/places/{place}/edit','PlaceController@edit')->name('places.edit');
    Route::delete('/places/{place}','PlaceController@delete')->name('places.delete');
});


//user関係ルーティング
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', 'UserController@show')->name('show');
    Route::get('/{name}/likes', 'UserController@likes')->name('likes');
    Route::get('/{name}/places', 'UserController@places')->name('places');
    Route::get('/{name}/followings', 'UserController@followings')->name('followings');
    Route::get('/{name}/followers', 'UserController@followers')->name('followers');

    Route::middleware('auth')->group(function () {
        Route::put('/{name}/follow', 'UserController@follow')->name('follow');
        Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
        Route::get('/{name}/edit', 'UserController@edit')->name('edit');
        Route::put('/{name}', 'UserController@update')->name('update');
    });
});


