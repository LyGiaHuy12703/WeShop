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
        //user
        Schema::table('users', function (Blueprint $table){
            $table->foreign('shop_id')->references('uuid')->on('shop');
            $table->foreign('cart_id')->references('uuid')->on('carts');
        });
        //shop
        Schema::table('shop', function (Blueprint $table){
            $table->foreign('user_id')->references('uuid')->on('users');
        });
        //order
        Schema::table('orders', function (Blueprint $table){
            $table->foreign('delivery_id')->references('uuid')->on('deliveries');
            $table->foreign('user_id')->references('uuid')->on('users');
        });
        //product
        Schema::table('products', function (Blueprint $table){
            $table->foreign('shop_id')->references('uuid')->on('shop');
            $table->foreign('event_id')->references('uuid')->on('events');
        });
        //image
        Schema::table('images', function (Blueprint $table){
            $table->foreign('product_id')->references('uuid')->on('products');
        });
        //events
        Schema::table('events', function (Blueprint $table){
            $table->foreign('shop_id')->references('uuid')->on('shop');
        });
        //deliveries
        Schema::table('deliveries', function (Blueprint $table){
            $table->foreign('user_id')->references('uuid')->on('users');
        });
        //carts
        Schema::table('carts', function (Blueprint $table){
            $table->foreign('user_id')->references('uuid')->on('users');
        });
        //cart_item
        // Schema::table('deliveries', function (Blueprint $table){
        //     $table->foreign('user_id')->references('uuid')->on('carts');
        // });
        //order_item
        Schema::table('order_items', function (Blueprint $table){
            $table->foreign('product_id')->references('uuid')->on('products');
            $table->foreign('order_id')->references('uuid')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
