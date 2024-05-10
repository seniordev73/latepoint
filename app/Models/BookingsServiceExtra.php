<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingsServiceExtra extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'service_extra_id',
        'duration',
        'quantity',
        'price',
    ];
}
