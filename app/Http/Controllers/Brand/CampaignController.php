<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Campaign_influencer_type;
use App\Models\Campaign_location;
use App\Models\Campaign_category;
use App\Models\Campaign_reference_link;
use Session, DB, auth;

class CampaignController extends Controller
{
    //
    public function create()
    {
        return view('brand.campaign.create');
    }


    public function create2(Request $request)
    {
        // dd($request->except('_token'));
        Session::put('request_data', $request->except('_token'));
        return view('brand.campaign.create2');
    }


    public function create3(Request $request)
    {
        
        $request_data = Session::get('request_data');
        Session::put('request_data', array_merge($request_data,$request->except('_token')));
        $data['categories']=DB::table('categories')->where('type','normal')->get();
        // dd(Session::get('request_data'));
        return view('brand.campaign.create3',$data);
    }


    public function finalCreate(Request $request)
    {
        $request_data = Session::get('request_data');
        $request_data  = array_merge($request_data,$request->except('_token'));
        
        $campaign = Campaign::create(array_merge($request_data,['user_id'=>auth::user()->id]));
        // dd($request_data);
        //add Influencer category
        foreach ($request_data['influencer_categories'] as $cat) {
            // code...
            if($cat != null){
                Campaign_category::create([
                    'campaign_id' => $campaign->id,
                    'category' => $cat,
                ]);
            }
        }

         //add Influencer type
        foreach ($request_data['influencer_type'] as $type) {
            // code...
            if($type != null){
                 Campaign_influencer_type::create([
                    'campaign_id' => $campaign->id,
                    'type' => $type,
                ]);
            }
           
        }

         //add Influencer location
        foreach ($request_data['influencer_locations'] as $location) {
            // code...
            if($location != null){
                Campaign_location::create([
                    'campaign_id' => $campaign->id,
                    'location' => $location,
                ]);
            }
        }

         //add Influencer links
        foreach ($request_data['reference_links'] as $link) {
            // code...
            if($link != null){
                Campaign_reference_link::create([
                    'campaign_id' => $campaign->id,
                    'link' => $link,
                ]);
            }
        }

        Session::forget('request_data');
        // dd($campaign->categories);
        $request->session()->flash('status',$request_data['status']);
        return redirect()->route('brand.campaign.list');
    }


    public function list(Request $request)
    {
        $draft = Campaign::where('user_id',auth::user()->id)->where('status','save');
        $review = Campaign::where('user_id',auth::user()->id)->where('status','post');
        $ongoing = Campaign::where('user_id',auth::user()->id)->where('status','ongoing');
        $completed = Campaign::where('user_id',auth::user()->id)->where('status','completed');

        $active_tab= 'ongoing';
        if(Session::has('status')){
            if(Session::get('status') == 'save'){
                $active_tab = 'draft';
                $msg = "Your campaign has been save successfully!";
            }else{
                $active_tab = 'review';
                $msg = "Your campaign has been under review!";
            }
            $request->session()->flash('success',$msg);
        }

        return view('brand.campaign.list',compact('draft','review','ongoing','completed','active_tab'));
    }


}
