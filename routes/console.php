<?php

use App\Console\Commands\DeleteOldMeetings;
use Illuminate\Support\Facades\Schedule;

Schedule::command(DeleteOldMeetings::class)->daily();
