<?php

namespace App\Http\Controllers;

use App\Models\MinistryMeeting;
use Illuminate\Support\Facades\DB;

class MinistryMeetingController extends Controller
{
    public function index()
    {
        return DB::select(
            'SELECT ministry_meetings.*, address.*
             FROM ministry_meetings
             LEFT JOIN addresses AS address
             ON ministry_meetings.address_id = address.id'
        );
    }

    public function show(MinistryMeeting $ministryMeeting)
    {
        return DB::select(
            'SELECT ministry_meetings.*, address.*
             FROM ministry_meetings
             LEFT JOIN addresses AS address
             ON ministry_meetings.address_id = address.id
             WHERE ministry_meetings.id = :id',
            ['id' => $ministryMeeting->id]
        );
    }
}
