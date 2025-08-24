<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    // table default 'slides'
    protected $fillable = [
        'gambar',
        'is_active',
    ];
}
