<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'avatar_image_id',
        'status',
        // 'password',
        'activation_key',
        'account_nonce',
        'google_user_id',
        'facebook_user_id',
        'wordpress_user_id',
        'is_guest',
        'notes',
        'admin_notes',
    ];
}
