<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendlyMeeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'address_url',
        'date',
        'description',
        'inviting',
    ];
}
