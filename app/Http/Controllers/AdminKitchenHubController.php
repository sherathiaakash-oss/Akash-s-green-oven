<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminKitchenHubController extends Controller
{
    /**
     * Render the admin management dashboard showing all current categories.
     */
    public function showKitchenHub()
    {
        // Strict Security Authorization Gate Lock
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Unauthorized Access: Only Pizzeria Kitchen Hub Administrators allowed.');
        }

        // Gather all menu data collections live out of your XAMPP tables
        $sides = DB::table('sides')->orderBy('id', 'desc')->get();
        $desserts = DB::table('desserts')->orderBy('id', 'desc')->get();
        $coldDrinks = DB::table('cold_drinks')->orderBy('id', 'desc')->get();
        $deals = DB::table('deals')->orderBy('id', 'desc')->get();

        return view('kitchen-hub', compact('sides', 'desserts', 'coldDrinks', 'deals'));
    }

    /**
     * Universal endpoint handler to add data into respective tables natively.
     */
    public function storeProductItem(Request $request)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return response()->json(['success' => false, 'message' => 'Unauthorized.'], 403);
        }

        $targetTable = $request->input('target_table');
        
        // Enforce boundary safety whitelist rules
        if (!in_array($targetTable, ['sides', 'desserts', 'cold_drinks', 'deals'])) {
            return response()->json(['success' => false, 'message' => 'Invalid catalog category target.'], 400);
        }

        // Core schema data injection properties bag
        $payload = [
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'price'       => intval($request->input('price')),
            'created_at'  => now(),
            'updated_at'  => now(),
        ];

        // Specific sub-field validation configurations for the Deals engine matrix
        if ($targetTable === 'deals') {
            $payload['deal_type'] = $request->input('deal_type'); // 'Combo Meals', 'Daily Deals', etc.
        }

        try {
            DB::table($targetTable)->insert($payload);
            return response()->json(['success' => true, 'message' => '✨ New item appended directly into database table!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Unified inline update handler to update fields directly via AJAX.
     */
    public function updateProductItem(Request $request)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return response()->json(['success' => false, 'message' => 'Unauthorized.'], 403);
        }

        $targetTable = $request->input('target_table');
        $id = intval($request->input('id'));

        if (!in_array($targetTable, ['sides', 'desserts', 'cold_drinks', 'deals'])) {
            return response()->json(['success' => false, 'message' => 'Invalid layout reference.'], 400);
        }

        $payload = [
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'price'       => intval($request->input('price')),
            'updated_at'  => now()
        ];

        if ($targetTable === 'deals') {
            $payload['deal_type'] = $request->input('deal_type');
        }

        try {
            DB::table($targetTable)->where('id', $id)->update($payload);
            return response()->json(['success' => true, 'message' => '✓ Item parameters updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Safely drop items out of database records.
     */
    public function deleteProductItem(Request $request)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return response()->json(['success' => false, 'message' => 'Unauthorized.'], 403);
        }

        $targetTable = $request->input('target_table');
        $id = intval($request->input('id'));

        try {
            DB::table($targetTable)->where('id', $id)->delete();
            return response()->json(['success' => true, 'message' => '🗑️ Item permanently purged.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
