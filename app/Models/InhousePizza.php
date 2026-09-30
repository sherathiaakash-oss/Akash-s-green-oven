<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InhousePizza extends Model
{
    // Explicitly define the table name since it uses underscores
    protected $table = 'inhouse_pizzas';

    // Added baseline_price_inr to our safe mass-assignable attributes array
    protected $fillable = ['name', 'category', 'baseline_price_inr', 'dough_id', 'sauce_id', 'cheese_id'];

    // Relational Connection: A pizza belongs to one specific dough selection
    public function dough()
    {
        return $this->belongsTo(Dough::class);
    }

    // Relational Connection: A pizza belongs to one specific sauce selection
    public function sauce()
    {
        return $this->belongsTo(Sauce::class);
    }

    // Relational Connection: A pizza belongs to one specific cheese selection
    public function cheese()
    {
        return $this->belongsTo(Cheese::class);
    }

    // Many-to-Many Connection: A pizza can have multiple toppings via our bridge pivot table
    public function toppings()
    {
        return $this->belongsToMany(Topping::class, 'inhouse_pizza_topping', 'inhouse_pizza_id', 'topping_id');
    }
}
