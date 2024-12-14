<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function status()
    {
        return $this->belongsTo(MeetingStatus::class, 'status_id');
    }

    public function ministryMeeting()
    {
        return $this->belongsTo(MinistryMeeting::class, 'ministry_meeting_id');
    }
}
