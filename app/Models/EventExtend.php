<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventExtend extends Model
{
    use HasFactory;

    protected $fillable = ['event_id','guests','calendar','description','location'];

}
