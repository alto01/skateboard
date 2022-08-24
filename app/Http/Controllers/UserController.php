<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('users/index')->with(['user' => $user]);
    }
}
