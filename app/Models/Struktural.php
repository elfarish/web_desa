<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


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
}
