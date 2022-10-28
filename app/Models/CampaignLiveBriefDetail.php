<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignLiveBriefDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        "campaign_id",
        "influencer_name",
        "influencer_link",
        "deliverables",
        "cost",
        "live_date",
        "live_links",
        "whole_data",
    ];
}
