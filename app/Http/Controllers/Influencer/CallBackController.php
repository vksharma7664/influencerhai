<?php

namespace App\Http\Controllers\Influencer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Storage, Session, Str, Auth;


class CallBackController extends Controller
{
    //

    public function googleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            // dd($user);
            $isUser = User::where('social_token', $user->id)->first();
     
            if($isUser){
                Auth::loginUsingId($isUser);
                // return redirect('/dashboard');
            }else{
                $saved =  new User();
                $saved->name              = $user->name;
                $saved->email             = $user->email;
                $saved->dashboard         = 'influencer';
                $saved->password          = 'dummy123';
                $saved->email_verified_at = date('Y-m-d H:i:s');
                $saved->social_token      = $user->id;
                $saved->social_type       = 'google';
                $saved->response          = json_encode($user);
                $saved->save();
                // dd($saved);
                Auth::loginUsingId($saved->id);
            }
            return redirect(RouteServiceProvider::INFLUENCER);
        } catch (\Exception $e) {
            return redirect('/influencer/login');
        }
    }

    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function facebookLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        try {
    
            $user = Socialite::driver('facebook')->user();
            dd($user);
            $isUser = User::where('social_token', $user->id)->first();
     
            if($isUser){
                Auth::login($isUser);
                return redirect('/dashboard');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('admin@123')
                ]);
    
                Auth::login($createUser);
                return redirect('/dashboard');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
