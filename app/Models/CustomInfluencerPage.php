<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomInfluencerPage extends Model
{
    use HasFactory;

    protected $fillable = [
          "title",
          "long_desc",
          "slug",
          "created_by",
          "meta_title",
          "meta_desc",
          "tags",
          "keywords",
    ];

    protected function title(): Attribute
    {
        return Attribute::make(
            // get: fn ($value) => date('j M Y', strtotime($value)),
            set: fn ($value) => ucwords($value),
        );
    }

     public function influencers()
    {
        return $this->belongsToMany(Influencer::class,'custom_influencer_pages_influencers');
    }
}
