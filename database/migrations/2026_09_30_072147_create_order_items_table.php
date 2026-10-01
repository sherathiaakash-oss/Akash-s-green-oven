<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('order_no');
            $table->foreign('order_no')->references('order_no')->on('orders')->onDelete('cascade');
            $table->string('item'); 
            $table->text('custom_recipe_details')->nullable(); 
            $table->integer('no_of_items');
            $table->integer('total_of_individual_item');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
