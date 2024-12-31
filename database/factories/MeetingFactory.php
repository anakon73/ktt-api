<?php

namespace Database\Factories;

use App\Models\Meeting;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MeetingFactory extends Factory
{
    public function definition(): array
    {
        $date = $this->faker->dateTimeThisMonth();

        return [
            'created_at' => $date,
            'updated_at' => $date,
            'date' => $date,
            'leading' => $this->faker->name('male'),
            'speaker' => $this->faker->name('male'),
            'speech_title' => $this->faker->words(3, true),
            'lead_wt' => $this->faker->name('male'),
            'reader' => $this->faker->name('male'),
            'closing_prayer' => $this->faker->name('male'),
            'special_program' => $this->faker->words(3, true),
            'service_id' => null,
            'address_id' => DB::table('addresses')
                ->inRandomOrder()
                ->value('id'),
            'ministry_meeting_id' => null,
            'status_id' => DB::table('meeting_statuses')
                ->inRandomOrder()
                ->value('id',)
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Meeting $meeting) {
            $service = Service::factory()->create(['date' => $meeting->date]);
            $meeting->service_id = $service->id;

            $availableMinistryMeetingId = DB::select("
                SELECT mm.id
                FROM ministry_meetings mm
                LEFT JOIN meetings m ON m.ministry_meeting_id = mm.id
                WHERE m.ministry_meeting_id IS NULL
                ORDER BY RANDOM()
                LIMIT 1
            ");

            if ($availableMinistryMeetingId) {
                $meeting->ministry_meeting_id = $availableMinistryMeetingId[0]->id;
                $meeting->save();
            } else {
                Log::warning('No available Ministry Meeting ID found for meeting ID: ' . $meeting->id);
            }

            $meeting->save();
        });
    }
}
