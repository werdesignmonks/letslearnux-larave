<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{

    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request, User $user): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
        $isLogin = auth()->user()->refresh()->isFirstLogin;

//        dd($isLogin);

        if ($isLogin) {
            // Set isFirstLogin to false after first login for a user
            auth()->user()->update(['isFirstLogin' => 0]);

            // Redirect to a specific page for first-time login
            return redirect()->route('Onboarding');
        }

//        if (auth()->user()->isFirstLogin == 1) {
//            return redirect()->route('admin.dashboard');
//        } else {
//            return redirect()->route('roadmap');
//        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
