<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $user = $request->user();

//        if( $user->user_status == 1) {
//            return $request->expectsJson() ? null : route('admin.login');
//        }
//        return $request->expectsJson() ? null : route('login');
        return $request->expectsJson() ? null : route('admin.login');
    }
}
