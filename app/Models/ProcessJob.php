<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'process_id',
        'object_id',
        'object_model_type',
        'settings',
        'to_run_after_utc',
        'status',
        'run_result',
        'process_info',
    ];
}
