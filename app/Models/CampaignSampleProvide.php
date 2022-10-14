<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignSampleProvide extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'influencer_details',
        'other_data',
        'selected',
        'remark',
    ];
}
