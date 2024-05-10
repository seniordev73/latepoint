<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingIntent extends Model
{
    use HasFactory;
    protected $fillable = [
        'intent_key',
        'customer_id',
        'booking_data',
        'restrictions_data',
        'payment_data',
        'booking_id',
        'booking_form_page_url',
    ];
}
