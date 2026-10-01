<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $table = 'deals';

    protected $fillable = [
        'title',
        'description',
        'time_tier',
        'discount_type',
        'discount_value',
        'is_combo_meal',
        'combo_price',
        'is_members_only',
    ];
}
