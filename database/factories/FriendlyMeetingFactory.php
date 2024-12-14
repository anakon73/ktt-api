<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class FriendlyMeetingFactory extends Factory
{
    public function definition(): array
    {
        $date = $this->faker->dateTimeThisMonth();

        return [
            'created_at' => $date,
            'updated_at' => $date,
            'date' => $date,
            'description' => $this->faker->words(10, true),
            'inviting' => $this->faker->name(),
            'address' => $this->faker->address(),
            'address_url' => $this->faker->url(),
        ];
    }
}
