<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\ParkingPriceRate;
use App\Http\Requests\StoreParkingPriceRateRequest;
use App\Http\Requests\UpdateParkingPriceRateRequest;

class ParkingPriceRateController extends Controller
{
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
    public function store(StoreParkingPriceRateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ParkingPriceRate $parkingPriceRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParkingPriceRate $parkingPriceRate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParkingPriceRateRequest $request, ParkingPriceRate $parkingPriceRate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParkingPriceRate $parkingPriceRate)
    {
        //
    }
}