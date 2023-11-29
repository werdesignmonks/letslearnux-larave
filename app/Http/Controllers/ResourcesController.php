<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ResourcesController extends Controller
{
    public function index()
    {
        return Inertia::render('Resources/Index');
    }
}
