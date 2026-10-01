<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'user_id'  => 'required|string',
            'password' => 'required|string',
        ], [
            'user_id.required'  => 'Your unique User ID is required to access your account.',
            'password.required' => 'Please enter your secure account password.',
        ]);

        $user = User::where('user_id', $credentials['user_id'])->first();

        if ($user && $user->is_guest) {
            return response()->json([
                'success' => false,
                'message' => 'This identity is currently registered as a temporary Guest account. Please switch to the Order As Guest tab.'
            ], 422);
        }

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            
            return response()->json([
                'success' => true,
                'message' => '🔑 Access Granted!'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid User ID or Password credentials. Please try again.'
        ], 422);
    }

    public function guestLogin(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|string|max:255',
            'address' => 'required|string|min:10|max:500' 
        ]);

        $guestIdentifier = $validated['user_id'];
        $guestAddress = $validated['address'];

        $userExists = User::where('user_id', $guestIdentifier)->exists();

        if ($userExists) {
            return response()->json([
                'success' => false,
                'message' => '✕ Already in use warning'
            ], 422);
        }
        $guestUser = User::create([
            'user_id'        => $guestIdentifier,
            'first_name'     => 'Guest',
            'last_name'      => null,
            'email'          => null,
            'mobile'         => null,
            'address'        => $guestAddress, 
            'password'       => null,
            'is_admin'       => 0,
            'is_guest'       => 1,
            'loyalty_points' => 0
        ]);

        Auth::login($guestUser, true);

        return response()->json([
            'success'    => true,
            'guest_name' => $guestUser->first_name,
        ]);
    }

    public function logout()
    {
        $user = Auth::user();

        if ($user && $user->is_guest) {
            $user->delete();
        }

        Auth::logout();
        return redirect('/')->with('success', 'Logged out securely. See you soon!');
    }
}
