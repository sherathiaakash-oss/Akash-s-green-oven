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
    Schema::create('desserts', function (Blueprint $table) {
        $table->id();
        $table->string('name');              // e.g., 'Choco Lava Volcanic Cake'
        $table->integer('base_price_inr');   // Base whole Rupee price (e.g., 119)
        $table->boolean('is_available')->default(true);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desserts');
    }
};
