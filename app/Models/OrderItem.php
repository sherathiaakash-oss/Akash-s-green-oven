<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'order_no',
        'item',
        'custom_recipe_details',
        'no_of_items',
        'total_of_individual_item'
    ];

    /**
     * Relationship: This item belongs explicitly to a parent tracking order.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_no', 'order_no');
    }
}
