<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->string('order_no')->unique();
            $table->integer('basket_total');
            $table->string('coupon_applied')->nullable();
            $table->integer('coupon_discount')->default(0);
            $table->integer('total_final_price');
            $table->date('order_date');
            $table->time('order_time');
            $table->string('status')->default('Received');
            
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
