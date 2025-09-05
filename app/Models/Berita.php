<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'user_id',
        'judul',
        'slug',
        'kategori',
        'ringkasan',
        'isi',
        'gambar',
        'status',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Route model binding → pakai slug, bukan id.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Boot: generate slug & tanggal otomatis.
     */
    protected static function booted()
    {
        static::creating(function ($berita) {
            // generate slug unik
            $berita->slug = static::generateUniqueSlug($berita->judul);

            // default tanggal = hari ini
            if (empty($berita->tanggal)) {
                $berita->tanggal = now()->toDateString();
            }
        });

        static::updating(function ($berita) {
            if ($berita->isDirty('judul')) {
                $berita->slug = static::generateUniqueSlug($berita->judul, $berita->id);
            }
        });
    }

    /**
     * Relasi ke user (penulis berita).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * Helper untuk buat slug unik.
     */
    private static function generateUniqueSlug(string $judul, $ignoreId = null): string
    {
        $slug = Str::slug($judul);
        $original = $slug;
        $count = 1;

        $query = static::where('slug', $slug);
        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        while ($query->exists()) {
            $slug = $original . '-' . $count++;
            $query = static::where('slug', $slug);
            if ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            }
        }

        return $slug;
    }
}
