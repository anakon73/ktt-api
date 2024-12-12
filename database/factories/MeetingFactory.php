<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Meeting;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class MeetingFactory extends Factory
{
    public function definition(): array
    {
        $createdAt = $this->faker->dateTimeThisMonth();
        return [
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
            'leading' => $this->faker->name('male'),
            'speaker' => $this->faker->name('male'),
            'speech_title' => $this->faker->words(3, true),
            'lead_wt' => $this->faker->name('male'),
            'reader' => $this->faker->name('male'),
            'closing_prayer' => $this->faker->name('male'),
            'special_program' => $this->faker->words(3, true),
            'service_id' => null,
            'address_id' => null,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Meeting $meeting) {
            $service = Service::factory()->create([
                'meeting_id' => $meeting->id
            ]);
            $meeting->service_id = $service->id;

            $meeting->address_id = DB::table('addresses')
                ->inRandomOrder()
                ->value('id');

            $meeting->save();
        });
    }
}
