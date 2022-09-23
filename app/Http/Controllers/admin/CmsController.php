<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
class CmsController extends Controller
{
   
    function contactQuerieslisting()
        {
            $data['contactqueries']=DB::table('contactus')->orderBy('id', 'desc')->get();
           
            return view('admin/queries/contactus',$data);
        }

    function brandsQuerieslisting()
    {
        $data['brand_queries']=DB::table('brand_queries')->orderBy('id', 'desc')->get();
       
        return view('admin/queries/brands',$data);
    }

    function influencersQuerieslisting()
    {
        $data['influencer_queries']=DB::table('influencer_queries')->orderBy('id', 'desc')->get();
       
        return view('admin/queries/influencers',$data);
    }

   
  
}
