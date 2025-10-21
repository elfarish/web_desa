<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slide';

    protected $fillable = [
        'gambar',
        'is_active',
    ];

    /**
     * Accessor for the gambar field to return full URL
     */
    public function getGambarUrlAttribute()
    {
        return $this->gambar ? asset('storage/'.$this->gambar) : null;
    }
}
