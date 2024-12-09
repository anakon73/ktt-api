<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'place_address' => $this->faker->address(),
            'place_url' => 'https://maps.app.goo.gl/Z8fAGGWtun9ssfva8',
        ];
    }
}
