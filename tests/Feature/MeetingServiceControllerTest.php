<?php

use App\Models\Meeting;
use App\Models\Service;
use Database\Seeders\DatabaseSeeder;

use function Pest\Laravel\postJson;

beforeEach(function () {
  $this->artisan('migrate:fresh');
  $this->seed(DatabaseSeeder::class);
});

test('MeetingServiceController creates Service and Meeting with shared date', function () {
  $payload = [
    'date' => '2025-02-20',

    'service' => [
      'scene' => 'Main Hall',
      'microphones' => '2',
      'voiceover_zoom' => 'Enabled',
      'administrator' => 'John Doe',
    ],

    'meeting' => [
      'leading' => 'Alice Smith',
      'speaker' => 'Bob Johnson',
      'speech_title' => 'The Future of AI',
      'lead_wt' => 'Jane Doe',
      'reader' => 'Michael Brown',
      'closing_prayer' => 'Emily White',
      'special_program' => 'Panel Discussion',
      'status_id' => 1,
      'address_id' => 1,
      'ministry_meeting_id' => 1,
    ]
  ];

  $response = postJson('/api/meeting-service', $payload);

  $response->assertStatus(201)
    ->assertJsonStructure([
      'message',
      'data' => [
        'service' => ['id', 'date', 'scene', 'microphones', 'voiceover_zoom', 'administrator'],
        'meeting' => [
          'id',
          'date',
          'leading',
          'speaker',
          'speech_title',
          'lead_wt',
          'reader',
          'closing_prayer',
          'special_program',
          'status_id',
          'service_id',
          'address_id',
          'ministry_meeting_id'
        ],
      ],
    ]);

  expect(Meeting::where('leading', 'Alice Smith')->where('date', '2025-02-20')->exists())->toBeTrue();
  expect(Service::where('scene', 'Main Hall')->where('date', '2025-02-20')->exists())->toBeTrue();
});
