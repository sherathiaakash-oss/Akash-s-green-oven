<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MemberDashboardController extends Controller
{
    /**
     * Render the member profile dashboard with historical transaction lists.
     */
    public function showProfileDashboard()
    {
        // Safety lock check block
        if (!Auth::check() || Auth::user()->is_guest) {
            return redirect('/')->with('error', 'Please join the Club to view your personal dashboard hub.');
        }

        // Fetch all orders matching this member's explicit user_id string reference key
        $orderHistoryCollection = Order::with('items')
            ->where('user_id', Auth::user()->user_id)
            ->orderBy('order_date', 'desc')
            ->orderBy('order_time', 'desc')
            ->get();

        return view('dashboard', compact('orderHistoryCollection'));
    }

    /**
     * Intercept and update personal member details records columns safely.
     */
    public function updatePersonalDetails(Request $request)
    {
        if (!Auth::check() || Auth::user()->is_guest) {
            return response()->json(['success' => false, 'message' => 'Unauthorized session.'], 403);
        }

        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'nullable|string|max:50',
            'email'      => 'required|email|max:100|unique:users,email,' . Auth::user()->id,
            'mobile'     => 'required|numeric|digits:10|unique:users,mobile,' . Auth::user()->id, // Swapped to match your 'mobile' column
            'address'    => 'required|string|min:10|max:500', // Added mandatory address validation rule
        ], [
            'mobile.digits' => 'Please provide a valid 10-digit mobile contact number.',
            'address.min'   => 'Please provide a complete address for our Rajkot delivery drivers.'
        ]);

        try {
            // Find the active authenticated user row instance
            $user = User::where('id', Auth::user()->id)->firstOrFail();
            
            // Explicitly modify safe columns only. Role flags are strictly bypassed.
            $user->update([
                'first_name' => $request->input('first_name'),
                'last_name'  => $request->input('last_name'),
                'email'      => $request->input('email'),
                'mobile'     => $request->input('mobile'),   // Injected matching column properties
                'address'    => $request->input('address'),  // Injected matching column properties
            ]);

            return response()->json([
                'success' => true,
                'message' => '✨ Profile metrics synchronized inside database nodes!'
            ]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Update failure: ' . $e->getMessage()], 500);
        }
    }
}
