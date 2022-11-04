<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectToAdmin = RouteServiceProvider::HOME;
    protected $redirectToBrand= RouteServiceProvider::BRAND;
    protected $redirectToInfluencer= RouteServiceProvider::INFLUENCER;

    protected function redirectTo()
    {
        if(auth::user()->dashboard == 'admin'){
            return $this->redirectToAdmin;
        }elseif(auth::user()->dashboard == 'brand'){
            return $this->redirectToBrand;

        }elseif(auth::user()->dashboard == 'influencer'){
            return $this->redirectToInfluencer;

        }
        // return auth::user()->dashboard == 'admin' ? $this->redirectToAdmin : $this->redirectToBrand;
        // if (auth()->user()->role == 'admin') {
        //     return '/admin';
        // }
        // return '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
