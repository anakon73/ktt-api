<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeetingRequest;
use App\Http\Requests\UpdateMeetingRequest;
use App\Models\Meeting;

class MeetingController extends Controller
{
    public function index()
    {
        return Meeting::with(['address', 'status', 'ministryMeeting.friendlyMeeting', 'service'])
            ->orderBy('date', 'asc')
            ->get();
    }

    public function show($id)
    {
        $meeting = Meeting::with(['address', 'status', 'ministryMeeting.friendlyMeeting', 'service'])->find($id);

        if (!$meeting) {
            return response()->json([
                'message' => 'Meeting not found'
            ], 404);
        }

        return $meeting;
    }

    public function store(StoreMeetingRequest $request)
    {
        $meeting = Meeting::create($request->validated());

        return response()->json([
            'message' => 'Meeting created successfully',
            'data' => $meeting
        ]);
    }

    public function update(UpdateMeetingRequest $request, $id)
    {
        $meeting = Meeting::find($id);

        if (!$meeting) {
            return response()->json([
                'message' => 'Meeting not found.',
            ], 404);
        }

        $updatedData = array_merge(
            $meeting->toArray(),
            array_filter($request->validated(), fn($value) => !is_null($value))
        );

        $meeting->update($updatedData);

        return response()->json([
            'message' => 'Meeting updated successfully.',
            'data' => $meeting,
        ]);
    }

    public function destroy($id)
    {
        $meeting = Meeting::find($id);

        if (!$meeting) {
            return response()->json([
                'message' => 'Meeting not found.',
            ], 404);
        }

        $meeting->delete();

        return response()->json([
            'message' => 'Meeting deleted successfully.',
        ]);
    }
}
