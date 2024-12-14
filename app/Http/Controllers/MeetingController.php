<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    public function index()
    {
        return Meeting::with(['address', 'status', 'ministryMeeting'])->get();
    }

    public function show(Meeting $meeting)
    {
        return Meeting::with(['address', 'status', 'ministryMeeting'])
            ->where('id', '=', $meeting->id)
            ->get();
    }
}
