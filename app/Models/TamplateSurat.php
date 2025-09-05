<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TamplateSurat extends Model
{
    protected $table = 'tamplate_surat';

    protected $fillable = [
        'nama_template',
        'kategori',
        'deskripsi',
        'file_path',
    ];
}
