<?php

use App\Http\Controllers\MeetingController;
use Illuminate\Support\Facades\Route;

Route::prefix('/meetings')->controller(MeetingController::class)->group(function () {
  Route::get('/', 'index');
  Route::get('/date/{date}', 'getByDate');
  Route::get('/{meeting}', 'show');
});
