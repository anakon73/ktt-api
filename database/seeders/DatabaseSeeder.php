<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AddressSeeder::class,
            MeetingStatusSeeder::class,
            MinistryMeetingSeeder::class,
            MeetingSeeder::class,
        ]);
    }
}
