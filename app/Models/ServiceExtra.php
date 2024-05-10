<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceExtra extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'short_description',
        'charge_amount',
        'duration',
        'maximum_quantity',
        'selection_image_id',
        'description_image_id',
        'multiplied_by_attendies',
        'status',
    ];
}
