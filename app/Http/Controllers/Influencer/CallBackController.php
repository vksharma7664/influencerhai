<?php

namespace App\Http\Controllers\Influencer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class CallBackController extends Controller
{
    //

    public function googleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            dd($user);
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }

    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
}
