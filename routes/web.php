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

Route::get('/', function () {
    return view('layouts.admin.dashboard');
});

Route::get('/dashboard', function () {
    return view('layouts.admin.dashboard');
});

Route::get('/buttons', function () {
    return view('layouts.admin.component.buttons');
});

Route::get('/cards', function () {
    return view('layouts.admin.component.cards');
});

Route::get('/colors', function () {
    return view('layouts.admin.utilities.colors');
});

Route::get('/borders', function () {
    return view('layouts.admin.utilities.borders');
});

Route::get('/animations', function () {
    return view('layouts.admin.utilities.animations');
});

Route::get('/other', function () {
    return view('layouts.admin.utilities.other');
});

Route::get('/login', function () {
    return view('layouts.admin.pages.login');
});

Route::get('/register', function () {
    return view('layouts.admin.pages.register');
});
