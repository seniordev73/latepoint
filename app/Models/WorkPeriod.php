<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkPeriod extends Model
{
    use HasFactory;
    protected $fillable = [
        'agent_id',
        'service_id',
        'location_id',
        'start_time',
        'end_time',
        'week_day',
        'custom_date',
        'chain_id',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
