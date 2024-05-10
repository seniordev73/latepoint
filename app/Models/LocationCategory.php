<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'short_description',
        'parent_id',
        'selection_image_id',
        'order_number',
    ];
}
