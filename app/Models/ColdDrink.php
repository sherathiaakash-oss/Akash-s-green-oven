<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColdDrink extends Model
{
    protected $table = 'cold_drinks';

    protected $fillable = ['name', 'base_price_inr', 'is_available'];
}
