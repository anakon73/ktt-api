<?php

namespace App\Models;

use Database\Factories\MinistryMeetingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinistryMeeting extends Model
{
    use HasFactory;

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function friendlyMeeting()
    {
        return $this->belongsTo(FriendlyMeeting::class);
    }
}
