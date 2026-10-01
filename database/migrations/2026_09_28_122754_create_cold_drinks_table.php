<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('cold_drinks', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('base_price_inr');
        $table->boolean('is_available')->default(true);
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('cold_drinks');
    }
};
