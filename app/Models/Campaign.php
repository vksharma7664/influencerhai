<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
          "campaign_type",
          "user_id",
          //"unique_id",
          "payment_type",
          "title",
          "hastags",
          "description",
          "deadline",
          "live_date",
          "platform",
          "insta_reels_checkbox",
          "reels_count",
          "insta_story_checkbox",
          "story_count",
          "insta_bio_checkbox",
          "insta_video_self_checkbox",
          "insta_video_self_count",
          "insta_video_brand_checkbox",
          "insta_video_brand_count",
          "youtube_video_self_checkbox",
          "youtube_video_self_count",
          "youtube_video_brand_checkbox",
          "youtube_video_brand_count",
          "influencer_gender",
          "status",
    ];

    protected function deadline(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('j M Y', strtotime($value)),
            set: fn ($value) => date('Y-m-d', strtotime($value)),
        );
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            // set: fn ($value) => date('Y-m-d', strtotime($value)),
        );
    }

    protected function liveDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('j M Y', strtotime($value)),
            set: fn ($value) => date('Y-m-d', strtotime($value)),
        );
    }


    public function categories()
    {
        return $this->hasMany(Campaign_category::class);
    }

    public function locations()
    {
        return $this->hasMany(Campaign_location::class);
    }

    public function types()
    {
        return $this->hasMany(Campaign_influencer_type::class);
    }

    public function referenceLinks()
    {
        return $this->hasMany(Campaign_reference_link::class);
    }
}
