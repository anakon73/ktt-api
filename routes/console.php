<?php

use App\Console\Commands\DeleteOldFriendlyMeetings;
use App\Console\Commands\DeleteOldMeetings;
use App\Console\Commands\DeleteOldMinistryMeetings;
use App\Console\Commands\DeleteOldServices;
use App\Console\Commands\RunAllCleanups;
use Illuminate\Support\Facades\Schedule;

Schedule::command(DeleteOldMeetings::class);
Schedule::command(DeleteOldServices::class);
Schedule::command(DeleteOldFriendlyMeetings::class);
Schedule::command(DeleteOldMinistryMeetings::class);
Schedule::command(RunAllCleanups::class);
