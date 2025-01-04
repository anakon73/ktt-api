<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunAllCleanups extends Command
{
    protected $signature = 'run:all-cleanups';
    protected $description = 'Run all cleanup commands';

    public function handle()
    {
        $this->call('meetings:delete-old');
        $this->call('friendly-meetings:delete-old');
        $this->call('ministry-meetings:delete-old');
        $this->call('services:delete-old');
    }
}
