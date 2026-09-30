<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PizzeriaCheckoutController extends Controller
{
    /**
     * Intercept cart data, generate a unique 5-digit order number, 
     * and save to tables ONLY if the user is a registered member.
     */
    public function processSecureCheckout(Request $request)
    {
        // 1. ALWAYS GENERATE A UNIQUE 5-DIGIT ALPHANUMERIC UPPERCASE TRACKING CODE
        do {
            $generatedOrderNo = strtoupper(Str::random(5));
        } while (Order::where('order_no', $generatedOrderNo)->exists());

        // 2. CONDITION CHECK: IF GUEST OR UNLOGGED, BYPASS DATABASE STORAGE AND RETURN THE CODE
        if (!Auth::check() || Auth::user()->is_guest) {
            return response()->json([
                'success' => true,
                'order_no' => $generatedOrderNo,
                'is_guest' => true
            ]);
        }

        // 3. MEMBER EXECUTION STREAM: PERSIST ALL TRANSACTION DATA TO DATABASE
        $basketItems = $request->input('basket_items', []);
        if (empty($basketItems)) {
            return response()->json([
                'success' => false,
                'message' => 'Your kitchen basket is empty!'
            ], 400);
        }

        $basketTotal = intval($request->input('basket_total', 0));
        $couponApplied = $request->input('coupon_applied', null);
        $couponDiscount = intval($request->input('coupon_discount', 0));
        $totalFinalPrice = intval($request->input('total_final_price', 0));
        $currentTimestamp = Carbon::now('Asia/Kolkata');

        try {
            // Write Parent Summary Sheet Ledger (Kept lightweight and clean!)
            Order::create([
                'user_id'           => Auth::user()->user_id,
                'order_no'          => $generatedOrderNo,
                'basket_total'      => $basketTotal,
                'coupon_applied'    => $couponApplied,
                'coupon_discount'   => $couponDiscount,
                'total_final_price' => $totalFinalPrice,
                'order_date'        => $currentTimestamp->toDateString(),
                'order_time'        => $currentTimestamp->toTimeString(),
                'status'            => 'Received'
            ]);

            // Write Individual Child Basket Line Rows
            foreach ($basketItems as $item) {
                $customDetails = isset($item['category']) && $item['category'] === 'Custom Pizza Design' 
                    ? $item['sauce'] 
                    : null;

                OrderItem::create([
                    'order_no'                 => $generatedOrderNo,
                    'item'                     => $item['name'] . ($item['size'] !== 'Fixed Unit' ? " (" . $item['size'] . ")" : ""),
                    'custom_recipe_details'    => $customDetails,
                    'no_of_items'              => intval($item['quantity'] ?? 1),
                    'total_of_individual_item' => intval($item['cost'] ?? 0) * intval($item['quantity'] ?? 1)
                ]);
            }

            return response()->json([
                'success'  => true,
                'order_no' => $generatedOrderNo,
                'is_guest' => false
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Database Storage Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
