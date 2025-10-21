<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'visitors';

    protected $fillable = [
        'ip_address',
        'user_agent',
        'session_id',
    ];

    protected $casts = [
        'visited_at' => 'datetime',
    ];
}
