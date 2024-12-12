<?php

namespace Database\Factories;

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
            'address_id' => null,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (MinistryMeeting $ministryMeeting) {
            $ministryMeeting->address_id = DB::table('addresses')
                ->inRandomOrder()
                ->value('id');
            $ministryMeeting->save();
        });
    }
}
