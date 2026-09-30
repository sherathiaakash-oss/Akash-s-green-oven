<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations to establish master member checkout records ledger.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            // Relational link pointing strictly to the string user_id column in your users table
            $table->string('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            
            // Alphanumeric clean tracking order code reference column
            $table->string('order_no')->unique();
            
            // Financial Ledger calculations columns
            $table->integer('basket_total'); // Raw subtotal before promotions
            $table->string('coupon_applied')->nullable(); // Descriptive title name tracking string
            $table->integer('coupon_discount')->default(0); // Deducted aggregate value
            $table->integer('total_final_price'); // Net checkout total price charged
            
            // Separate dedicated Timeline indicators tracking fields
            $table->date('order_date');
            $table->time('order_time');
            
            // Kitchen Hub operational step flags tracking status column
            $table->string('status')->default('Received');
            
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
