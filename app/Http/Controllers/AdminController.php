<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
//    public function index()
//    {
//        return Inertia::render('Admin/Dashboard');
//    }

    public function loginform()
    {
        return Inertia::render('Admin/Login');
    }

    public function login()
    {
        // Implement admin login logic

        return redirect()->route('admin.dashboard');

    }
}
