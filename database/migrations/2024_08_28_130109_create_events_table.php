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
        Schema::create('events', function (Blueprint $table) {
            $table->uuid()->unique()->primary();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->tinyInteger('percent')->nullable();
            $table->string('description')->nullable();
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->uuid('shop_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
