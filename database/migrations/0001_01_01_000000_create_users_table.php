<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations to establish core XAMPP structural database profiles.
     */
    public function up(): void
    {
        // 1. Core Users Pizzeria Deck Records Table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique(); // Unique primary account text identifier reference
            $table->string('first_name');
            $table->string('last_name')->nullable(); // Matches form layout field column
            $table->string('email')->unique()->nullable(); // Unique email pointer (nullable for guests)
            $table->string('mobile')->nullable(); // Contact phone layout column
            
            // Added address column as a mandatory text field block for Rajkot logistics
            $table->text('address'); 
            
            $table->string('password')->nullable(); // Nullable since passwords are disabled for Guests
            
            // Core Application Gamification System
            $table->integer('loyalty_points')->default(0); // Tracks premium club rewards
            
            // Administrative & Anonymous Identity Access Guard flags
            $table->boolean('is_admin')->default(0); // 1 = displays 👨‍🍳 Kitchen Hub navigation button
            $table->boolean('is_guest')->default(0); // 1 = Active structural temporary fast-checkout Guest flag
            
            $table->rememberToken();
            $table->timestamps();
        });

        // 2. Standard Session Token Memory Pipeline Storage Table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
    }
};
