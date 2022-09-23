<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Influencer;

class Platform extends Model
{
    use HasFactory;

     public function platforms()
    {
        return $this->belongsToMany(Influencer::class,'influencers_platforms')->withPivot('channel_link');
    }
}
