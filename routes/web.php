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
    $datas = [

        [
            'id' => '1',
            'name' => 'Sally Becton',
        ],
        [
            'id' => '2',
            'name' => 'Larry Bowen',
        ],
        [
            'id' => '3',
            'name' => 'Chap Narith',
        ],
        [
            'id' => '4',
            'name' => 'Heng Chivoan',
        ],
        [
            'id' => '5',
            'name' => 'Horng Pengly',
        ]

    ];

    return view('index', compact('datas'));
});

Route::get('/user/{id}', function ($id) {
    $datas = [

        [
            'id' => '1',
            'name' => 'Sally Becton',
            'description' => 'Sally Becton is the CEO of Example Corp. She oversees daily operations and guides strategic vision for the company.',
        ],
        [
            'id' => '2',
            'name' => 'Larry Bowen',
            'description' => 'Larry Bowen is our COO, managing our operations in 12 countries. He brings his creativity and passion to the job every day at Example Corp.',
        ],
        [
            'id' => '3',
            'name' => 'Chap Narith',
            'description' => 'National Sales Manager Department:',
        ],
        [
            'id' => '4',
            'name' => 'Heng Chivoan',
            'description' => 'Photographer Department: Editorial',
        ],
        [
            'id' => '5',
            'name' => 'Horng Pengly',
            'description' => 'Multimedia Sales Executive Department:',
        ]

    ];

    $datafound = null;
    $message=null;

    foreach ($datas as $data) {
        if ($data['id'] == $id) {
            $datafound = $data;
        }else{
            $message = 'Data not found';
        }
    }
    return view('user-show', compact('datafound','message'));
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/post', function () {
    return view('post');
});

Route::get('/contact', function () {
    return view('contact');
});
