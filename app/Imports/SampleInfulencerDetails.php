<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\CampaignSampleProvide;

class SampleInfulencerDetails implements ToModel, WithHeadingRow#ToCollection
{
    /**
    * @param Collection $collection
    */
    // public function collection(Collection $collection)
    // {
    //     //
    //      foreach ($collection as $row) 
    //     {
    //         print_r($row);
    //     }
    // }

    protected $campaign_id;

    public function __construct($id)
    {
        // code...
        $this->campaign_id = $id;
    }

    public function model(array $row)
    {
        //instagram_user_name
         // instagram_user_name, followers, name, gender, city, category, insta_link, ig_static_post_amt, ig_video_post_amt, ig_static_story_amt , ig_video_story_amt , ig_swipe_up_amt , igtvig_live_amt , ig_link_in_bio , ig_review_amt , ig_carousel_post_amt , ig_reels_amt , ig_collab_reel , payment_terms , other_details

        // foreach ($row as $row1) 
        // {
            // print_r(array_keys($row));
            // dd($this->campaign_id);
        // }

        $test = CampaignSampleProvide::create([
            'campaign_id'           => $this->campaign_id,
            'influencer_details'    => $row['instagram_user_name'],
            'other_data'            => json_encode($row),
        ]);
    }
}
