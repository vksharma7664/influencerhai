<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand_query extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'designation',
        'company_name',
        'budget',
        'platform',
        'influencer_type',
        'number',
        'message',
    ];
}
