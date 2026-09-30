<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations to build individual checkout container item lines table.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            
            // Strict Foreign Key mapping back to your parent order_no tracking sequence column
            $table->string('order_no');
            $table->foreign('order_no')->references('order_no')->on('orders')->onDelete('cascade');
            
            // Item Title & Subtitle descriptions packed as a continuous text string layout column
            $table->string('item'); 
            
            // For custom creations, it saves the ingredient recipe summaries string, otherwise leaves empty
            $table->text('custom_recipe_details')->nullable(); 
            
            // Quantity tracker and snapshot cost logs columns
            $table->integer('no_of_items'); // Integer unit count metric
            $table->integer('total_of_individual_item'); // Calculated value row cost (Price x Qty)
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
