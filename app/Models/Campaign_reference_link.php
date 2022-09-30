<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign_reference_link extends Model
{
    use HasFactory;
    protected $fillable = [
        "campaign_id",
        "link",
    ];
}
