<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('inhouse_pizzas', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('category');
        $table->integer('baseline_price_inr'); 
        $table->foreignId('dough_id')->constrained('doughs')->onDelete('cascade');
        $table->foreignId('sauce_id')->constrained('sauces')->onDelete('cascade');
        $table->foreignId('cheese_id')->constrained('cheeses')->onDelete('cascade');
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('inhouse_pizzas');
    }
};
