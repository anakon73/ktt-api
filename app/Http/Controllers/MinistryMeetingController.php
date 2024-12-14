<?php

namespace App\Http\Controllers;

use App\Models\MinistryMeeting;

class MinistryMeetingController extends Controller
{
    public function index()
    {
        return MinistryMeeting::with(['address', 'friendlyMeeting'])->get();
    }

    public function show(MinistryMeeting $ministryMeeting)
    {
        return  MinistryMeeting::with(['address', 'friendlyMeeting'])
            ->where('id', '=', $ministryMeeting->id)
            ->get();
    }
}
