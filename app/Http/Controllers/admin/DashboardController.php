<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;


class DashboardController extends Controller
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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function index()
        {
            // $data['result']=DB::table('post_categories')->select('id','name')->get();
            return view('admin/dashboard');
        }
}
