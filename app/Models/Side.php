<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Side extends Model
{
    protected $fillable = ['name', 'base_price_inr', 'is_available'];
}
