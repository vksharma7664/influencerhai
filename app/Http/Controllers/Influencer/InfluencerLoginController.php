<?php

namespace App\Http\Controllers\Influencer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfluencerLoginController extends Controller
{
    public function login()
    {
        return view('influencer.login');
    }
}
