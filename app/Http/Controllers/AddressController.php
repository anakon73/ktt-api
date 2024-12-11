<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\StoreAddressRequest;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function index()
    {
        return DB::select('SELECT * FROM addresses');
    }

    public function show(Address $address)
    {
        return DB::select(
            'SELECT * FROM addresses WHERE id = :id',
            ['id' => $address->id]
        );
    }

    public function store(StoreAddressRequest $request)
    {
        $validated = $request->validated();

        DB::insert(
            'INSERT INTO addresses
            (address, address_url, created_at, updated_at)
            VALUES
            (:address, :address_url, :created_at, :updated_at)',
            [
                'address' => $validated['address'],
                'address_url' => $validated['address_url'],
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        return $validated;
    }
}
