<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\FriendlyMeetingController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\MinistryMeetingController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::prefix('/meetings')->controller(MeetingController::class)->group(function () {
  Route::get('/', 'index');
  Route::get('/{id}', 'show');
  Route::post('/', 'store');
  Route::patch('/{id}', 'update');
  Route::delete('/{id}', 'destroy');
});

Route::prefix('/ministry-meetings')->controller(MinistryMeetingController::class)->group(function () {
  Route::get('/', 'index');
  Route::get('/{id}', 'show');
  Route::post('/', 'store');
  Route::patch('/{id}', 'update');
  Route::delete('/{id}', 'destroy');
});

Route::prefix('/services')->controller(ServiceController::class)->group(function () {
  Route::get('/', 'index');
  Route::get('/{id}', 'show');
  Route::post('/', 'store');
  Route::patch('/{id}', 'update');
  Route::delete('/{id}', 'destroy');
});

Route::prefix('/addresses')->controller(AddressController::class)->group(function () {
  Route::get('/', 'index');
  Route::get('/{id}', 'show');
  Route::post('/', 'store');
  Route::delete('/{id}', 'destroy');
});

Route::prefix('/friendly-meetings')->controller(FriendlyMeetingController::class)->group(function () {
  Route::get('/', 'index');
  Route::get('/{id}', 'show');
  Route::post('/', 'store');
  Route::patch('/{id}', 'update');
  Route::delete('/{id}', 'destroy');
});

Route::post('/run-all-cleanups', function () {
  Artisan::call('run:all-cleanups');
});
