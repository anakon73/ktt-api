<?php

namespace App\Console\Commands;

use App\Models\FriendlyMeeting;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteOldFriendlyMeetings extends Command
{
    protected $signature = 'friendly-meetings:delete-old';
    protected $description = 'Delete friendly meetings that are older than 24 hours';

    public function handle()
    {
        $cutoffTime = Carbon::now()->subHours(24);

        FriendlyMeeting::where('date', '<', $cutoffTime)->delete();
    }
}
