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
        // Schema::create('parking_lots', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        Schema::create('parking_lots', function (Blueprint $table) {
            $table->id(); // id ลานจอดรถ
            $table->string('name'); // ชื่อลานจอด
            $table->decimal('latitude',10,8); // ละติจูดลานจอดรถ
            $table->decimal('longitude',11,8); // ลองจูดลานจอดรถ
            $table->integer('free_minutes')->default(15); // เวลาที่ฟรีเป็นนาที default ไว้ 15 ก่อน
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
        Schema::dropIfExists('parking_lots');
        
    }
};