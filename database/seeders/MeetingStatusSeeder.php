<?php

namespace Database\Seeders;

use App\Models\MeetingStatus;
use Illuminate\Database\Seeder;

class MeetingStatusSeeder extends Seeder
{
    public $statuses = ['Собрание', 'Вечеря', 'Спец. программа', 'Конгресс'];

    public function run(): void
    {
        foreach ($this->statuses as $status) {
            MeetingStatus::factory()->create(['title' => $status]);
        }
    }
}
