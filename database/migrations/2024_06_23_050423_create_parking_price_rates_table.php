<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('parking_price_rates', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        Schema::create('parking_price_rates', function (Blueprint $table) {
            $table->id(); // id ช่องจอดรถ
            $table->foreignId('parking_lot_id')->constrained()->onDelete('cascade'); // id ลานจอดรถ ตั้งไว้ถ้าลบ ลาดจอดออกให้ ลบ ราคา ที่อยู่ในลานจอดนั้นๆด้วย
            $table->decimal('hourly_rate',10,2);
            $table->timestamp('created_at')->nullable(); // สร้างเมื่อ
            $table->timestamp('updated_at')->nullable(); // อัพเดทเมื่อ
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_price_rates');
        
    }
};