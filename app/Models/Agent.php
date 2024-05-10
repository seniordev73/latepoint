<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'avatar_image_id',
        'bio_image_id',
        'first_name',
        'last_name',
        'display_name',
        'title',
        'bio',
        'features',
        'email',
        'phone',
        // 'password',
        'custom_hours',
        'status',
        'extra_emails',
        'extra_phones',
    ];
}
