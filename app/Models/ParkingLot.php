<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingLot extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'free_minutes',
    ];

    public function parkingSlots()
    {
        return $this->hasMany(ParkingSlot::class);
    }

    public function parkingPriceRates()
    {
        return $this->hasOne(ParkingPriceRate::class);
    }
}