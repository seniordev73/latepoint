<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    // Define the fillable attributes
    protected $fillable = [
        'agent_id',
        'booking_id',
        'service_id',
        'customer_id',
        'location_id',
        'code',
        'description',
        'initiated_by',
        'initiated_by_id',
        'created_at',
        'updated_at',
    ];

    // Define the relationship with the Agent model
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
