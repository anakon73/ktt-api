<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    public function index()
    {
        return DB::select(
            'SELECT meetings.*, address.*
             FROM meetings
             LEFT JOIN addresses AS address
             ON meetings.address_id = address.id'
        );
    }

    public function show(Meeting $meeting)
    {
        return DB::select(
            'SELECT meetings.*, address.*
             FROM meetings
             LEFT JOIN addresses AS address
             ON meetings.address_id = address.id
             WHERE meetings.id = :id',
            ['id' => $meeting->id]
        );
    }
}
