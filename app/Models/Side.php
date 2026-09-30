<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Side extends Model
{
    // The attributes that are safe to update or insert into XAMPP
    protected $fillable = ['name', 'base_price_inr', 'is_available'];
}
