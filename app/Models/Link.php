<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Link extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'url',
        'deskripsi',
        'ikon',
        'warna_bg',
        'warna_teks',
        'urutan',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    // ─── Auto-generate slug dari judul saat saving ───────────────────────────
    protected static function boot(): void
    {
        parent::boot();

        static::saving(function (Link $link) {
            if (empty($link->slug)) {
                $link->slug = static::buatSlugUnik(Str::slug($link->judul, '-'));
            }
        });
    }

    // Pastikan slug unik dengan menambahkan suffix angka jika perlu
    public static function buatSlugUnik(string $slug, ?int $kecualiId = null): string
    {
        $kandidat = $slug;
        $i = 1;

        while (true) {
            $query = static::where('slug', $kandidat);
            if ($kecualiId) {
                $query->where('id', '!=', $kecualiId);
            }
            if (!$query->exists()) {
                return $kandidat;
            }
            $kandidat = $slug . '-' . $i++;
        }
    }

    // URL halaman berbagi publik per link
    public function urlBerbagi(): string
    {
        return route('link.berbagi', $this->slug);
    }

    public function klik()
    {
        return $this->hasMany(LinkClick::class);
    }

    public function scopeAktif($query)
    {
        return $query->where('aktif', true)->orderBy('urutan');
    }
}
