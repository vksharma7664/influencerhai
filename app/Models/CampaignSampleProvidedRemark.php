<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignSampleProvidedRemark extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'campaign_sample_provide_id',
        'type',
        'remark',
    ];
}
