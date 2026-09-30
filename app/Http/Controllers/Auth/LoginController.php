<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle incoming member login request submissions.
     * Verifies the unique User ID and encrypted password string against XAMPP records.
     */
    public function login(Request $request)
    {
        // 1. Enforce validation matrix constraints on our updated input name attributes
        $credentials = $request->validate([
            'user_id'  => 'required|string',
            'password' => 'required|string',
        ], [
            'user_id.required'  => 'Your unique User ID is required to access your account.',
            'password.required' => 'Please enter your secure account password.',
        ]);

        // 2. Query XAMPP to locate the unique member row profile matching this User ID
        $user = User::where('user_id', $credentials['user_id'])->first();

        // 3. TYPE SAFETY GUARD: Block standard member logins for active Guest profiles containing null passwords
        if ($user && $user->is_guest) {
            return response()->json([
                'success' => false,
                'message' => 'This identity is currently registered as a temporary Guest account. Please switch to the Order As Guest tab.'
            ], 422);
        }

        // 4. Evaluate standard member credentials and match password hashes securely
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Log the user into the active Laravel session state framework
            Auth::login($user);
            
            return response()->json([
                'success' => true,
                'message' => '🔑 Access Granted!'
            ]);
        }

        // 5. If authentication fails, return error message string back as JSON payload
        return response()->json([
            'success' => false,
            'message' => 'Invalid User ID or Password credentials. Please try again.'
        ], 422);
    }

    /**
     * Handle dynamic asynchronous guest login requests.
     */
    public function guestLogin(Request $request)
    {
        // 1. Validation now requires BOTH the guest user_id and the mandatory delivery address
        $validated = $request->validate([
            'user_id' => 'required|string|max:255',
            'address' => 'required|string|min:10|max:500' // Enforced delivery address validation constraints
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

        // 2. Build the temporary guest record including the mandatory delivery address properties cleanly
        $guestUser = User::create([
            'user_id'        => $guestIdentifier,
            'first_name'     => 'Guest',
            'last_name'      => null,
            'email'          => null,
            'mobile'         => null,
            'address'        => $guestAddress, // Bypasses fillable locks explicitly via direct array insertion
            'password'       => null,
            'is_admin'       => 0,
            'is_guest'       => 1,
            'loyalty_points' => 0
        ]);

        // 3. Log the guest session in instantly
        Auth::login($guestUser, true);

        return response()->json([
            'success'    => true,
            'guest_name' => $guestUser->first_name,
        ]);
    }

    /**
     * Securely terminate user session cookies and flush active token memory.
     */
    public function logout()
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        // Automatically drop and wipe the temporary visitor record row to keep the database completely clean
        if ($user && $user->is_guest) {
            $user->delete();
        }

        Auth::logout();
        return redirect('/')->with('success', 'Logged out securely. See you soon!');
    }
}
