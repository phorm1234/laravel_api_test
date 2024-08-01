<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\ParkingSlot;
use App\Http\Requests\StoreParkingSlotRequest;
use App\Http\Requests\UpdateParkingSlotRequest;
use App\Models\ParkingTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ParkingSlotController extends Controller
{

    public function checkIn(Request $request)
    {
        $request->validate([
            'slot_id' => 'required|exists:parking_slots,id',
        ]);

        $slot = ParkingSlot::find($request->slot_id);

        if (!$slot->is_available) {
            return response()->json(['message' => 'Slot is already occupied'], 400);
        }

        DB::transaction(function () use ($slot) {
            $slot->is_available = false;
            $slot->save();

            ParkingTransaction::create([
                'slot_id' => $slot->id,
                'check_in' => now(),
            ]);
        });

        return response()->json(['message' => 'Check-in successful']);
    }

    public function checkOut(Request $request)
    {
        $request->validate([
            'slot_id' => 'required|exists:parking_slots,id',
        ]);

        $transaction = ParkingTransaction::where('slot_id', $request->slot_id)
            ->whereNull('check_out')
            ->first();

        if (!$transaction) {
            return response()->json(['message' => 'No active check-in found for this slot'], 400);
        }

        $checkOutTime = now();
        $checkInTime = new Carbon($transaction->check_in);
        $durationMinutes = $checkInTime->diffInMinutes($checkOutTime);

        $slot = ParkingSlot::find($request->slot_id);
        $lot = $slot->parkingLot;
        $rate = $lot->parkingPriceRates;

        $billableMinutes = max(0, $durationMinutes - $lot->free_minutes);
        $totalCost = ceil($billableMinutes / 60) * $rate->hourly_rate;

        DB::transaction(function () use ($transaction, $slot, $checkOutTime, $totalCost) {
            $transaction->check_out = $checkOutTime;
            $transaction->total_cost = $totalCost;
            $transaction->save();

            $slot->is_available = true;
            $slot->save();
        });

        return response()->json(['message' => 'Check-out successful', 'total_cost' => $totalCost]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreParkingSlotRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ParkingSlot $parkingSlot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParkingSlot $parkingSlot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParkingSlotRequest $request, ParkingSlot $parkingSlot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParkingSlot $parkingSlot)
    {
        //
    }
}