<?php

// 📍 LINE 3 UPDATED PERFECTLY TO MATCH YOUR AUTH SUB-FOLDER
namespace App\Http\Controllers\Auth;

// 📍 EXTENDS THE BASE CONTROLLER SO LARAVEL KNOWS HOW TO LOAD THE SUB-FOLDER CLASS
use App\Http\Controllers\Controller; 

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // 1. First function goes here inside the class
    public function showRegistrationForm()
    {
        return view('register');
    }

    // 2. Second function goes here inside the class
    public function register(Request $request)
    {
        $request->validate([
            'user_id'    => 'required|string|max:50|unique:users,user_id',
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'password'   => 'required|string|min:6',
            'email'      => 'required_without:mobile|nullable|email|max:100|unique:users,email',
            'mobile'     => 'required_without:email|nullable|numeric|digits:10|unique:users,mobile',
            // Added mandatory address validation block rule for Rajkot logistics
            'address'    => 'required|string|min:10|max:500',
        ], [
            'email.required_without'  => 'An Email Address or a Mobile Number is mandatory to finalize registration.',
            'mobile.required_without' => 'An Email Address or a Mobile Number is mandatory to finalize registration.',
            'user_id.unique'          => 'This User ID name is already claimed by another club member.',
            'address.required'        => 'A delivery address is mandatory to receive your wood-fired pizza slates.'
        ]);

        // Restored your original clean structure format!
        $user = User::create([
            'user_id'        => $request->user_id,
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'email'          => $request->email,
            'mobile'         => $request->mobile,
            'address'        => $request->address, // Maps perfectly now because of your User.php update
            'password'       => Hash::make($request->password),
            'loyalty_points' => 0,
            'is_guest'       => 0,
        ]);

        // Log the member session in instantly upon successful registration
        Auth::login($user);

        return redirect('/')->with('success', '✨ Registration Active! Welcome to the Green Oven Club.');
    }
} // 3. This final bracket closes the whole class perfectly!
