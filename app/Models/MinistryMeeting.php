<?php

namespace App\Models;

use Database\Factories\MinistryMeetingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinistryMeeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'leader',
        'address_id',
        'friendly_meeting_id',
    ];

    public function friendlyMeeting()
    {
        return $this->belongsTo(FriendlyMeeting::class);
    }
}
