<?php

namespace App\Console\Commands;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteOldServices extends Command
{
    protected $signature = 'services:delete-old';
    protected $description = 'Delete services that are older than 24 hours';

    public function handle()
    {
        $cutoffTime = Carbon::now()->subHours(24);

        Service::where('date', '<', $cutoffTime)->delete();
    }
}
