<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable and safe to write into XAMPP.
     * Updated to align perfectly with your custom registration form fields.
     *
     * NOTICE: 'is_admin' is intentionally kept excluded to keep it isolated from mass-assignment.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'mobile',
        'address',        // Whitelisted natively to support mandatory logistics tracking
        'password',
        'loyalty_points', 
        'is_guest',       // Added to support structural guest checkout rows natively
    ];

    /**
     * The attributes that should be hidden for serialization arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'is_guest' => 'boolean', // Cast automatically to true/false booleans inside data structures
        ];
    }
}
