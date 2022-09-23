<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Influencer_query extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'number',
        'w_number',
        'gender',
        'age',
        'channel_link',
        'msg',
        // 'city',
        // 'state',
    ];
}
