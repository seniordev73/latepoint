<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'full_address',
        'status',
        'category_id',
        'order_number',
        'selection_image_id',
    ];
}
