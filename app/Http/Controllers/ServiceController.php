<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        return DB::select('select * from services');
    }

    public function show(Service $service)
    {
        return DB::select(
            'select * from services where id = :id',
            ['id' => $service->id]
        );
    }

    public function getByDate($date)
    {
        return DB::select(
            'select * from services where DATE(created_at) = :date',
            ['date' => $date]
        );
    }
}
