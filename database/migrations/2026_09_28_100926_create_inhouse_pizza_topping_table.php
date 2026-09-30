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
    Schema::create('inhouse_pizza_topping', function (Blueprint $table) {
        $table->id();
        $table->foreignId('inhouse_pizza_id')->constrained('inhouse_pizzas')->onDelete('cascade');
        $table->foreignId('topping_id')->constrained('toppings')->onDelete('cascade');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inhouse_pizza_topping');
    }
};
