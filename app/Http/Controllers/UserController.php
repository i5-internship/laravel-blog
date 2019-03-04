<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
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
        return view('users', compact('datas'));
    }

    public function getUser($id)
    {
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
    }
}
