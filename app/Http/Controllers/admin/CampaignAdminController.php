<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Campaign_influencer_type;
use App\Models\Campaign_location;
use App\Models\Campaign_category;
use App\Models\Campaign_reference_link;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SampleInfulencerDetails;
use App\Models\CampaignSampleProvide;
use App\Models\CampaignSampleProvidedRemark;
use App\Models\CampaignLiveBriefDetail;


class CampaignAdminController extends Controller
{
     function listing()
    {
        $data['campaign']=Campaign::orderBy('id','desc')->get();
        return view('admin/campaign/list',$data);
    }

    public function campaignDetails($id)
    {
        $data['campaign']=Campaign::where('unique_id',$id)->first();
        if( $data['campaign']->sampleProvide()->count() > 0){

            $data['influencer_list'] = CampaignSampleProvide::where('campaign_id',$data['campaign']->id)->get();
            $data['headings'] = array_keys(json_decode($data['influencer_list'][0]->other_data,true));
        }
        return view('admin/campaign/campaign_details',$data);
    }



    public function campaignStatusChange(Request $request, $id)
    {
        Campaign::where('unique_id',$id)->update([
            'status' => $request->status
        ]);

        if($request->status == 'live'){
            $campaign = Campaign::whereUniqueId($id)->first();
            $live_count = CampaignLiveBriefDetail::whereCampaignId($campaign->id)->count();
            if($live_count == 0){
                $influencer_list = CampaignSampleProvide::where('campaign_id',$campaign->id)->where('selected', 1)->get()->toArray();
                if($influencer_list != null && count($influencer_list) > 0){
                    foreach($influencer_list as $list){

                        CampaignLiveBriefDetail::create([
                            'campaign_id'   => $campaign->id,
                            'influencer_name'   => $list['influencer_details'],
                            'influencer_link'   => $list['influencer_link'],
                        ]);
                    }
                }
            }
        }

        $request->session()->flash('msg','Status Saved Successfully');
        return redirect()->route('admin.campaign.details',$id);
    }

    public function campaignSampleUpload(Request $request,$id)
    {
        // $request->dd();
        CampaignSampleProvide::where('campaign_id', $request->id)->delete();
        Excel::import(new SampleInfulencerDetails($request->id), request()->file('excel'));
        // dd('yes');
        $request->session()->flash('msg','Status Saved Successfully');
        return redirect()->route('admin.campaign.details',$id);
    }

    public function campaignSampleChanges(Request $request,$id)
    {
        $influencer_list = CampaignSampleProvide::where('campaign_id',$request->campaign_id)->get()->toArray();
        // $request->dd();
        // dd($influencer_list[0]['other_data']);
        $headings = array_keys(json_decode($influencer_list[0]['other_data'],true));
        foreach($influencer_list as $list){
            $json_arr = [];
            foreach ($headings as $one) {
                $json_arr[$one] = $request[$one.'_'.$list['id']];
            }
            // dd(json_encode($json_arr));
            $remark_admin = isset($request['admin_remark_'.$list['id']]) ? $request['admin_remark_'.$list['id']] : null;
            CampaignSampleProvide::where('id', $list['id'])->update([
                'admin_remark'    => $remark_admin,
                'other_data'    => json_encode($json_arr)
            ]);

            // add remarks
            if($remark_admin != null){
                CampaignSampleProvidedRemark::create([
                    'campaign_id'                   => $request->campaign_id,
                    'campaign_sample_provide_id'    => $list['id'],
                    'type'                          => 'admin',
                    'remark'                        => $remark_admin,
                ]);
            }
            
        }
        $request->session()->flash('msg','List Saved Successfully');
        return redirect()->back();
    }
}
