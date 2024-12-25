<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMinistryMeetingRequest;
use App\Http\Requests\UpdateMinistryMeetingRequest;
use App\Models\MinistryMeeting;

class MinistryMeetingController extends Controller
{
    public function index()
    {
        return MinistryMeeting::with(['friendlyMeeting'])->get();
    }

    public function show($id)
    {
        $ministryMeeting = MinistryMeeting::with(['friendlyMeeting'])->find($id);

        if (!$ministryMeeting) {
            return response()->json([
                'message' => 'Ministry meeting not found'
            ], 404);
        }

        return $ministryMeeting;
    }

    public function store(StoreMinistryMeetingRequest $request)
    {
        $ministryMeeting = MinistryMeeting::create($request->validated());

        return response()->json([
            'message' => 'Ministry Meeting created successfully',
            'data' => $ministryMeeting
        ]);
    }

    public function update(UpdateMinistryMeetingRequest $request, $id)
    {
        $ministryMeeting = MinistryMeeting::find($id);

        if (!$ministryMeeting) {
            return response()->json([
                'message' => 'Ministry meeting not found.',
            ], 404);
        }

        $updatedData = array_merge(
            $ministryMeeting->toArray(),
            array_filter($request->validated(), fn($value) => !is_null($value))
        );

        $ministryMeeting->update($updatedData);

        return response()->json([
            'message' => 'Ministry meeting updated successfully.',
            'data' => $ministryMeeting,
        ]);
    }

    public function destroy($id)
    {
        $ministryMeeting = MinistryMeeting::find($id);

        if (!$ministryMeeting) {
            return response()->json([
                'message' => 'Ministry meeting not found.',
            ], 404);
        }

        $ministryMeeting->delete();

        return response()->json([
            'message' => 'Ministry meeting deleted successfully.',
        ]);
    }
}
