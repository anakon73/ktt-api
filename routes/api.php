<?php

use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::prefix('/meetings')->controller(MeetingController::class)->group(function () {
  Route::get('/', 'index');
  Route::get('/date/{date}', 'getByDate');
  Route::get('/{meeting}', 'show');
});

Route::prefix('/services')->controller(ServiceController::class)->group(function () {
  Route::get('/', 'index');
  Route::get('/date/{date}', 'getByDate');
  Route::get('/{service}', 'show');
});
