<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMeetingServiceRequest;
use App\Http\Requests\UpdateMeetingServiceRequest;

class MeetingServiceController extends Controller
{
    public function store(StoreMeetingServiceRequest $request)
    {
        $date = $request->input('date');

        DB::beginTransaction();
        try {
            $service = Service::create(array_merge(
                $request->input('service', []),
                ['date' => $date]
            ));

            $meeting = Meeting::create(array_merge(
                $request->input('meeting', []),
                ['date' => $date, 'service_id' => $service->id]
            ));

            DB::commit();

            return response()->json([
                'message' => 'Service and Meeting created successfully.',
                'data' => [
                    'service' => $service,
                    'meeting' => $meeting,
                ]
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'An error occurred while creating the records.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateMeetingServiceRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $meeting = Meeting::findOrFail($id);
            $service = Service::findOrFail($meeting->service_id);

            $date = $request->input('date');

            $service->update(array_merge(
                $request->input('service', []),
                ['date' => $date]
            ));

            $meeting->update(array_merge(
                $request->input('meeting', []),
                ['date' => $date]
            ));

            DB::commit();

            return response()->json([
                'message' => 'Service and Meeting updated successfully.',
                'data' => [
                    'service' => $service,
                    'meeting' => $meeting,
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'An error occurred while updating the records.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
