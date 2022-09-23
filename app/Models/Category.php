<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Influencer;
use \App\Models\Platform;

class Category extends Model
{
    use HasFactory;


    public function influencers()
    {
        return $this->belongsToMany(Influencer::class,'influencers_categories');
    }

    public function type_influencers()
    {
        return $this->hasMany(Influencer::class,'type','id');
    }

}
