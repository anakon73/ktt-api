<?php

namespace Database\Seeders;

use App\Models\MinistryMeeting;
use Illuminate\Database\Seeder;

class MinistryMeetingSeeder extends Seeder
{
    public function run(): void
    {
        MinistryMeeting::factory(10)->create();
    }
}
