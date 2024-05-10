<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPrice extends Model
{
    use HasFactory;
    protected $fillable = [
        'agent_id',
        'service_id',
        'location_id',
        'is_price_variable',
        'price_min',
        'price_max',
        'charge_amount',
        'is_deposit_required',
        'deposit_amount',
    ];
}
