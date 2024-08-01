<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingSlot extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'slot_number',
        'parking_lot_id',
        'is_available',
    ];

    public function parkingLot()
    {
        return $this->belongsTo(ParkingLot::class);
    }
}