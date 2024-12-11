<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;


class AddressSeeder extends Seeder
{
    public $addresses = [
        [
            'address' => 'Češky Těšín',
            'address_url' => 'https://maps.app.goo.gl/9GandporvbPBS27t8',
        ],
        [
            'address' => 'Třinec',
            'address_url' => 'https://maps.app.goo.gl/5CPqcRg5WWp4xrveA',
        ],
        [
            'address' => 'Karviná',
            'address_url' => 'https://maps.app.goo.gl/9t986LcQiUjcGCNH9',
        ]
    ];

    public function run(): void
    {
        foreach ($this->addresses as $address) {
            Address::factory()->create([
                'address' => $address['address'],
                'address_url' => $address['address_url'],
            ]);
        }
    }
}
