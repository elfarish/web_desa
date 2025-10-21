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

    /**
     * Accessor for the file_path field to return full URL
     */
    public function getFilePathUrlAttribute()
    {
        return $this->file_path ? asset('storage/'.$this->file_path) : null;
    }
}
