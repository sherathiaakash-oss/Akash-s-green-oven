<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColdDrink extends Model
{
    // Explicitly define the custom database table name since it contains an underscore
    protected $table = 'cold_drinks';

    protected $fillable = ['name', 'base_price_inr', 'is_available'];
}
