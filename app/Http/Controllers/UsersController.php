<?php

namespace App\Http\Controllers;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Register',
            'menu' => 'register'
        );
        $data['users'] = User::all();
        // dd($data);
        return view('auth.passwords.index', $data);
    }

}
