<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'short_description',
        'is_price_variable',
        'price_min',
        'price_max',
        'charge_amount',
        'deposit_amount',
        'is_deposit_required',
        'duration_name',
        'duration',
        'buffer_before',
        'buffer_after',
        'category_id',
        'order_number',
        'selection_image_id',
        'description_image_id',
        'bg_color',
        'timeblock_interval',
        'capacity_min',
        'capacity_max',
        'status',
        'visibility',
        'override_default_booking_status',
    ];

}
