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
Route::get('', 'PostController@index')->name('home');
Route::group(['prefix' => 'post'], function (){
    Route::get('create', 'PostController@create')->name('create');
    Route::post('store', 'PostController@store')->name('store');
    Route::get('show/{id}', 'PostController@show')->name('show');
    Route::get('edit/{id}', 'PostController@edit')->name('edit');
    Route::get('delete/{id}', 'PostController@delete')->name('delete');
});
