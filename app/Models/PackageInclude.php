<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageInclude extends Model
{
    use HasFactory;
    protected $fillable = [
        'package_id',
        'package_value_id',
        'display_text',
        'exist',
    ];

    public function pvalues()
    {
        return $this->belongsTo(PackageValue::class);
    }

    public function package()
    {
        return $this->belongsTo(package::class);
    }
}
