<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentMeta extends Model
{
    use HasFactory;
    protected $fillable = [
        'object_id',
        'meta_key',
        'meta_value',
        'created_at',
        'updated_at',
    ];
}
