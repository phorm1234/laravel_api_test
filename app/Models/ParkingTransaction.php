<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingTransaction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'slot_id',
        'check_in',
        'check_out',
        'total_cost',
    ];

    public function parkingSlot()
    {
        return $this->belongsTo(ParkingSlot::class, 'slot_id');
    }
}