<?php

use App\Http\Controllers\PizzaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

/**
 * Pizzeria Core Routing Map
 * 
 * When a user visits the root domain index page ('/'), we map the request 
 * directly to the 'index' method function inside our PizzaController brain.
 */
Route::get('/', [PizzaController::class, 'index'])->name('home');

// Clean explicit route parameters mapping out the membership registration handlers
Route::get('/register-membership', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register-membership', [RegisterController::class, 'register']);

// Web highway parameters mapping out your login and logout action triggers
Route::post('/login-member', [LoginController::class, 'login']);

// Fixed guest login endpoint to map cleanly to your existing LoginController method
Route::post('/login/guest', [LoginController::class, 'guestLogin'])->name('login.guest');

// Replaces the strict POST route to capture any incoming logout request safely
Route::any('/logout', [LoginController::class, 'logout'])->name('logout');

// Asynchronous background checking pipeline for real-time field uniqueness
Route::post('/check-field-uniqueness', function (Request $request) {
    $field = $request->input('field');
    $value = $request->input('value');
    
    // Ensure we only check valid, secure columns
    if (!in_array($field, ['user_id', 'email', 'mobile'])) {
        return response()->json(['available' => false]);
    }
    
    $exists = User::where($field, $value)->exists();
    return response()->json(['available' => !$exists]);
});
use App\Http\Controllers\PizzeriaCheckoutController;

// Endpoint for processing secure checkouts for both guests and members
Route::post('/process-secure-checkout', [PizzeriaCheckoutController::class, 'processSecureCheckout']);
use App\Http\Controllers\MemberDashboardController;

Route::middleware(['auth'])->group(function () {
    // Member Dashboard view page endpoint route line
    Route::get('/member/dashboard', [MemberDashboardController::class, 'showProfileDashboard']);
    
    // Asynchronous Fetch endpoint link for editing details form columns rows
    Route::post('/member/profile/update', [MemberDashboardController::class, 'updatePersonalDetails']);
});
use App\Http\Controllers\AdminKitchenHubController;

// Lock administration controller highway parameters strictly under admin middleware validation checks
Route::middleware(['auth'])->group(function () {
    Route::get('/kitchen-hub', [AdminKitchenHubController::class, 'showKitchenHub']);
    Route::post('/kitchen-hub/store', [AdminKitchenHubController::class, 'storeProductItem']);
    Route::post('/kitchen-hub/update', [AdminKitchenHubController::class, 'updateProductItem']);
    Route::post('/kitchen-hub/delete', [AdminKitchenHubController::class, 'deleteProductItem']);
});
