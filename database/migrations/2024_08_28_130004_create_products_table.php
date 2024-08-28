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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid()->unique()->primary();
            $table->string('name')->nullable();
            $table->tinyInteger('inStock')->nullable();
            $table->decimal('price')->nullable();
            $table->string('description')->nullable();
            $table->uuid('shop_id');
            $table->uuid('event_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
