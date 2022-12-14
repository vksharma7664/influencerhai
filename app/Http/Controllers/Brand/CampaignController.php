<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Campaign_influencer_type;
use App\Models\Campaign_location;
use App\Models\Campaign_category;
use App\Models\Campaign_reference_link;
use App\Models\CampaignSampleProvide;
use App\Models\CampaignSampleProvidedRemark;
use App\Models\CampaignLiveBriefDetail;
use Session, DB, auth, Storage;

class CampaignController extends Controller
{



    //
    // add campaign //
    public function create()
    {

        return view('brand.campaign.create');
    }

     // edit campaign //

    public function editCampaign(Request $request,$id)
    {
        $campaign = Campaign::where('unique_id',$id);
        if(!$campaign->count()){
            $request->session()->flash('error','Invalid Campaign !!! ');
            return redirect()->back();
        }

        return view('brand.campaign.create',['campaign'=> $campaign->first()]);
    }


    // end edit campaign //

    public function create2(Request $request, $id=null)
    {
        // dd($request->except('_token'));
        if($id == null):
            Session::put('request_data', $request->except('_token'));
            return view('brand.campaign.create2');
        else:
            // update campaign
            $campaign = Campaign::where('unique_id',$id)->first();
            $campaign->payment_type = $request['payment_type'];
            $campaign->title        = $request['title'];
            $campaign->hastags      = $request['hastags'];
            $campaign->description  = $request['description'];
            $campaign->deadline     = $request['deadline'];
            $campaign->live_date    = $request['live_date'];
            $campaign->save();
            // dd($campaign);
            return view('brand.campaign.create2', ['campaign'=>$campaign]);
        endif;
    }


    public function create3(Request $request, $id=null)
    {
        $data['categories']=DB::table('categories')->where('type','normal')->get();
        if($id == null):
            $request_data = Session::get('request_data');
            Session::put('request_data', array_merge($request_data,$request->except('_token')));
            
            // dd(Session::get('request_data'));
            return view('brand.campaign.create3',$data);
        else:
            // $request->dd();
            $campaign = Campaign::where('unique_id',$id)->first();
            // first update null all on fields
            $campaign->insta_reels_checkbox         = NULL;
            $campaign->insta_story_checkbox         = NULL;
            $campaign->insta_bio_checkbox           = NULL;
            $campaign->insta_video_self_checkbox    = NULL;
            $campaign->insta_video_brand_checkbox   = NULL;
            $campaign->youtube_video_self_checkbox  = NULL;
            $campaign->youtube_video_brand_checkbox = NULL;
            $campaign->save();

            // update campaign
            $campaign_update = Campaign::where('unique_id',$id)->update($request->except('_token'));
            return view('brand.campaign.create3', ['campaign'=>Campaign::where('unique_id',$id)->first(), 'categories'=>$data['categories']]);
        endif;
    }


    public function finalCreate(Request $request, $id=null)
    {
        // $request->dd();
        if($id == null):
            $request_data = Session::get('request_data');
            $request_data  = array_merge($request_data,$request->except('_token'));
            
            $campaign = Campaign::create(array_merge($request_data,['user_id'=>auth::user()->id]));
            Campaign::where('id',$campaign->id)->update(['unique_id'=> md5(uniqid($campaign->id, true))]);
        else:
            $campaign_update = Campaign::where('unique_id',$id)->update([
                'influencer_gender' => $request['influencer_gender'],
                'status' => $request['status']
            ]);
            $campaign = Campaign::where('unique_id',$id)->first();
        endif;
       

        if($request->hasFile('image')) //image check Aviable Or | Not
        {
            // dd('vikesh');
            //$image=$request->file('image')->store('public/post'); method 1
            
            // $image=$request->file('image');
            // $ext=$image->extension();
            // $file=$image->getClientOriginalName().'.'.$ext;
            // // $image->storeAs('/public/blog/post',$file); // not used
            // $image->move(public_path().'/uploads/blog/post',$file);
            // $data['image']=$file;
            $file = $request->file('image');
            $imageName=$file->getClientOriginalName();
            $filePath = 'campaign/'.$campaign->id.'/' . $imageName;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $data['file']='campaign/'.$campaign->id.'/' . $imageName;
            Campaign::where('id',$campaign->id)->update($data);
        }
         // dd($request->all());

        //add Influencer category
        if(isset($request['influencer_categories']) && $request['influencer_categories'] != null):
            Campaign_category::where('campaign_id', $campaign->id)->delete();
            foreach ($request['influencer_categories'] as $cat) {
                // code...
                if($cat != null){
                    Campaign_category::create([
                        'campaign_id' => $campaign->id,
                        'category' => $cat,
                    ]);
                }
            }
        endif;

         //add Influencer type
        if(isset($request['influencer_type']) && $request['influencer_type'] != null):
            Campaign_influencer_type::where('campaign_id', $campaign->id)->delete();
            foreach ($request['influencer_type'] as $type) {
                // code...
                if($type != null){
                     Campaign_influencer_type::create([
                        'campaign_id' => $campaign->id,
                        'type' => $type,
                    ]);
                }
               
            }
        endif;

         //add Influencer location
        if(isset($request['influencer_locations']) && $request['influencer_locations'] != null):
            Campaign_location::where('campaign_id', $campaign->id)->delete();
            foreach ($request['influencer_locations'] as $location) {
                // code...
                if($location != null){
                    Campaign_location::create([
                        'campaign_id' => $campaign->id,
                        'location' => $location,
                    ]);
                }
            }
        endif;

         //add Influencer links
        if(isset($request['reference_links']) && $request['reference_links'] != null):
            Campaign_reference_link::where('campaign_id', $campaign->id)->delete();
            foreach ($request['reference_links'] as $link) {
                // code...
                if($link != null){
                    Campaign_reference_link::create([
                        'campaign_id' => $campaign->id,
                        'link' => $link,
                    ]);
                }
            }
        endif;

        if($id == null):
        Session::forget('request_data');
        endif;
        // dd($campaign->categories);
        $request->session()->flash('status',$request['status']);
        return redirect()->route('brand.campaign.list');
    }

     // end add campaign //

   


    public function list(Request $request)
    {
        $draft = Campaign::where('user_id',auth::user()->id)->where('status','save');
        $review = Campaign::where('user_id',auth::user()->id)->where('status','post');
        $live = Campaign::where('user_id',auth::user()->id)->where('status','live');
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

        return view('brand.campaign.list',compact('draft','review','ongoing','completed','active_tab','live'));
    }

    public function showCampaign($id)
    {
        // show_campaign
        $campaign = Campaign::where('unique_id',$id)->first();
        return view('brand.campaign.show_campaign',['campaign'=> $campaign]);
    }


    public function underReviewCampaign($id)
    {
        // show_campaign
        $campaign = Campaign::where('unique_id',$id)->update([
            'status'=>'post'
        ]);
        // return view('brand.campaign.show_campaign',['campaign'=> $campaign]);
        Session::flash('status','review');
        return redirect()->route('brand.campaign.list');
    }

    public function sampleInfluencers($id)
    {
        // show_campaign
        $campaign = Campaign::where('unique_id',$id)->first();
        $influencer_list = CampaignSampleProvide::where('campaign_id',$campaign->id)->get();
        $headings = array_keys(json_decode($influencer_list[0]->other_data,true));
        // dd($influencer_list);
        // return view('brand.campaign.show_campaign',['campaign'=> $campaign]);
        Session::flash('status','review');
        return view('brand.campaign.show_influencers_list',['campaign'=> $campaign, 'influencer_list'=>$influencer_list, 'headings'=>$headings]);
    }

    public function sampleInfluencersSelected(Request $request)
    {
        $influencer_list = CampaignSampleProvide::where('campaign_id',$request->campaign_id)->get()->toArray();
        // $request->dd();
        foreach($influencer_list as $list){
            $reamrk_ = isset($request['remark_'.$list['id']]) ? $request['remark_'.$list['id']] : null;
            CampaignSampleProvide::where('id', $list['id'])->update([
                'selected' => isset($request['select_'.$list['id']]) ? 1 : null,
                'remark'    => $reamrk_
            ]);

            // add remarks
            if($reamrk_ != null){
                CampaignSampleProvidedRemark::create([
                    'campaign_id'                   => $request->campaign_id,
                    'campaign_sample_provide_id'    => $list['id'],
                    'type'                          => 'client',
                    'remark'                        => $reamrk_,
                ]);
            }
            
        }
        Session::flash('msg','List Saved Successfully');
        return redirect()->back();
    }


    // LIVE BRIEF

    public function liveBrief($unique_id)
    {
        // show_campaign
        $campaign = Campaign::whereUniqueId($unique_id)->first();
        $influencer_list = CampaignLiveBriefDetail::where('campaign_id',$campaign->id)->get();
        return view('brand.campaign.live.live_brief',['campaign'=> $campaign, 'influencer_list'=>$influencer_list]);
    }

    public function liveBriefDetails($id)
    {
        $influe_live = CampaignLiveBriefDetail::find($id);
        $campaign = Campaign::whereId($influe_live->campaign_id)->first()->toArray();

        $whole_data = $influe_live->whole_data != null ? json_decode($influe_live->whole_data, true) : array();
        // dd($whole_data);
        
        return view('brand.campaign.live.loadhtml.details', compact('influe_live', 'campaign','whole_data'));
    }

    public function liveBriefDetailsSave(Request $request, $id)
    {
        // $request->dd();
        $deliverables_arr = getDeliverablesNames();
        $deliverables ='';
        $whole = $request->except(['_token']);
        foreach ($whole as $key => $value) {
            // echo $key.'=>><<='.$value."<br>";
            if($value){
                $deliverables .= $value." ".$deliverables_arr[$key].',';
            }
        }
        $deliverables = rtrim($deliverables, ',');
        // dd();
        CampaignLiveBriefDetail::whereId($id)->update([
            'deliverables' => $deliverables,
            'whole_data' => json_encode($whole),
        ]);
        Session::flash('msg','Data Saved Successfully');
        return redirect()->back();
    }


}
