<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    public function index()
    {
        return DB::select('SELECT * FROM meetings');
    }

    public function show(Meeting $meeting)
    {
        return DB::select(
            'SELECT * FROM meetings WHERE id = :id',
            ['id' => $meeting->id]
        );
    }

    public function getByDate($date)
    {
        return DB::select(
            'SELECT * FROM meetings WHERE DATE(created_at) = :date',
            ['date' => $date]
        );
    }
}
