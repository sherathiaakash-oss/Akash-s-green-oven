<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'order_no',
        'basket_total',
        'coupon_applied',
        'coupon_discount',
        'total_final_price',
        'order_date',
        'order_time',
        'status'
    ];

    /**
     * Relationship: An order belongs strictly to a registered member.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * Relationship: An order contains multiple individual item cards.
     */
    public function items(): HasMany
    {
        // Links child records using your unique 'order_no' reference keys string
        return $this->hasMany(OrderItem::class, 'order_no', 'order_no');
    }
}
