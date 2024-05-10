<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_code',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'start_datetime_utc',
        'end_datetime_utc',
        'buffer_before',
        'buffer_after',
        'duration',
        'subtotal',
        'price',
        'status',
        'payment_status',
        'customer_id',
        'service_id',
        'agent_id',
        'location_id',
        'total_attendies',
        'payment_method',
        'payment_portion',
        'ip_address',
        'source_id',
        'source_url',
        'coupon_code',
        'coupon_discount',
        'customer_comment',
    ];
}
