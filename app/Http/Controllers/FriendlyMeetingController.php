<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFriendlyMeetingRequest;
use App\Http\Requests\UpdateFriendlyMeetingRequest;
use App\Models\FriendlyMeeting;

class FriendlyMeetingController extends Controller
{
    public function index()
    {
        return FriendlyMeeting::all();
    }

    public function show($id)
    {
        $friendlyMeeting = FriendlyMeeting::find($id);

        if (!$friendlyMeeting) {
            return response()->json([
                'message' => 'Friendly meeting not found.',
            ], 404);
        }

        return $friendlyMeeting;
    }

    public function store(StoreFriendlyMeetingRequest $request)
    {
        $friendlyMeeting = FriendlyMeeting::create($request->validated());

        return response()->json([
            'message' => 'Friendly meeting created successfully.',
            'data' => $friendlyMeeting,
        ]);
    }

    public function update(UpdateFriendlyMeetingRequest $request, $id)
    {
        $friendlyMeeting = FriendlyMeeting::find($id);

        if (!$friendlyMeeting) {
            return response()->json([
                'message' => 'Friendly meeting not found.',
            ], 404);
        }

        $updatedData = array_merge(
            $friendlyMeeting->toArray(),
            array_filter($request->validated(), fn($value) => !is_null($value))
        );

        $friendlyMeeting->update($updatedData);

        return response()->json([
            'message' => 'Friendly meeting updated successfully.',
            'data' => $friendlyMeeting,
        ]);
    }

    public function destroy($id)
    {
        $friendlyMeeting = FriendlyMeeting::find($id);

        if (!$friendlyMeeting) {
            return response()->json([
                'message' => 'Friendly meeting not found.',
            ], 404);
        }

        $friendlyMeeting->delete();

        return response()->json([
            'message' => 'Friendly meeting deleted successfully.',
        ]);
    }
}
