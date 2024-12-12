<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        return DB::select('SELECT * FROM services');
    }

    public function show(Service $service)
    {
        return DB::select(
            'SELECT * FROM services WHERE id = :id',
            ['id' => $service->id]
        );
    }
}
