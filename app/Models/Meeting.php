<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'leading',
        'speech_title',
        'lead_wt',
        'reader',
        'closing_prayer',
        'special_program',
        'status_id',
        'service_id',
        'address_id',
        'ministry_meeting_id',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function status()
    {
        return $this->belongsTo(MeetingStatus::class, 'status_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function ministryMeeting()
    {
        return $this->belongsTo(MinistryMeeting::class, 'ministry_meeting_id');
    }
}
