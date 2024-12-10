<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    public function index()
    {
        return DB::select('select * from meetings');
    }

    public function show(Meeting $meeting)
    {
        return DB::select(
            'select * from meetings where id = :id',
            ['id' => $meeting->id]
        );
    }

    public function getByDate($date)
    {
        return DB::select(
            'select * from meetings where DATE(created_at) = :date',
            ['date' => $date]
        );
    }
}
