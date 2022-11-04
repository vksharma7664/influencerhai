<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageValue extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'package_value_area_id'
    ];

    public function packages()
    {

        return $this->belongsToMany(Package::class, 'package_includes')->withPivot('display_text','exist');;

    }

    

    public function pvalueArea()
    {
        return $this->belongsTo(PackageValueArea::class,'package_value_area_id');
    }
}
