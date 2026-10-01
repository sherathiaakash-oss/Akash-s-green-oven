<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; 

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'user_id'    => 'required|string|max:50|unique:users,user_id',
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'password'   => 'required|string|min:6',
            'email'      => 'required_without:mobile|nullable|email|max:100|unique:users,email',
            'mobile'     => 'required_without:email|nullable|numeric|digits:10|unique:users,mobile',
            'address'    => 'required|string|min:10|max:500',
        ], [
            'email.required_without'  => 'An Email Address or a Mobile Number is mandatory to finalize registration.',
            'mobile.required_without' => 'An Email Address or a Mobile Number is mandatory to finalize registration.',
            'user_id.unique'          => 'This User ID name is already claimed by another club member.',
            'address.required'        => 'A delivery address is mandatory to receive your wood-fired pizza slates.'
        ]);

        $user = User::create([
            'user_id'        => $request->user_id,
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'email'          => $request->email,
            'mobile'         => $request->mobile,
            'address'        => $request->address, 
            'password'       => Hash::make($request->password),
            'loyalty_points' => 0,
            'is_guest'       => 0,
        ]);

        Auth::login($user);

        return redirect('/')->with('success', '✨ Registration Active! Welcome to the Green Oven Club.');
    }
} 
