<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Meeting;
use Carbon\Carbon;

class DeleteOldMeetings extends Command
{
    protected $signature = 'meetings:delete-old';
    protected $description = 'Delete meetings that are older than 24 hours';

    public function handle()
    {
        $cutoffTime = Carbon::now()->subHours(24);

        $deletedCount = Meeting::where('date', '<', $cutoffTime)->delete();

        return $deletedCount;
    }
}
