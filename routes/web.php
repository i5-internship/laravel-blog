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


Route::get('','FrontendController@index')->name('home');

Route::get('about','FrontendController@about')->name('about');

Route::get('contact','FrontendController@contact')->name('contact');

Route::group(['prefix'=>'user'],function(){
    Route::get('','UserController@index')->name('user');
    Route::get('{id}','UserController@getUser')->name('get-user');
});

Route::get('post','PostController@index')->name('post');