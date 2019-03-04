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


Route::get('', 'FrontendController@index')->name('home');

Route::get('about', 'FrontendController@about')->name('about');

Route::get('contact', 'FrontendController@contact')->name('contact');

Route::group(['prefix' => 'user'], function () {
    Route::get('', 'UserController@index')->name('user');
    Route::get('/{id}', 'UserController@getUser')->name('get-user');
});
Route::group(['prefix' => 'post'], function () {
//    Route::get('','PostController@index')->name('post');
    Route::get('create', 'PostController@createPost')->name('create-post');
    Route::post('store', 'PostController@store')->name('store');
    Route::get('{id}', 'PostController@getPost')->name('get-post');
    Route::get('edit/{id}','PostController@edit')->name('edit');
    Route::get('delete/{id}', 'PostController@delete')->name('delete');
});
