<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Storage, Session;

class LoginController extends Controller
{
    //

    public function loginShow()
    {
        // code...
        return view('brand.auth.login');
    }

    public function registerShow()
    {
        // code...
        return view('brand.auth.register');
    }

    public function registerSubmit(User $user,RegisterRequest $request)
    {
        // code...
        // $request->dd();
        if(makeUrl($request->company_url) != explode('@', $request->email)[1]){
            $request->session()->flash('error','Your email ID does not match with your company.');
            return redirect()->back()->withInput();
        }

        $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'designation' => $request->designation,
            'company_name' => $request->company_name,
            'company_url' => makeUrl($request->company_url),
            'industry' => $request->industry,
            'dashboard' => 'brand',
            'password' => $request->password,
        ]);
        // dd($user);
        //send verification mail to users
        //redirect to registration success page
        $request->session()->flash('success','Your query has been submitted.');
        return redirect()->route('brand.register.success');
    }


    public function registerSuccess()
    {
        if(Session::has('success')){
            return view('brand.auth.registration_success', ['title' => 'Register Successful']);
        }
        return redirect()->route('brand.register');
        
    }

    public function dashboard()
    {
        // code...
        return view('brand.dashboard', ['title' => 'Dashboard']);
    }
}
