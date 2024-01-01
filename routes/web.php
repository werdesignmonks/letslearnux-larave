<?php

use App\Http\Controllers\Frontend\OnboadingFormController;
use App\Http\Controllers\Frontend\ResourcesController;
use App\Http\Controllers\Frontend\RoadmapController;
use App\Http\Controllers\LearnStatusController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

/*
 * User Dashboard
 */
Route::middleware(['auth', 'verified', 'user'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/onboarding', [OnboadingFormController::class, 'index'])->name('Onboarding');
    Route::post('/onboarding/store', [RoadmapController::class, 'addResource'])->name('addresource.store');
    Route::post('/onboarding/save', [OnboadingFormController::class, 'save'])->name('onboardingStore');
    Route::get('/resources', [ResourcesController::class, 'index'])->name('resources');

    // User Resources Contribution
    Route::get('/my-contribution', [ResourcesController::class, 'myContribution'])->name('my-contribution');

    // Route
    Route::get('/roadmap', [RoadmapController::class, 'index'])->name('roadmap');
    // Show Lesson Detail with slug
    Route::get('/roadmap/{slug}', [RoadmapController::class, 'show'])->name('roadmap.show');

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.profile');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Learn Status
    Route::post('/learn-status/{id}', [LearnStatusController::class, 'store'])->name('lesson.status.update');
});


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
