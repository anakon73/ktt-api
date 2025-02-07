<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnouncementRequest;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        return Announcement::all();
    }

    public function show($id)
    {
        $announcement = Announcement::find($id);

        if (!$announcement) {
            return response()->json([
                'message' => 'Announcement not found.',
            ], 404);
        }

        return $announcement;
    }

    public function store(StoreAnnouncementRequest $request)
    {
        $data = $request->validated();

        $data['announcement_url'] = preg_replace('#/view\?.*#', '/preview', $data['announcement_url']);

        $announcement = Announcement::create($data);

        return response()->json([
            'message' => 'Announcement created successfully.',
            'data' => $announcement,
        ]);
    }

    public function destroy($id)
    {
        $announcement = Announcement::find($id);

        if (!$announcement) {
            return response()->json([
                'message' => 'Announcement not found.',
            ], 404);
        }

        $announcement->delete();

        return response()->json([
            'message' => 'Announcement deleted successfully.',
        ]);
    }
}
