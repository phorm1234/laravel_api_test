<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParkingLot;
// use App\Http\Requests\StoreParkingLotRequest;
// use App\Http\Requests\UpdateParkingLotRequest;

class ParkingLotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $latitude = $request->latitude;
        $longitude = $request->longitude;

        $parkingLots = ParkingLot::selectRaw("*, ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", 100)
            ->orderBy("distance", "asc")
            ->get();

        return response()->json($parkingLots);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParkingLotRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $parkingLot = ParkingLot::with(['parkingSlots', 'parkingPriceRates'])->find($id);

        if (!$parkingLot) {
            return response()->json(['message' => 'Parking lot not found'], 404);
        }

        return response()->json($parkingLot);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParkingLot $parkingLot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParkingLotRequest $request, ParkingLot $parkingLot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParkingLot $parkingLot)
    {
        //
    }
}