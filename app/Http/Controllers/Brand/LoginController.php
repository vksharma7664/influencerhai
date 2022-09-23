<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
