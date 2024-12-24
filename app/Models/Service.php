<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'scene',
        'microphones',
        'voiceover_zoom',
        'administrator',
    ];

    public function meeting()
    {
        return $this->hasOne(Meeting::class);
    }
}
