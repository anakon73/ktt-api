<?php

namespace App\Console\Commands;

use App\Models\MinistryMeeting;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteOldMinistryMeetings extends Command
{
    protected $signature = 'ministry-meetings:delete-old';
    protected $description = 'Delete ministry meetings that are older than 24 hours';

    public function handle()
    {
        $cutoffTime = Carbon::now()->subHours(24);

        MinistryMeeting::where('date', '<', $cutoffTime)->delete();
    }
}
