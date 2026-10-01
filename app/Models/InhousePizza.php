<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InhousePizza extends Model
{
    protected $table = 'inhouse_pizzas';

    protected $fillable = ['name', 'category', 'baseline_price_inr', 'dough_id', 'sauce_id', 'cheese_id'];

    public function dough()
    {
        return $this->belongsTo(Dough::class);
    }

    public function sauce()
    {
        return $this->belongsTo(Sauce::class);
    }
    public function cheese()
    {
        return $this->belongsTo(Cheese::class);
    }
    public function toppings()
    {
        return $this->belongsToMany(Topping::class, 'inhouse_pizza_topping', 'inhouse_pizza_id', 'topping_id');
    }
}
