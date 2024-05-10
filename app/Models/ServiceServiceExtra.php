<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceServiceExtra extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'service_extra_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceExtra()
    {
        return $this->belongsTo(ServiceExtra::class);
    }
}
