<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function getUser($id)
    {
        $users = User::all();

        $datafound = null;
        $message = null;

        foreach ($users as $user) {
            if ($user['id'] == $id) {
                $userfound = $user;
            } else {
                $message = 'Data not found';
            }
        }
        return view('user-show', compact('userfound', 'message'));
    }
}
