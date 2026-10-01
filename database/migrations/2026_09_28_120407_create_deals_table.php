<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('deals', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->string('time_tier'); 
        $table->string('discount_type'); 
        $table->integer('discount_value'); 
        $table->boolean('is_combo_meal')->default(false);
        $table->integer('combo_price')->nullable();    
        $table->boolean('is_members_only')->default(false);
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
