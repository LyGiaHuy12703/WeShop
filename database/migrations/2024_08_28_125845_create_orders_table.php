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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid()->unique()->primary();
            $table->enum('Status', ['Chờ xác nhận đơn hàng','Đã xác nhận đơn hàng', 'Đang giao hàng', 'Đã giao thành công']);
            $table->decimal('total')->nullable();
            $table->uuid('delivery_id');
            $table->uuid('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
