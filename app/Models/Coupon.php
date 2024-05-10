<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'discount_type',
        'discount_value',
        'description',
        'rules',
        'status',
    ];
}
