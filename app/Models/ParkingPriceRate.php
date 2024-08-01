<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingPriceRate extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'parking_lot_id',
        'hourly_rate',
    ];

    public function parkingLot()
    {
        return $this->belongsTo(ParkingLot::class);
    }
}