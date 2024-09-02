<?php

namespace App\Http\Controllers\Auth\Github;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CallbackController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::query()->updateOrCreate(
            [
                'nickname' => $githubUser->getNickName(),
                'email'    => $githubUser->getEmail(),
            ],
            [
                'name'              => $githubUser->getName(),
                'password'          => Str::random(40),
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user);

        return redirect('/dashboard');
    }
}
