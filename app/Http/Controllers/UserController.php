<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
//    public function index( Request $request)
//    {
//        return Inertia::render('Admin/User/Index');
//    }

    public function loginForm()
    {
        return Inertia::render('Auth/Login');
    }

    public function login()
    {
        // Implement user login logic
        // ...

        return redirect()->route('user.dashboard');
    }

}
