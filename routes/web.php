<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserStatus;
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
//Route::middleware('auth')->group(function () {
//    Route::get('/admin', function () {
//        return Inertia::render('Admin');
//    })->name('admin');
//});

require __DIR__.'/auth.php';
require __DIR__.'/AdminAuth.php';

// Admin Dashboard
//Route::middleware('adminAuth:admin')->group(function () {
//
//    Route::get('/admin/dashboard', function () {
//        return Inertia::render('Admin/Dashboard');
//    })->name('admin.dashboard');
//
//    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
//
//    // Onboarding Questions Resource
//    Route::resource('admin/onboarding', OnboardingController::class);
//    // Chapter Resource with api
////    Route::apiResource('admin/chapter', ChapterController::class);
//    Route::resource('admin/chapter', ChapterController::class);
//
//    // Lesson Resource
//    Route::resource('admin/lesson', LessonController::class);
//
//    // Resource Resource
//    Route::resource('admin/resource', ResourceController::class);
//
//    // Topic Resource
//    Route::resource('admin/topic', TopicController::class);
//    Route::resource('admin/users', AdminUserController::class);
//
//
//    // User Route
////    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.user.index');
//});



Route::middleware([CheckUserStatus::class])->group(function () {
    // Admin Login
    Route::prefix('admin')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'adminCreate'])->name('admin.login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('admin.login');
        // Add other admin routes as needed

        Route::get('/dashboard', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('admin.dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');

        // Onboarding Questions Resource
        Route::resource('/onboarding', OnboardingController::class);
        // Chapter Resource with api
//    Route::apiResource('/chapter', ChapterController::class);
        Route::resource('/chapter', ChapterController::class);

        // Lesson Resource
        Route::resource('/lesson', LessonController::class);

        // Resource Resource
        Route::resource('/resource', ResourceController::class);

        // Topic Resource
        Route::resource('/topic', TopicController::class);
        Route::resource('/users', AdminUserController::class);
    });

    // User Login
    Route::prefix('user')->group(function () {
        Route::get('login', 'UserController@loginForm')->name('user.login');
        Route::post('login', 'UserController@login')->name('user.login.post');
        // Add other user routes as needed
    });
});
