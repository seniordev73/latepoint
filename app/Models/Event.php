<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = ['title','start','end','allDay','url'];

    function extendedProps() {
        return $this->hasOne(EventExtend::class);
    }
}
