<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MemberDashboardController extends Controller
{
    public function showProfileDashboard()
    {
        if (!Auth::check() || Auth::user()->is_guest) {
            return redirect('/')->with('error', 'Please join the Club to view your personal dashboard hub.');
        }

        $orderHistoryCollection = Order::with('items')
            ->where('user_id', Auth::user()->user_id)
            ->orderBy('order_date', 'desc')
            ->orderBy('order_time', 'desc')
            ->get();

        return view('dashboard', compact('orderHistoryCollection'));
    }

    public function updatePersonalDetails(Request $request)
    {
        if (!Auth::check() || Auth::user()->is_guest) {
            return response()->json(['success' => false, 'message' => 'Unauthorized session.'], 403);
        }

        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'nullable|string|max:50',
            'email'      => 'required|email|max:100|unique:users,email,' . Auth::user()->id,
            'mobile'     => 'required|numeric|digits:10|unique:users,mobile,' . Auth::user()->id, 
            'address'    => 'required|string|min:10|max:500',
        ], [
            'mobile.digits' => 'Please provide a valid 10-digit mobile contact number.',
            'address.min'   => 'Please provide a complete address for our Rajkot delivery drivers.'
        ]);

        try {
            $user = User::where('id', Auth::user()->id)->firstOrFail();
            $user->update([
                'first_name' => $request->input('first_name'),
                'last_name'  => $request->input('last_name'),
                'email'      => $request->input('email'),
                'mobile'     => $request->input('mobile'),  
                'address'    => $request->input('address'),  
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
