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
        $this->info('Starting to check for old meetings...');

        $cutoffTime = Carbon::now()->subHours(24);

        $deletedCount = Meeting::where('date', '<', $cutoffTime)->delete();

        $this->info("Successfully deleted {$deletedCount} old meetings");
    }
}
