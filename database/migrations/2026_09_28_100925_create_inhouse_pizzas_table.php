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
    Schema::create('inhouse_pizzas', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('category');
        
        // Dynamic Pre-Calculated Base Price Column (Added right here)
        $table->integer('baseline_price_inr'); 
        
        // Relational ingredient mapping links
        $table->foreignId('dough_id')->constrained('doughs')->onDelete('cascade');
        $table->foreignId('sauce_id')->constrained('sauces')->onDelete('cascade');
        $table->foreignId('cheese_id')->constrained('cheeses')->onDelete('cascade');
        
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inhouse_pizzas');
    }
};
