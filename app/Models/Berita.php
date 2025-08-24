<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'penulis',
        'tanggal',
        'status',
        'ringkasan',
        'isi',
        'gambar',
    ];

    protected $dates = [
        'tanggal' => 'date',        // tanggal kegiatan
        'created_at' => 'datetime', // tanggal pembuatan
        'updated_at' => 'datetime',
    ];

    use HasFactory;
}
