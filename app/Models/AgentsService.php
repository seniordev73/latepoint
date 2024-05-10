<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentsService extends Model
{
    use HasFactory;
    protected $fillable = [
        'agent_id',
        'service_id',
        'location_id',
        'is_custom_hours',
        'is_custom_price',
        'is_custom_duration',
    ];
}
