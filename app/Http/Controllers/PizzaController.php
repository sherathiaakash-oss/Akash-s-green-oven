<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InhousePizza;
use Illuminate\Support\Facades\DB;

class PizzaController extends Controller
{
    public function index()
    {
        $activeSessionUserIds = DB::table('sessions')
                                  ->whereNotNull('user_id')
                                  ->pluck('user_id')
                                  ->toArray();

        User::where('is_guest', true)
            ->whereNotIn('id', $activeSessionUserIds)
            ->delete();

        $pizzas = InhousePizza::with(['dough', 'sauce', 'cheese', 'toppings'])
                              ->get()
                              ->groupBy('category'); 
        $sides = DB::table('sides')->where('is_available', true)->get();
        $drinks = DB::table('cold_drinks')->where('is_available', true)->get();
        $desserts = DB::table('desserts')->where('is_available', true)->get();
        $sizes = DB::table('sizes')->get();
        
        $deals = DB::table('deals')->get()->groupBy('time_tier');

        return view('home', compact('pizzas', 'sides', 'drinks', 'desserts', 'sizes', 'deals')); 
    }
}
