<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerMeta extends Model
{
    use HasFactory;
    protected $fillable = [
        'object_id',
        'meta_key',
        'meta_value',
    ];
}
