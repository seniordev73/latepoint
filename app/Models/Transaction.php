<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'token',
        'booking_id',
        'customer_id',
        'processor',
        'payment_method',
        'payment_portion',
        'funds_status',
        'status',
        'amount',
        'notes',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
