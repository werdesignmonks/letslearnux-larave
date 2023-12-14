<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\Frontend\OnboadingFormController;
use App\Http\Controllers\Frontend\RoadmapController;
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
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//Route::get('/onboarding', function () {
//    return Inertia::render('Onboarding');
//})->middleware(['auth', 'verified'])->name('Onboarding');

//Route::get('/resources', function () {
//    return Inertia::render('Resources');
//})->middleware(['auth', 'verified'])->name('Resources');

//Route::get('/roadmap', function () {
//    return Inertia::render('Roadmap');
//})->middleware(['auth', 'verified'])->name('roadmap');

//Route::get('/chapter-single', function () {
//    return Inertia::render('ChapterSingle');
//})->middleware(['auth', 'verified'])->name('chapter-single');

Route::get('/my-contribution', function () {
    return Inertia::render('MyContribution');
})->middleware(['auth', 'verified'])->name('my-contribution');

/*
 * User Dashboard
 */
Route::middleware(['auth', 'verified', 'user'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/onboarding', [OnboadingFormController::class, 'index'])->name('Onboarding');
    Route::post('/onboarding/store', [RoadmapController::class, 'addResource'])->name('addresource.store');

    // Route
    Route::get('/roadmap', [RoadmapController::class, 'index'])->name('roadmap');
    // Show Lesson Detail with slug
    Route::get('/roadmap/{slug}', [RoadmapController::class, 'show'])->name('roadmap.show');

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.profile');
    Route::post('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

/*
 * Admin Routes
 */

Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('admin.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::resource('/onboarding', OnboardingController::class);
    Route::resource('/chapter', ChapterController::class);
    Route::resource('/lesson', LessonController::class);

    // Resource Route
    Route::get('/resource', [ResourceController::class, 'index'])->name('resource.index');
    // Resource Create
    Route::get('/resource/create', [ResourceController::class, 'create'])->name('resource.create');
    // Resource Store
    Route::post('/resource', [ResourceController::class, 'store'])->name('resource.store');
    // Resource Edit
    Route::get('/resource/{resource}/edit', [ResourceController::class, 'edit'])->name('resource.edit');
    // Resource Update
    Route::post('/resource/{resource}', [ResourceController::class, 'update'])->name('resource.update');
    // Resource Destroy
    Route::delete('/resource/{resource}', [ResourceController::class, 'destroy'])->name('resource.destroy');

    Route::resource('/topic', TopicController::class);
//    Route::resource('/users', AdminUserController::class);
    Route::get('/users', [AdminUserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('user.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('user.store');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('user.edit');
    Route::post('/users/{user}', [AdminUserController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('user.destroy');
    // Show User
    Route::get('/users/{user}', [AdminUserController::class, 'show'])->name('user.show');

    // Option Destroy
    Route::delete('/option/{option}', [OnboardingController::class, 'destroyOption'])->name('option.destroy');
});





//Route::middleware('auth:admin')->prefix('admin')->group(function () {
//
//    Route::get('/dashboard', function () {
//        return Inertia::render('Admin/Dashboard');
//    })->name('admin.dashboard');
//
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
//
//    // Onboarding Questions Resource
//    Route::resource('/onboarding', OnboardingController::class);
//    // Chapter Resource with api
////    Route::apiResource('admin/chapter', ChapterController::class);
//    Route::resource('/chapter', ChapterController::class);
//
//    // Lesson Resource
//    Route::resource('/lesson', LessonController::class);
//
//    // Resource Resource
////    Route::resource('/resource', ResourceController::class);
//    // Resource Index
//    Route::get('/resource', [ResourceController::class, 'index'])->name('resource.index');
//    // Resource Create
//    Route::get('/resource/create', [ResourceController::class, 'create'])->name('resource.create');
//    // Resource Store
//    Route::post('/resource', [ResourceController::class, 'store'])->name('resource.store');
//    // Resource Edit
//    Route::get('/resource/{resource}/edit', [ResourceController::class, 'edit'])->name('resource.edit');
//    // Resource Update
//    Route::post('/resource/{resource}', [ResourceController::class, 'update'])->name('resource.update');
//    // Resource Destroy
//    Route::delete('/resource/{resource}', [ResourceController::class, 'destroy'])->name('resource.destroy');
//
//    // Topic Resource
//    Route::resource('/topic', TopicController::class);
//    Route::resource('/users', AdminUserController::class);
//
//    // Option Destroy
//    Route::delete('/option/{option}', [OnboardingController::class, 'destroyOption'])->name('option.destroy');
//
//
//    // User Route
////    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.user.index');
//});



//Route::middleware([CheckUserStatus::class])->group(function () {
//    // Admin Login
//    Route::prefix('admin')->group(function () {
//        Route::get('login', [AuthenticatedSessionController::class, 'adminCreate'])->name('admin.login');
//        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('admin.login');
//        // Add other admin routes as needed
//
//        Route::get('/dashboard', function () {
//            return Inertia::render('Admin/Dashboard');
//        })->name('admin.dashboard');
//
//        Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
//
//        // Onboarding Questions Resource
//        Route::resource('/onboarding', OnboardingController::class);
//        // Chapter Resource with api
////    Route::apiResource('/chapter', ChapterController::class);
//        Route::resource('/chapter', ChapterController::class);
//
//        // Lesson Resource
//        Route::resource('/lesson', LessonController::class);
//
//        // Resource Resource
//        Route::resource('/resource', ResourceController::class);
//
//        // Topic Resource
//        Route::resource('/topic', TopicController::class);
//        Route::resource('/users', AdminUserController::class);
//    });
//
//    // User Login
//    Route::prefix('user')->group(function () {
//        Route::get('login', 'UserController@loginForm')->name('user.login');
//        Route::post('login', 'UserController@login')->name('user.login.post');
//        // Add other user routes as needed
//    });
//});
