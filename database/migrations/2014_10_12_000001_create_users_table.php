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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid()->unique()->primary();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('verify_code');
            $table->uuid('shop_id');
            $table->uuid('cart_id');
            $table->rememberToken();
            $table->timestamps();

            //foreign key
            // $table->foreign('shop_id')->references('uuid')->on('shop');
            // $table->foreign('cart_id')->references('uuid')->on('cart');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropForeign(['users_cart_id_foreign', 'users_shop_id_foreign']);
        });
        Schema::dropIfExists('users');
    }
};
