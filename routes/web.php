<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourcesController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/onboarding', function () {
    return Inertia::render('Onboarding');
})->middleware(['auth', 'verified'])->name('Onboarding');

Route::get('/resources', function () {
    return Inertia::render('Resources');
})->middleware(['auth', 'verified'])->name('Resources');

Route::get('/roadmap', function () {
    return Inertia::render('Roadmap');
})->middleware(['auth', 'verified'])->name('roadmap');

Route::get('/chapter-single', function () {
    return Inertia::render('ChapterSingle');
})->middleware(['auth', 'verified'])->name('chapter-single');

Route::get('/my-contribution', function () {
    return Inertia::render('MyContribution');
})->middleware(['auth', 'verified'])->name('my-contribution');

// Admin login
Route::get('/admin/login', function () {
    return Inertia::render('Admin/Login');
})->name('admin.login');




// Route Page Not Found
//Route::get('/', function () {
//    return Inertia::render('404');
//})->name('404');



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.profile');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth Admin
Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return Inertia::render('Admin');
    })->name('admin');
});

require __DIR__.'/auth.php';

// Resources
//Route::resource('/resources', [ResourcesController::class, 'index']);
