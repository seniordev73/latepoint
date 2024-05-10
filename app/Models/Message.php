<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'content_type',
        'author_id',
        'booking_id',
        'author_type',
        'is_hidden',
        'is_read'
    ];
}
