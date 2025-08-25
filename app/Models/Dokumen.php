<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $kategori
 * @property string $judul
 * @property string|null $deskripsi
 * @property string|null $file_path
 */
class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumen';

    protected $fillable = [
        'kategori',
        'nama_file',
        'deskripsi',
        'file_path',
    ];


    public function getFileUrlAttribute()
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : null;
    }

    // app/Models/Dokumen.php

    public function getPreviewAttribute()
    {
        $extension = pathinfo($this->file_path, PATHINFO_EXTENSION);

        if ($extension === 'pdf') {
            return asset('storage/' . $this->file_path); // bisa di-embed
        }

        // Untuk Word/Excel, kita bisa pakai ikon sesuai tipe
        switch ($extension) {
            case 'doc':
            case 'docx':
                return asset('images/icons/word.png');
            case 'xls':
            case 'xlsx':
                return asset('images/icons/excel.png');
            default:
                return asset('images/icons/file.png'); // ikon umum
        }
    }
}
