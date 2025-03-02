<?php

use App\Models\FriendlyMeeting;
use App\Models\MinistryMeeting;

use function Pest\Laravel\patchJson;
use function Pest\Laravel\postJson;

it('creates ministry without friendly', function () {
    $payload = [
        'with_friendly' => false,
        'ministry' => [
            'date' => '2025-03-15',
            'leader' => 'John Doe',
        ]
    ];

    $response = postJson('/api/ministry-friendly', $payload);

    $response->assertStatus(201)
        ->assertJson([
            'message' => 'Ministry and Friendly created successfully.',
            'data' => [
                'ministry' => [
                    'date' => '2025-03-15',
                    'leader' => 'John Doe',
                ],
                'friendly' => null
            ]
        ]);

    expect(MinistryMeeting::where('date', '2025-03-15')->exists())->toBeTrue();
});

it('creates ministry with friendly', function () {
    $payload = [
        'with_friendly' => true,
        'ministry' => [
            'date' => '2025-03-15',
            'leader' => 'John Doe',
        ],
        'friendly' => [
            'date' => '2025-03-16',
            'address' => 'New Location',
            'address_url' => 'https://example.com',
            'description' => 'Meeting description',
            'inviting' => 'Everyone'
        ]
    ];

    $response = postJson('/api/ministry-friendly', $payload);

    $response->assertStatus(201)
        ->assertJson([
            'message' => 'Ministry and Friendly created successfully.',
            'data' => [
                'ministry' => [
                    'date' => '2025-03-15',
                    'leader' => 'John Doe',
                ],
                'friendly' => [
                    'date' => '2025-03-16',
                    'address' => 'New Location',
                    'description' => 'Meeting description',
                ]
            ]
        ]);

    expect(MinistryMeeting::where('date', '2025-03-15')->exists())->toBeTrue();
    expect(FriendlyMeeting::where('date', '2025-03-16')->exists())->toBeTrue();
});

it('updates ministry with friendly', function () {
    $friendly = FriendlyMeeting::factory()->create([
        'date' => '2025-03-10',
        'address' => 'Old Address',
        'description' => 'Old description',
    ]);

    $ministry = MinistryMeeting::factory()->create([
        'date' => '2025-03-11',
        'leader' => 'Old Leader',
        'friendly_meeting_id' => $friendly->id
    ]);

    $payload = [
        'with_friendly' => true,
        'ministry' => [
            'date' => '2025-03-20',
            'leader' => 'New Leader',
        ],
        'friendly' => [
            'date' => '2025-03-21',
            'address' => 'New Address',
            'description' => 'Updated description',
        ]
    ];

    $response = patchJson("/api/ministry-friendly/{$ministry->id}", $payload);

    $response->assertStatus(200)
        ->assertJson([
            'message' => 'Ministry and Friendly updated successfully.',
            'data' => [
                'ministry' => [
                    'date' => '2025-03-20',
                    'leader' => 'New Leader',
                ],
                'friendly' => [
                    'date' => '2025-03-21',
                    'address' => 'New Address',
                    'description' => 'Updated description',
                ]
            ]
        ]);

    $ministry->refresh();
    $friendly->refresh();

    expect($ministry->date)->toBe('2025-03-20 00:00:00');
    expect($friendly->date)->toBe('2025-03-21 00:00:00');
});

it('updates ministry and removes friendly when with_friendly is false', function () {
    $friendly = FriendlyMeeting::factory()->create();
    $ministry = MinistryMeeting::factory()->create(['friendly_meeting_id' => $friendly->id]);

    $payload = [
        'with_friendly' => false,
        'ministry' => [
            'date' => '2025-03-22',
            'leader' => 'Updated Leader',
        ]
    ];

    $response = patchJson("/api/ministry-friendly/{$ministry->id}", $payload);

    $response->assertStatus(200)
        ->assertJson([
            'message' => 'Ministry and Friendly updated successfully.',
            'data' => [
                'ministry' => [
                    'date' => '2025-03-22',
                    'leader' => 'Updated Leader',
                ],
                'friendly' => null
            ]
        ]);

    $ministry->refresh();

    expect($ministry->date)->toBe('2025-03-22 00:00:00');
    expect(FriendlyMeeting::find($friendly->id))->toBeNull();
});
