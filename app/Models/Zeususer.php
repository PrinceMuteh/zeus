<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

// use Illuminate\Database\Eloquent\Model;

class Zeususer extends Authenticatable
{
    use HasFactory;

    protected $table = 'zeususers';

    protected $fillable = [
        'name',
        'phone',
        'status',
        'verify',
        'bank_name',
        'account_name',
        'account_number',
        'sort_code',
        'user_type',
        'menu_permission',
        'email',
        'last_name',
        'first_name',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
