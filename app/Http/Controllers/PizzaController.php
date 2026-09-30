<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InhousePizza;
use Illuminate\Support\Facades\DB;

class PizzaController extends Controller
{
    /**
     * Display the main pizzeria homepage deck hub.
     * Fully populates all structural dropdown layers and sidebar categories.
     */
    public function index()
    {
        // 1. AUTOMATED LIFECYCLE GARBAGE COLLECTION PIPELINE
        $activeSessionUserIds = DB::table('sessions')
                                  ->whereNotNull('user_id')
                                  ->pluck('user_id')
                                  ->toArray();

        User::where('is_guest', true)
            ->whereNotIn('id', $activeSessionUserIds)
            ->delete();

        // 2. QUERY MENUS FROM DATABASE WITH RELATIONSHIPS
        // We group by category so $pizzas->get('Classics') works flawlessly in your Blade template!
        $pizzas = InhousePizza::with(['dough', 'sauce', 'cheese', 'toppings'])
                              ->get()
                              ->groupBy('category'); 

        // Fetch companion tables to satisfy your loops
        $sides = DB::table('sides')->where('is_available', true)->get();
        $drinks = DB::table('cold_drinks')->where('is_available', true)->get();
        $desserts = DB::table('desserts')->where('is_available', true)->get();
        $sizes = DB::table('sizes')->get();
        
        // Group deals by time_tier so $deals->get('Combo Meals') maps cleanly
        $deals = DB::table('deals')->get()->groupBy('time_tier');

        // 3. RENDER HOMEPAGE VIEW FRAMEWORK WITH RECORDS
        return view('home', compact('pizzas', 'sides', 'drinks', 'desserts', 'sizes', 'deals')); 
    }
}
