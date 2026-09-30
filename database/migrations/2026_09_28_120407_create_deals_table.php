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
    Schema::create('deals', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        
        // Active timeline tracking tiers ('Daily', 'Weekly', 'Monthly', 'Seasonal', 'Combo Meals')
        $table->string('time_tier'); 
        
        // Promotional Discount Ledger Rules
        $table->string('discount_type'); 
        $table->integer('discount_value'); 
        
        // Dynamic Core Architecture Additions
        $table->boolean('is_combo_meal')->default(false); // Flags explicit food bundles
        $table->integer('combo_price')->nullable();       // Sets direct pricing tag for combo sets
        
        $table->boolean('is_members_only')->default(false);
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
