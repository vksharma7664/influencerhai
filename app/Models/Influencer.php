<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Category;
use \App\Models\Platform;

class Influencer extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Category::class,'influencers_categories');
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class,'influencers_platforms')->withPivot('channel_link');
    }

    public function type_category()
    {
        return $this->belongsTo(Category::class,'type','id');
    }
}
