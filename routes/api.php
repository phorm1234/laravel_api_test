<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\ParkingLotController;
use App\Http\Controllers\Api\V1\ParkingSlotController;
use App\Http\Controllers\Api\V1\ParkingTransactionController;

Route::prefix('v1')->group(function () {
    // Route::apiResource('/tasks', ParkController::class);
    Route::get('/parking-lots', [ParkingLotController::class, 'index']); // ดูข้อมูลลิสต์ที่จอดรถใกล้ที่สุดลงไป
    Route::get('/parking-lots/{id}', [ParkingLotController::class, 'show']); // ดูรายละเอียดที่จอดรถแต่ละแห่ง
    Route::post('/parking-slots/check-in', [ParkingSlotController::class, 'checkIn']); // check-in เข้าที่จอดรถ
    Route::post('/parking-slots/check-out', [ParkingSlotController::class, 'checkOut']); // check-out จากที่จอดรถและคำนวณค่าบริการ
    Route::get('/parking-lots/{id}/report', [ParkingTransactionController::class, 'report']); // ดู report รายได้ของแต่ละที่จอดรถ
});

// Route::apiResource('/tasks',TaskController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');