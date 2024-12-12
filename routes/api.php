<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\MinistryMeetingController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::prefix('/meetings')->controller(MeetingController::class)->group(function () {
  Route::get('/', 'index');
  Route::get('/{meeting}', 'show');
});

Route::prefix('/ministry-meetings')->controller(MinistryMeetingController::class)->group(function () {
  Route::get('/', 'index');
  Route::get('/{ministryMeeting}', 'show');
});

Route::prefix('/services')->controller(ServiceController::class)->group(function () {
  Route::get('/', 'index');
  Route::get('/{service}', 'show');
});

Route::prefix('addresses')->controller(AddressController::class)->group(function () {
  Route::get('/', 'index');
  Route::get('/{address}', 'show');
  Route::post('/', 'store');
});
