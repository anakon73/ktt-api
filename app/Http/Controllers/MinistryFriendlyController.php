<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMinistryFriendlyRequest;
use App\Http\Requests\UpdateMinistryFriendlyRequest;
use App\Models\FriendlyMeeting;
use App\Models\MinistryMeeting;
use Illuminate\Support\Facades\DB;

class MinistryFriendlyController extends Controller
{
  public function store(StoreMinistryFriendlyRequest $request)
  {
    DB::beginTransaction();

    try {
      $friendly = null;

      if ($request->boolean('with_friendly')) {
        $friendly = FriendlyMeeting::create($request->input('friendly', []));
      }

      $ministry = MinistryMeeting::create(array_merge(
        $request->input('ministry', []),
        ['friendly_meeting_id' => $friendly?->id ?? null]
      ));

      DB::commit();

      return response()->json([
        'message' => 'Ministry and Friendly created successfully.',
        'data' => [
          'ministry' => $ministry,
          'friendly' => $friendly,
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

  public function update(UpdateMinistryFriendlyRequest $request, $id)
  {
    DB::beginTransaction();

    try {
      $ministry = MinistryMeeting::findOrFail($id);
      $ministry->update($request->input('ministry', []));

      $friendly = FriendlyMeeting::find($ministry->friendly_meeting_id);

      if ($request->boolean('with_friendly')) {
        if ($friendly) {
          $friendly->update($request->input('friendly', []));
        } else {
          $friendly = FriendlyMeeting::create($request->input('friendly', []));
          $ministry->update(['friendly_meeting_id' => $friendly->id]);
        }
      } else {
        if ($friendly) {
          $friendly->delete();
          $ministry->update(['friendly_meeting_id' => null]);
        }

        $friendly = null;
      }

      DB::commit();

      return response()->json([
        'message' => 'Ministry and Friendly updated successfully.',
        'data' => [
          'ministry' => $ministry,
          'friendly' => $friendly,
        ]
      ], 200);
    } catch (\Exception $e) {
      DB::rollBack();

      return response()->json([
        'message' => 'An error occurred while creating the records.',
        'error' => $e->getMessage(),
      ], 500);
    }
  }
}
