<?php

namespace Database\Factories;

use App\Models\FriendlyMeeting;
use App\Models\MinistryMeeting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class MinistryMeetingFactory extends Factory
{
    protected $model = MinistryMeeting::class;

    public function definition(): array
    {
        $date = $this->faker->dateTimeThisMonth();

        return [
            'created_at' => $date,
            'updated_at' => $date,
            'date' => $date,
            'leader' => $this->faker->name('male'),
            'address' => $this->faker->address(),
            'address_url' => $this->faker->url(),
            'friendly_meeting_id' => $this->faker->boolean(50)
                ? FriendlyMeeting::factory()->create()->id
                : null,
        ];
    }
}
