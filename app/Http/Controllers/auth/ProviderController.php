<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {

        try {
            $socialUser = Socialite::driver($provider)->user();

//            dd($socialUser);


//            if (!User::query()->where('email', $socialUser->getEmail())->exists()) {
//                return redirect('/login')->withErrors([
//                    'email' => 'This email uses another provider. Please login with '.$socialUser->getNickname().' instead.',
//                ]);
//            }

            $user = User::where(
                [
                    'provider' => $provider,
                    'provider_id' =>$socialUser->id
                ]
            )->first();

            // Avatar stored in public folder
            $avatar = $socialUser->getAvatar();

            // Get the file name from the url
            $avatarName = basename($avatar);

            if(!$user) {
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'username' => User::generateUserName($socialUser->getNickname()),
                    'email' => $socialUser->getEmail(),
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'provider_token' => $socialUser->token,
                    'email_verified_at' => now(),
                    'avatar_path' =>  $socialUser->getAvatar(),
                ]);

            }

            Auth::login($user);

            // Check if user is first time login
            $isLogin = auth()->user()->refresh()->isFirstLogin;

            if ($isLogin) {
                auth()->user()->update(['isFirstLogin' => 0]);

                return redirect()->route('onboarding');
            }

            return redirect('/roadmap');

        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect('/login');
        }
    }
}
