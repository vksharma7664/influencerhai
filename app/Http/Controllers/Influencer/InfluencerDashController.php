<?php

namespace App\Http\Controllers\Influencer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class InfluencerDashController extends Controller
{
    
    public function dashboard()
    {
        echo "Hi ".Auth::user()->name.", You are logged in as influencer successfully!!";
        dd(Auth::user()->email);
    }
}
