<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struktural extends Model
{
    protected $table = 'struktural';

    protected $fillable = [
        'nama',
        'jabatan',
        'kategori',
        'foto',
    ];

    use HasFactory;

    /**
     * Accessor for the foto field to return full URL
     */
    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/'.$this->foto) : null;
    }
}
