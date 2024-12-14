<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFriendlyMeetingRequest;
use App\Models\FriendlyMeeting;
use Illuminate\Support\Facades\DB;

class FriendlyMeetingController extends Controller
{
    public function index()
    {
        return DB::select('SELECT * FROM friendly_meetings');
    }

    public function show(FriendlyMeeting $friendlyMeeting)
    {
        return DB::select(
            'SELECT * FROM friendly_meetings WHERE id = :id',
            ['id' => $friendlyMeeting->id]
        );
    }

    public function store(StoreFriendlyMeetingRequest $request)
    {
        $validated = $request->validated();

        DB::insert(
            'INSERT INTO friendly_meetings
            (address, address_url, created_at, updated_at, date, description, inviting)
            VALUES
            (:address, :address_url, :created_at, :updated_at, :date, :description, :inviting)',
            [
                'address' => $validated['address'],
                'address_url' => $validated['address_url'],
                'created_at' => now(),
                'updated_at' => now(),
                'date' => $validated['date'],
                'description' => $validated['description'],
                'inviting' => $validated['inviting'],
            ]
        );

        return $validated;
    }
}
