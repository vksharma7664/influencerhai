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
        return view('admin/campaign/campaign_details',$data);
    }

    public function campaignStatusChange(Request $request, $id)
    {
        Campaign::where('unique_id',$id)->update([
            'status' => $request->status
        ]);
        $request->session()->flash('msg','Status Saved Successfully');
            return redirect()->route('admin.campaign.details',$id);
    }

    public function campaignSampleUpload(Request $request)
    {
        Excel::import(new SampleInfulencerDetails, request()->file('excel'));
        dd('yes');
    }
}
