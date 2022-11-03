<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'for_package_id',
        'short_desc',
        'long_desc',
        'price_flag',
        'monthly',
        'quarterly',
        'yearly',
        'status',
    ];

    public function values()
    {
        return $this->belongsToMany(PackageValue::class, 'package_includes')->withPivot('display_text','exist');
    }

    public function pfor()
    {
        return $this->hasOne(ForPackage::class);
    }
}
