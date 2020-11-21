<?php

namespace App\Http\Controllers\Auth;

use App\Services\SocialAccountService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginFaceController extends Controller
{
    public function redirect($social) {
        return Socialite::driver($social)->redirect();
    }
    public function callback($social)
    {
        $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->user(), $social);
        auth()->login($user);

        return redirect()->back();
    }
}
