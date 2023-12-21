<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    Route::get('/resource/create', [ResourceController::class, 'create'])->name('resource.create');
    Route::post('/resource', [ResourceController::class, 'store'])->name('resource.store');
    Route::get('/resource/{resource}/edit', [ResourceController::class, 'edit'])->name('resource.edit');
    Route::post('/resource/{resource}', [ResourceController::class, 'update'])->name('resource.update');
    Route::delete('/resource/{resource}', [ResourceController::class, 'destroy'])->name('resource.destroy');

    Route::resource('/topic', TopicController::class);
    Route::get('/users', [AdminUserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('user.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('user.store');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('user.edit');
    Route::post('/users/{user}', [AdminUserController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('user.destroy');
    Route::get('/users/{user}', [AdminUserController::class, 'show'])->name('user.show');

    Route::delete('/option/{option}', [OnboardingController::class, 'destroyOption'])->name('option.destroy');
});
