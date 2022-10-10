<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Campaign;
use App\Models\Campaign_influencer_type;
use App\Models\Campaign_location;
use App\Models\Campaign_category;
use App\Models\Campaign_reference_link;

class BrandAdminController extends Controller
{
     function listing()
    {
        $data['users']=User::where('dashboard','brand')->orderBy('id','desc')->get();
        return view('admin/brands/list',$data);
    }
}
