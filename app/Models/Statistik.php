<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Statistik extends Model
{
    use HasFactory;

    protected $table = 'statistik'; // nama tabel
    protected $fillable = [
        'icon',   // ikon untuk statistik (misal: bi bi-people)
        'count',  // angka statistik
        'label',  // label / keterangan statistik
    ];
}
