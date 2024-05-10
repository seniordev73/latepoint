<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerificationToken extends Model
{
    use HasFactory;
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'user_id',
        'token',
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
