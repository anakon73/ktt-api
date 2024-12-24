<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\StoreAddressRequest;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function index()
    {
        return Address::all();
    }

    public function show($id)
    {
        $address = Address::find($id);

        if (!$address) {
            return response()->json([
                'message' => 'Address not found.',
            ], 404);
        }

        return $address;
    }

    public function store(StoreAddressRequest $request)
    {
        $address = Address::create($request->validated());

        return response()->json([
            'message' => 'Address created successfully.',
            'data' => $address,
        ]);
    }

    public function destroy(int $id)
    {
        $address = Address::find($id);

        if (!$address) {
            return response()->json([
                'message' => 'Address not found.',
            ], 404);
        }

        $address->delete();

        return response()->json([
            'message' => 'Address deleted successfully.',
        ]);
    }
}
