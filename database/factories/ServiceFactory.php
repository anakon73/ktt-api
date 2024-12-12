<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        $date = $this->faker->dateTimeThisMonth();

        return [
            'created_at' => $date,
            'updated_at' => $date,
            'date' => $date,
            'scene' => $this->faker->name('male'),
            'microphones' => $this->faker->name('male'),
            'voiceover_zoom' => $this->faker->name('male'),
            'administrator' => $this->faker->name('male'),
            'meeting_id' => null,
        ];
    }
}
