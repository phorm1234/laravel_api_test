<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\ParkingTransaction;
use App\Http\Requests\StoreParkingTransactionRequest;
use App\Http\Requests\UpdateParkingTransactionRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ParkingTransactionController extends Controller
{

    public function report(Request $request, $id)
    {
        $request->validate([
            'period' => 'required|in:daily,weekly,monthly',
        ]);

        $period = $request->period;

        $query = ParkingTransaction::whereHas('parkingSlot', function ($query) use ($id) {
            $query->where('parking_lot_id', $id);
        });

        switch ($period) {
            case 'daily':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'weekly':
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'monthly':
                $query->whereMonth('created_at', Carbon::now()->month);
                break;
        }

        $transactions = $query->get();
        $totalRevenue = $transactions->sum('total_cost');

        return response()->json([
            'period' => $period,
            'total_revenue' => $totalRevenue,
        ]);
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
    public function store(StoreParkingTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ParkingTransaction $parkingTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParkingTransaction $parkingTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParkingTransactionRequest $request, ParkingTransaction $parkingTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParkingTransaction $parkingTransaction)
    {
        //
    }
}